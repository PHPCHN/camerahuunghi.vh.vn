<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Category;
use App\Option;
use Session;

class HomeController extends BaseUserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hindex(Request $request)
    {
        if($request->has('search'))
          return $this->search($request);
        $top = Product::liston_top();
        $products = Product::listby_mcate();
        //$camera = Product::listby_cate(1)->where('home', Product::ONHOME)->get();
        Session::flash('top_products', $top);
        Session::flash('main_products', $products);
        return view('user.home');
    }

    private function search($request) {
        $products = Product::search($request);
        $options = Option::liston_search();
        Session::flash('options', $options);
        Session::flash('products', $products);
        Session::flash('input_opts', $request->all());
        Session::flash('sorts', Product::SORT);
        return view('user.search');
    }

    public function category($cate, Request $request)
    {
        $category = Category::getby_keyword($cate);
        if($category) {
          $sub_cates = Category::select(['id', 'name', 'keyword'])->where('sup_id', $category->id)->get();
          $products = Product::listby_cate_opt($category->id, $request);
          $sup_cate = Category::select(['id', 'name', 'keyword'])->find($category->sup_id);
          $options = Option::listby_cate($category);
          Session::flash('options', $options);
          Session::flash('products', $products);
          Session::flash('category', $category);
          Session::flash('sub_cates', $sub_cates);
          Session::flash('sup_cate', $sup_cate);
          Session::flash('input_opts', $request->all());
          Session::flash('sorts', Product::SORT);
          return view('user.category');
        }
        else return view('errors.404');
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
