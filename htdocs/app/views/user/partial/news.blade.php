@if(Session::has('product_seens'))
<div class="product-seen row">
  <h6>SẢN PHẨM VỪA XEM</h6>
  @foreach (array_reverse(Session::get('product_seens')) as $product)
  <div class="item col-xs-12">
    <a href="/{{$product->link}}/{{$product->code}}">
    <div class="row">
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <div class="detail col-xs-6 col-sm-8">
        <p class="name">{{$product->name}}<p>
        <p class="code">{{$product->code}}</p>
        <p class="price">{{number_format($product->price,0,',','.')}} VND</p>
      </div>
    </div>
    </a>
  </div>
  @endforeach
</div>
@endif
<div class="new row">
  <h6>TIN TỨC</h6>
  @foreach (Session::get('news_list') as $news)
  <div class="item">
    <a href="/tin-tuc/{{$news->id}}">
    <div class="row">
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="detail">
        <p class="title">{{$news->title}}<p>
        <p class="description"><?=strip_tags($news->description) ?></p>
      </div>
    </div>
    </a>
  </div>
  @endforeach
</div>
