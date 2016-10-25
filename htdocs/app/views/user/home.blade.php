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
  <h6><ul class="nav nav-tabs">
    <li class="main active"><a data-toggle="tab" href="#top_products">TOP BÁN CHẠY NHẤT</a></li>
  </ul></h6>
  <div class="tab-content">
    <div id="top_products" class="tab-pane fade in active">
    @foreach ($products['top'] as $product)
    <div class="item col-xs-6 col-sm-3 col-md-2">
      <div class="p1 row">
        <div class="new-pr">
          @if($product->new)
          <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
          @endif
          @if($product->pro)
          <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
          @endif
        </div>
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
  </div>
</div>
@foreach ($products['categories'] as $category)
@if($category->sup_id == 0)
<div class="product row">
  <h6><ul class="nav nav-tabs">
    <li class="main active"><a data-toggle="tab" href="#{{$category->keyword}}">{{$category->name}}</a></li>
    @foreach ($products['categories'] as $sub_cate)
    @if($sub_cate->sup_id == $category->id)
      <li class="hidden-xs"><a data-toggle="tab" href="#{{$sub_cate->keyword}}">{{$sub_cate->name}}</a></li>
    @endif
    @endforeach
  </ul></h6>
  <div class="tab-content">
    <div id="{{$category->keyword}}" class="tab-pane fade in active">
    @if(isset($products[$category->id]))
    @foreach ($products[$category->id] as $product)
    <div class="item col-xs-6 col-sm-3 col-md-2">
      <div class="p1 row">
        <div class="new-pr">
          @if($product->new)
          <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
          @endif
          @if($product->pro)
          <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
          @endif
        </div>
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
    @endif
    </div>
    @foreach ($products['categories'] as $sub_cate)
    @if($sub_cate->sup_id == $category->id)
      <div id="{{$sub_cate->keyword}}" class="tab-pane fade">
        @if(isset($products[$sub_cate->id]))
        @foreach ($products[$sub_cate->id] as $product)
        <div class="item col-xs-6 col-sm-3 col-md-2">
          <div class="p1 row">
            <div class="new-pr">
              @if($product->new)
              <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
              @endif
              @if($product->pro)
              <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
              @endif
            </div>
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
        @endif
      </div>
    @endif
    @endforeach
  </div>
</div>
@endif
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
