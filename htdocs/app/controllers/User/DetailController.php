<?php

class DetailController extends BaseUserController
{

    public function product_detail($category, $product)
    {
        $category_find = Category::getmainby_keyword($category);
        $product_find = Product::getby_cate($category_find, $product);
        if($product_find) {
          $sub_cate = Category::select(['id', 'name', 'keyword'])
          ->where('id',$product_find->cate_id)->first();
          $product_find->link = $category_find->keyword;
          $this->session_push($product_find);
          Session::flash('product', $product_find);
          Session::flash('category', $category_find);
          Session::flash('sub_cate', $sub_cate);
          return View::make('user.product');
        }
        else return View::make('errors.404');
    }

    private function session_push($product) {
      //Session::forget('product_seens');
      $in_seens = $this->in_seens($product);
      $in_seens[] = $product;
      Session::put('product_seens', $in_seens);
    }

    private function in_seens($product) {
      $in_seens = array();
      $count = 0;
      if(Session::has('product_seens')) {
        foreach(Session::get('product_seens') as $product_seen)
          if($product_seen->id != $product->id && $count<4) {
            $in_seens[] = $product_seen;
            $count++;
          }
      }
      return $in_seens;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
