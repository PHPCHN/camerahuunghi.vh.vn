

2.0Mp, zoom quang 30x, zoom số 16x

25/30fps@(1920x1080), 25/30/50/60fps@ 1.0Mp, 3DNR

Hỗ trợ chức năng tuần tra thông minh autotracking

Hỗ trợ thẻ nhớ tối đa 128gb

Hỗ trợ âm thanh 2 chiều.

Tầm xa hồng ngoại: 500m

Chuẩn chống nước và bụi IP67

Nhiệt độ hoạt động -40~+70°C

Cảm biến 1.0 Megapixel Omni Vision

1.0Mp 25/30fps@(1280x720), 2D-DNR

Tầm xa hồng ngoại: 30m

Ống kính: 3.6mm (góc nhìn 72°)

H.264 và MJPEG

DC12V, POE, IP67

Nhiệt độ hoạt động -30~+60°C


Cảm biến 1/3" 1.3 Megapixel Aptina

1.3Mp 25/30fps@ (1280x960), 3D-DNR

Tầm xa hồng ngoại: 30m

Ống kính: 3.6mm (góc nhìn 75°)

Wifi chuẩn (IEEE802.11b/g/n) 50m

Hỗ trợ thẻ nhớ tối đa 128GB

DC12V, IP67

Nhiệt độ hoạt động -30~+60°C

---------------------------------------

Đầu ghi hình HDCVI 4 kênh +1 kênh IP

Kết nối Camera CVI/Analog/IP (5Mp)

Chuẩn nén hình ảnh: H264, H264+

Ghi hình ở độ phân giải 1080N/720P

Cổng ra: VGA/HDMI

Audio: 1 cổng vào 1 cổng ra, hỗ trợ âm thanh 2 chiều

Hỗ trợ chuẩn Onvif 2.4

Hỗ trợ 1 SATA x6TB, 2 USB 2.0

$query->whereIn('id', function($query) use ($keys){
  $query->from('product_seos')
      ->whereIn('seo_id', function($query) use ($keys){
        $query->from('seos')->where(function($query) use ($keys){
          foreach($keys as $key) {
            $query->orWhere('keyword', 'like', '%'.$key.'%')
              ->orWhereRaw("'$key' like concat('%',keyword,'%')");
            }
        })->lists('id');
      })->groupBy('product_id')
      ->havingRaw('count(product_id)>1')
      ->lists('product_id');
});

->orWhere(function($query) use ($keys){
  foreach($keys as $key) {
    $query->whereIn('id', function($query) use ($key){
      $query->from('products')
        ->join('categories', 'categories.id', '=', 'products.cate_id')
        ->where('keyword', 'like', '%'.$key.'%')
        ->orWhereRaw("'$key' like concat('%',keyword,'%')")
        ->select(['products.id'])->lists('id');
    });
}
});

->where(function($query) use ($keys){
  foreach($keys as $key) {
    $query->orWhere('code', 'like', '%'.$key.'%')
      ->orWhereRaw("'$key' like concat('%',code,'%')");
    }
  })->where(function($query) use ($keys){
    foreach($keys as $key) {
      $query->orWhereIn('id', function($query) use ($key){
        $query->from('products')
          ->join('categories', 'categories.id', '=', 'products.cate_id')
          ->where('keyword', 'like', '%'.$key.'%')
          ->orWhereRaw("'$key' like concat('%',keyword,'%')")
          ->select(['products.id'])->lists('id');
      });
  }
  });
