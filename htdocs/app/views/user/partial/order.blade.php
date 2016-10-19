<table class="table table-hover">
  <thead>
    <th>STT</th>
    <th>Sản phẩm</th>
    <th>Số lượng</th>
    <th>Thêm/Xoá</th>
  </thead>

@if(Session::has('cart'))

  @if(isset($product))
  @endif
@endif
</table>
<form method="post" action="/dat-hang">
  <input type="submit" name="sm1" value="sm1">
  <input type="submit" name="sm2" value="sm2" class="btn btn-warning">
</form>
