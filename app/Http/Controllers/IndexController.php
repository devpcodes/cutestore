<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('not_offer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adData = App\Advertising::all();
        $adtopArray = $adData[0]->adtop;
        $adcenterArray = $adData[0]->adcenter;

        $productLists = App\Product::orderBy('view', 'desc')
            ->select('id','name','description1','price','images','items')
            ->take(12)
            ->get();


        //debug($productLists[0]->name);
        return view('home.home',compact('adtopArray','adcenterArray','productLists'));
    }

    public function hot(Request $request)
    {
        $productLists = App\Product::orderBy('view', 'desc')
            ->select('id','name','description1','price','images','items')
            ->take(12)
            ->get();
        return \Response::json([
            'success' => "200",
            'productLists' => $productLists,
        ]);
    }

    public function news(Request $request)
    {
        $productLists = App\Product::orderBy('created_at', 'desc')
            ->select('id','name','description1','price','images','items')
            ->take(12)
            ->get();
        return \Response::json([
            'success' => "200",
            'productLists' => $productLists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
