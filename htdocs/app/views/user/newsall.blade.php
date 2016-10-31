@extends('layout.user')
@section('title')
Camera Đà Nẵng | Tin tức
@endsection
@section('description')
Tin tức, Hệ thống camera, chống trộm giá rẻ, Lắp đặt nhanh, an toàn, hiệu quả
@endsection
@section('keywords')
Tin tức
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('canonical')
{{asset('/tin-tuc')}}
@endsection
@section('headcontent')
@include('user.partial.headcontent')
@endsection
@section('content')
<h1 class="hidden-all">Camera Đà Nẵng, Tin tức</h1>
<h2 class="hidden-all">Camera Đà Nẵng</h2>
<h3 class="hidden-all">Camera Đà Nẵng</h3>
<div class="new row">
  <h6>TIN TỨC - {{$news_all->getTotal()}} BÀI VIẾT</h6>
  <div class="col-xs-12">
  {{$news_all->links()}}
  </div>
  @foreach ($news_all as $news)
  <div class="item col-sm-6">
    <div class="row">
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="detail">
        <a href="/tin-tuc/{{$news->id}}"><p class="title">{{$news->title}}</p></a>
        <p class="description"><?=strip_tags($news->description) ?></p>
        <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
  {{$news_all->links()}}
  </div>
</div>
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
