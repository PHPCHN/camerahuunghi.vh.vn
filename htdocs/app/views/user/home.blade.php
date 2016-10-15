@extends('layout.user')
@section('title')
@endsection
@section('description')
CAMERA QUAN SÁT,
@endsection
@section('keywords')
CAMERA QUAN SÁT,
@endsection
@section('headcontent')
@include('user.partial.headcontent')
@endsection
@section('content')
<div class="product row">
  <h6>TOP BÁN CHẠY NHẤT</h6>
  @foreach (Session::get('top_products') as $product)
  <div class="item col-xs-6 col-sm-3 col-md-2">
    <div class="p1 row">
      <div class="img">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <p>{{$product->name}}<p>
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <form method="get" class="exp" action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
    <div class="p2 row">
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <div class="description"><?=$product->description ?></div>
      <form method="get" class="exp" action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
<?php $mcates = [
  'camera' => 'CAMERA',
  'dau-ghi' => 'ĐẦU GHI',
  'bao-trom' => 'BÁO TRỘM',
  'bo-dam' => 'BỘ ĐÀM',
  'chuong-cua' => 'CHUÔNG-CỬA',
  'phu-kien' => 'PHỤ KIỆN',
];
$main_products = Session::get('main_products'); ?>
@foreach ($mcates as $key=>$value)
<div class="product row">
  <h6>{{$value}}</h6>
  @if(isset($main_products[$key]))
  @foreach ($main_products[$key] as $product)
  <div class="item col-xs-6 col-sm-3 col-md-2">
    <div class="p1 row">
      <div class="img">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <p>{{$product->name}}<p>
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <form method="get" class="exp" action="/{{$key}}/{{$product->code}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
    <div class="p2 row">
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <div class="description"><?=$product->description ?></div>
      <form method="get" class="exp" action="/{{$key}}/{{$product->code}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endforeach
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
@section('js')
  @if(Session::has('search'))
    <script>
    alert("search={{Session::get('search')}}")
    </script>
  @endif
@endsection
