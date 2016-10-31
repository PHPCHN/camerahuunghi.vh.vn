@extends('layout.user')
@section('title')
Camera Đà Nẵng | Giỏ hàng
@endsection
@section('description')
Giỏ hàng, Hệ thống camera, chống trộm giá rẻ, Lắp đặt nhanh, an toàn, hiệu quả
@endsection
@section('keywords')
Giỏ hàng,
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('canonical')
{{asset('/gio-hang')}}
@endsection
@section('content')
<h1 class="hidden-all">Camera Đà Nẵng, Giỏ hàng</h1>
<h2 class="hidden-all">Camera Đà Nẵng</h2>
<h3 class="hidden-all">Camera Đà Nẵng</h3>
<div class="product row">
  <h6>GIỎ HÀNG</h6>
  @include('layout.partial.flash')
  <div class="col-xs-12">
    @include('user.partial.order')
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
