@extends('layout.user')
@section('title')
{{$news->title}}
@endsection
@section('description')
Camera Đà Nẵng, {{$news->title}}
@endsection
@section('keywords')
{{$news->title}}
@endsection
@section('og-image')
{{asset($news->image_link())}}
@endsection
@section('canonical')
{{asset('/tin-tuc/'.$news->id)}}
@endsection
@section('headcontent')
@endsection
@section('content')
<h1 class="hidden-all">{{$news->title}}</h1>
<h2 class="hidden-all">Camera Đà Nẵng</h2>
<h3 class="hidden-all">Camera Đà Nẵng</h3>
<div class="new row">
  <h6>TIN TỨC</h6>
  <div class="row">
    <div class="item-detail">
      <p class="title">{{$news->title}}</p>
      <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
      <div class="img-detail">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="description"><?=$news->description ?></div>
      <div class="content"><?=$news->content ?></div>
    </div>
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
