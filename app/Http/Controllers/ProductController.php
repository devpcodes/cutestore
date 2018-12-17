<?php
//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ProductController extends Controller
{
    public function seriesList(Request $request,$serId = '0')
    {
        if(!empty($request->input("order"))){
            $order = $request->input("order");
            $items = $request->input("items");
        }else{
            $order = "created_at";
            $items = "15";
        }
        if($serId=="0"){
            $cateList = DB::table('series')
                ->leftJoin('categorys', 'series.id', '=', 'categorys.series_id')
                ->select('series.name','series.id as sId','categorys.id')
                ->get();
        }else{
            $cateList = DB::table('series')
                ->leftJoin('categorys', 'series.id', '=', 'categorys.series_id')
                ->where('series.id','=',$serId)
                ->select('series.name','series.id as sId','categorys.id')
                ->get();
        }


        $cateIdArr = [];
        foreach($cateList as $cateKey => $cateValue){
            $cateIdArr[$cateKey] = $cateValue->id;
            $seriesName = $cateValue->name;
            if($serId==0){
                $seriesId = 0;
            }else{
                $seriesId = $cateValue->sId;
            }
        }
        $productList = DB::table('products')
            ->whereIn('category_id', $cateIdArr)
            ->orderBy($order, 'desc')
            ->select('id','name','description1','price','images','items')
            ->paginate($items);
        debug($productList,$order);
        $sId = $serId;
        return view('product.productlist',compact('productList','seriesName','seriesId','order','items','sId'));
    }

    public function categoryList(Request $request,$categoryId = 1)
    {
        if(!empty($request->input("order"))){
            $order = $request->input("order");
            $items = $request->input("items");
        }else{
            $order = "created_at";
            $items = "15";
        }

        $series = DB::table('categorys')
            ->leftJoin('series','categorys.series_id','=','series.id')
            ->where('categorys.id','=',$categoryId)
            ->select('categorys.name as cName','series.name as sName','series.id as sId')
            ->get();
        $productList = App\Category::findOrFail($categoryId)
            ->products()
            ->orderBy($order, 'desc')
            ->select('id','name','description1','price','images','items')
            ->paginate($items);
        //debug($productList,$series);
        $seriesName = $series[0]->sName;
        $seriesId = $series[0]->sId;
        $categoryName = $series[0]->cName;
        $cId = $categoryId;
        return view('product.productlist',compact('productList','seriesName','categoryName','seriesId','categoryId','order','items','cId'));
    }

    public function detail($productId)
    {
        //$productData = App\Product::findOrFail($productId);
//        $productData = App\Product::findOrFail($productId);
//        $productData->view = $productData->view +1;
//        $productData->save();
        if (\Cache::has('productDataCache'.$productId)) {
            $productData = \Cache::get('productDataCache'.$productId);
        }else{
            $productData = App\Product::findOrFail($productId);
            $productData->view = $productData->view +1;
            $productData->save();
            \Cache::put('productDataCache'.$productId, $productData, 10);
        }
        return view("product.productdetail",compact('productData'));
    }

}
