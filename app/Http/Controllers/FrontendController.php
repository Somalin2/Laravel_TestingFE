<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at','DESC')->paginate(3);
    	return view('frontend.index')->with('products',$products)->with('categories', $categories);
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
        $categories = Category::all();
        return view('frontend.show')->with('product', Product::find($id))->with('categories',$categories);
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
    public function getByCategory($id) {
        $categories = Category::all();
        $products = DB::table('products')->where('category_id', $id)->paginate(3);
        // dd($products);
        return view('frontend.category')
            ->with('products', $products)
            ->with('categories', $categories);

    }

    public function getBySearch(Request $request) {
        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $categories = Category::all();
        if( $keyword != ""){
            return view('frontend.search')
                ->with('products', Product::where('name', 'LIKE', '%'.$keyword.'%')->paginate(3))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            return view('frontend.search')
                ->with('products', Product::paginate(3))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        }
    }


}
