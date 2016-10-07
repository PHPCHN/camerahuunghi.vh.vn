@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
<h6>THÊM SẢN PHẨM</h6>
<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
  <input type="hidden" name="cate_id" value="0" />
  <div class="form-group">
   <label class="control-label col-sm-2" for="code">Mã SP:</label>
   <div class="col-sm-8">
     <input type="text" name="code" class="form-control">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="name">Tên SP:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="description">Mô tả SP:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
     </textarea>
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="price">Đơn giá:</label>
   <div class="col-sm-8">
     <input type="text" name="price" class="form-control">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="image">Ảnh:</label>
   <div class="col-sm-8">
     <input type="file" name="image" class="form-control" accept="image/*">
   </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-8">
     <button type="submit" class="btn btn-default">Lưu lại</button>
   </div>
  </div>
</form>
</div>
@endsection
@section('js')
<script src="http://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
<script>CKEDITOR.replace('description'); </script>
@endsection
