@extends('layout.user')
@section('title')
Tin tức,
@endsection
@section('description')
Tin tức,
@endsection
@section('keywords')
Tin tức,
@endsection

@section('headcontent')

@endsection
@section('content')
<div class="new row">
  <h6>TIN TỨC</h6>
  <div class="row">
    <div class="img-detail col-xs-6 col-sm-4">
      <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
    </div>
    <div class="item-detail">
      <p class="title">{{$news->title}}</p>
      <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
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
