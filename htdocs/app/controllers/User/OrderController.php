<?php

class OrderController extends BaseUserController
{

    public function order()
    {
      if(Input::has('sm_add'))
        return $this->order_add();
      elseif(Input::has('sm_rm'))
        return $this->order_rm();
      elseif(Input::has('sm_order'))
        return $this->order_submit();
      else return Redirect::back();
    }

    private function order_add()
    {
      $pdt = Input::get('pdt');
      $ql = Input::get('ql');
      $product = Product::select(['id', 'name', 'image', 'code', 'price'])
                  ->find($pdt);
      if($product) {
        $product->ql = $ql;
        $cart_has = null;
        $cart = array();
        if(Session::has('cart'))
          $cart = Session::get('cart');
        foreach($cart as $cart_pdt)
          if($cart_pdt->id == $product->id)
            $cart_has = $cart_pdt;
        if($cart_has) $cart_has->ql =$ql;
        else $cart[] = $product;
        Session::put('cart', $cart);
        Session::flash('flash_success', trans('messages.order_success_add'));
      }
      else Session::flash('flash_error', trans('messages.order_fail_add'));
      return Redirect::back();
    }

    private function order_rm()
    {
      $pdt_rm = Input::get('pdt_rm');
      if(Session::has('cart')){
        $cart_rm = array();
        $cart = Session::get('cart');
        foreach($cart as $cart_pdt)
          if($cart_pdt->id != $pdt_rm)
            $cart_rm[] = $cart_pdt;
        Session::put('cart', $cart_rm);
        if(count($cart_rm) < count($cart))
          Session::flash('flash_success', trans('messages.order_success_rm'));
        else Session::flash('flash_error', trans('messages.order_fail_rm_none'));
      }
      else Session::flash('flash_error', trans('messages.order_fail_rm_empty'));
      return Redirect::back();
    }

    private function order_submit()
    {

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
