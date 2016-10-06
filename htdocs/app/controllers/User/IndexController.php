<?php

class IndexController extends BaseUserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top = Product::liston_top();
        $products = Product::listby_mcate();
        Session::flash('top_products', $top);
        Session::flash('main_products', $products);
        return View::make('user.home');
    }

    public function search() {
        $products = Product::search();
        $options = Option::liston_search();
        Session::flash('options', $options);
        Session::flash('input_opts', Input::all());
        Session::flash('sorts', Product::const_sort());
        return View::make('user.search')->with('products', $products);
    }

    public function category($cate)
    {
        $category = Category::getby_keyword($cate);
        if($category) {
          $sub_cates = Category::select(['id', 'name', 'keyword'])->where('sup_id', $category->id)->get();
          $products = Product::listby_cate_opt($category->id);
          $sup_cate = Category::select(['id', 'name', 'keyword'])->find($category->sup_id);
          $options = Option::listby_cate($category);
          Session::flash('options', $options);
          Session::flash('category', $category);
          Session::flash('sub_cates', $sub_cates);
          Session::flash('sup_cate', $sup_cate);
          Session::flash('input_opts', Input::all());
          Session::flash('sorts', Product::const_sort());
          return View::make('user.category')->with('products', $products);
        }
        else return View::make('errors.404');
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
    public function store()
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
    public function update($id)
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