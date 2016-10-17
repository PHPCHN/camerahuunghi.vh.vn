<div class="about row">
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">GIỚI THIỆU VỀ CÔNG TY</p>
  </div>
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">THÔNG TIN TUYỂN DỤNG</p>
  </div>
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">HỖ TRỢ KHÁCH HÀNG</p>
  </div>
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">THỐNG KÊ TRUY CẬP</p>
    <ul>
    <li>{{trans('messages.online')}}: {{Session::get('mechs')['online']}}</li>
    <li>{{trans('messages.visit-today')}}: {{Session::get('mechs')['visit-today']}}</li>
    <li>{{trans('messages.visit-yesterday')}}: {{Session::get('mechs')['visit-yesterday']}}</li>
    <li>{{trans('messages.this-month')}}: {{Session::get('mechs')['this-month']}}</li>
    <li>{{trans('messages.this-year')}}: {{Session::get('mechs')['this-year']}}</li>
    <li>{{trans('messages.total-visit')}}: {{Session::get('mechs')['total-visit']}}</li>
    </ul>
  </div>
</div>
<div class="about-b row">
  <?php
    $banks = array(
      'acb', 'anz', 'bidv', 'hsbc', 'mart', 'masu',
      'mb', 'scd', 'tech', 'vcom', 'vtin',
    );
  ?>
  <image class="bkard" alt="bkard" src="{{asset('asset/img/bkard.png')}}">
  @foreach($banks as $bank)
    <image alt="{{$bank}}" src="{{asset('asset/img/'.$bank.'.png')}}">
  @endforeach
</div>
