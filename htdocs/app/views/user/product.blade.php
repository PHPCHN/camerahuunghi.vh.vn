@extends('layout.user')
<?php $sub_cate = Session::get('sub_cate');
      $category = Session::get('category');
      $product = Session::get('product'); ?>
@section('title')
{{$product->name}},
@endsection
@section('description')
{{$product->name}},
@endsection
@section('keywords')
{{$product->name}},
@endsection
@section('headcontent')
@endsection
@section('content')
<div class="product row">
  <h6><a href="/">TRANG CHỦ</6>
    -> <a href="/{{$category->keyword}}">{{$category->name}}</a>
    @if($sub_cate->id != $category->id)
    -> <a href="/{{$sub_cate->keyword}}">{{$sub_cate->name}}</a>
    @endif
    -> <a href="/{{$category->keyword}}/{{$product->code}}">{{$product->code}}</a>
  </h1>
  <div class="img-detail col-xs-6">
    <img alt="{{$product->image}}" src="{{asset($product->image_link())}}">
  </div>
  <div class="detail col-xs-6">
    <p class="title">{{$product->name}}</p>
    <p class="price">Giá: <span class="price-sp">{{number_format($product->price,0,',','.')}} VND</span></p>
    <p>Thương hiệu: {{$product->get_opt_th()}}</p>
    <?=$product->description ?>
    <p class="price contact">Liên hệ <span class="price-sp">0987 926 117 - 0942 926 117</span> để được tư vấn Miễn Phí - Hỗ trợ kỹ thuật và giao hàng trên toàn quốc</p>
  </div>
  <div class="detail-exp col-xs-12">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#description">THÔNG TIN CHI TIẾT</a></li>
      <li><a data-toggle="tab" href="#comment">BÌNH LUẬN</a></li>
    </ul>

    <div class="tab-content">
      <div id="description" class="tab-pane fade in active">
        <?=$product->content ?>
      </div>
      <div id="comment" class="tab-pane fade">
      </div>
    </div>
  </div>
</div>
<?php $product_involves = $product->list_involve(); ?>
<div class="product row">
  <h6>SẢN PHẨM LIÊN QUAN</h6>
  @foreach ($product_involves as $product)
  <div class="item col-xs-6 col-sm-2">
    <div class="p1 row">
      <div class="img">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <p>{{$product->name}}<p>
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <form method="get" class="exp"
      action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
    <div class="p2 row">
      <p class="code">{{$product->code}}</p>
      <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      <div class="description"><?=$product->description ?></div>
      <form method="get" class="exp"
      action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
  </div>
  @endforeach
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
