<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        //
    }
    public function addProduct(){
        $series = App\Series::all();

        $cates = DB::table('series')
            ->leftJoin('categorys', 'series.id', '=', 'categorys.series_id')
            ->select('series.id as sid','series.name as sname','categorys.id','categorys.name','categorys.updated_at')
            ->get();

        $categories = array();
        foreach ($cates as $data) {
            $id = $data->sid;
            if (isset($categories[$id])) {
                $categories[$id][] = $data;
            } else {
                $categories[$id] = array($data);
            }
        }

        return view("admin.product.addproduct",compact('series','categories'));
    }
    public function addSeries(Request $request){
        App\Series::create(['name'=>$request->name]);
        return redirect("/cutestore/admin/addproduct");
    }
    public function delSeries(Request $request)
    {
        App\Series::destroy($request->id);
        echo "OK";
    }
    public function updateSeries(Request $request)
    {
        App\Series::where('id', $request->id)
            ->update(['name'=>$request->name]);

        echo "OK";
    }

    public function delCategory(Request $request)
    {
        //echo $request->id;
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        App\Category::destroy($request->id);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        echo "OK";
    }

    public function updateCategory(Request $request)
    {
        App\Category::where('id',$request->id)
            ->update(['name'=>$request->name,'series_id'=>$request->series_id]);
        echo "OK";
    }

    public function addCategory(Request $request){
        App\Category::create(['name'=>$request->name,'series_id'=>$request->series_id]);
        return redirect("/cutestore/admin/addproduct");
    }

    public function uploadImg(Request $request)
    {
        $file = $request->file('img');
        //必須是image的驗證
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return \Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        };

        $destinationPath = public_path()."/uploads";
        $filename = 'Admin_'.time().$file->getClientOriginalName();//ID_拿到上傳的文件名

        $newFilename = '261_Admin_'.time().$file->getClientOriginalName();
        $newPath = $destinationPath."/".$newFilename;

        $file->move($destinationPath, $filename);
        $oldPath = $destinationPath."/".$filename;

        //復製圖片，並將復製圖改變大小
        if (\File::copy($oldPath , $newPath)) {
//            \Image::make($newPath)->resize(267,null)->save();
            \Image::make($newPath)->resize(261, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();

            return \Response::json([
                'success' => "resize OK",
                'bigPath' => $oldPath,
                'thumbPath' => $newPath,
            ]);
        }else{
            return \Response::json([
                'success' => "copy error",
                'name' => $oldPath,
            ]);
        }
    }

    public function delImg(Request $request)
    {
        if(\File::delete($request->bigPath)){
            if(\File::delete($request->thumbPath)){
                echo "刪除成功";
            }
        }else{
            echo "刪除失敗";
        }
    }

    public function insertProduct(Request $request)
    {
        $product = App\Product::create(['name'=>$request->name,'description1'=>$request->description1,
            'description2'=>$request->description2,'price'=>$request->price,'images'=>$request->images,
            'items'=>$request->items,'content'=>$request->content,'category_id'=>$request->category_id]);
        return \Response::json([
            'success' => "OK",
            'name' => $request->name,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'price'=>$request->price,
            'images'=>$request->images,
            'items'=>$request->items,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'id'=>$product->id,
        ]);
    }

    public function productList()
    {
        $product = App\Product::select('id','name','description1','description2','price','category_id','view')
            ->orderBy("created_at",'desc')
            ->paginate(20);
        $categories = App\Category::all();
        $choiceList = "日期";
        return view("admin.product.productlist",compact("product","categories","choiceList"));
    }

    public function productListHot()
    {
        $product = App\Product::select('id','name','description1','description2','price','category_id','view')
            ->orderBy("view",'desc')
            ->paginate(20);
        $categories = App\Category::all();
        $choiceList = "熱門";
        return view("admin.product.productlist",compact("product","categories","choiceList"));
    }

    public function productListCategory()
    {
        $product = App\Product::select('id','name','description1','description2','price','category_id','view')
            ->orderBy("category_id",'asc')
            ->paginate(20);
        $categories = App\Category::all();
        $choiceList = "分類";
        return view("admin.product.productlist",compact("product","categories","choiceList"));
    }

    public function updateProduct(Request $request)
    {
        App\Product::where('id',$request->id)
            ->update(['name'=>$request->name,'description1'=>$request->description1,
                'description2'=>$request->description2,'price'=>$request->price,'category_id'=>$request->category_id,'view'=>$request->view]);
        echo "OK";
    }

    public function delProduct(Request $request)
    {
        App\Product::destroy($request->id);
        echo "OK";
    }

    public function productDetail($pId)
    {
        $product = App\Product::find($pId);
        $categories = App\Category::all();
        return view("admin.product.productdetail",compact("product","categories"));
    }

    public function updateProductDetail(Request $request)
    {
        App\Product::where('id',$request->id)
            ->update(['name'=>$request->name,'description1'=>$request->description1,
                'description2'=>$request->description2,'price'=>$request->price,'images'=>$request->images,
                'items'=>$request->items,'content'=>$request->content,'category_id'=>$request->category_id]);
        return \Response::json([
            'success' => "OK",
            'name' => $request->name,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'price'=>$request->price,
            'images'=>$request->images,
            'items'=>$request->items,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'id'=>$request->id,
        ]);
    }
}
