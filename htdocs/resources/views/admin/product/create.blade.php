<script src="http://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
Thêm sản phẩm:
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  Mã SP <input type="text" name="code" ><br>
  Tên SP <input type="text" name="name" ><br>
  <input type="hidden" name="cate_id" value="0" >
  Mô tả SP <textarea name="description" ></textarea><br>
  Đơn giá <input type="text" name="price" ><br>
  Ảnh <input type="file" accept="image/*" name="image" ><br>
  <input type="submit" value="Lưu lại" >
</form>
<script>CKEDITOR.replace('description'); </script>
