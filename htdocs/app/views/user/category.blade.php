@extends('layout.user')
<?php $input_opts = Session::get('input_opts');
$sup_cate = Session::get('sup_cate');
$category = Session::get('category'); ?>
@section('title')
{{$category->name}},
@endsection
@section('description')
{{$category->name}},
@endsection
@section('keywords')
{{$category->name}},
@endsection
@section('headcontent')
@if(Session::get('sub_cates')->count())
<div class="navbar-collapse" id="sub-menu">
  <ul class="nav navbar-nav">
    @foreach (Session::get('sub_cates') as $sub_cate)
    <li class="item"><a href="/{{$sub_cate->keyword}}" >{{$sub_cate->name}}</a></li>
    @endforeach
  </ul>
</div>
@endif
<div class="navbar-collapse" id="opt-menu">
  <form method="get">
    <ul class="nav navbar-nav">
      @foreach (Session::get('options') as $option)
      <li class="item">
        <select class="form-control" name="{{$option['opt']->keyword}}" onchange="this.form.submit();">
          <option disabled selected value>{{$option['opt']->name}}</option>
          @foreach ($option['val'] as $vals)
          @if(isset($input_opts[$option['opt']->keyword])
            && $input_opts[$option['opt']->keyword] == $vals->keyword)
            <option value="{{$vals->keyword}}" selected>{{$vals->label}}</option>
          @else
            <option value="{{$vals->keyword}}">{{$vals->label}}</option>
          @endif
          @endforeach
        </select>
      </li>
      @endforeach
      <li class="item">
        <select class="form-control" name="sort" onchange="this.form.submit();">
          <option disabled selected value>Sắp xếp</option>
          @foreach (Session::get('sorts') as $sort_label => $sort_key)
          @if(isset($input_opts['sort'])
            && $input_opts['sort'] == $sort_key)
              <option value="{{$sort_key}}" selected>{{$sort_label}}</option>
          @else
              <option value="{{$sort_key}}">{{$sort_label}}</option>
          @endif
          @endforeach
        </select>
      </li>
    </ul>
  </form>
</div>
@endsection
@section('content')
<div class="product row">
  <h6><a href="/">TRANG CHỦ</a>
    @if($sup_cate)
    -> <a href="/{{$sup_cate->keyword}}">{{$sup_cate->name}}</a>
    @endif
    -> <a href="/{{$category->keyword}}">{{$category->name}}</a>
    - {{$products->getTotal()}} SẢN PHẨM
  </h6>
  <div class="col-xs-12">
  {{$products->appends($input_opts)->links()}}
  </div>
  @foreach ($products as $product)
  <div class="item col-xs-6 col-sm-2">
    <div class="p1 row">
      <div class="img">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <p>{{$product->name}}<p>
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <form method="get" class="exp"
      action="/{{$sup_cate?$sup_cate->keyword:$category->keyword}}/{{$product->code}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
    <div class="p2 row">
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <div class="description"><?=$product->description ?></div>
      <form method="get" class="exp"
      action="/{{$sup_cate?$sup_cate->keyword:$category->keyword}}/{{$product->code}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
  {{$products->appends($input_opts)->links()}}
  </div>
</div>
@endsection
@section('extra')
<div class="extra row">
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
  <div class="col-xs-4 col-sm-2">
    <div class="item col-xs-12">
    </div>
  </div>
</div>
@endsection
@section('js')
  @if(Session::has('search'))
    <script>
    alert("search={{Session::get('search')}}")
    </script>
  @endif
@endsection
