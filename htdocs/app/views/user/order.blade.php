@extends('layout.user')
@section('title')
Giỏ hàng |
@endsection
@section('description')
Giỏ hàng,
@endsection
@section('keywords')
Giỏ hàng,
@endsection
@section('content')
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
