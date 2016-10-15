@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
<h6>THÊM TIN TỨC</h6>
@include('layout.partial.flash')
<form class="form-horizontal" role="form" action="/admin/news"
  enctype="multipart/form-data" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="cate_id" value="0" />
  <div class="form-group">
   <label class="control-label col-sm-2" for="code">Tiêu đề:</label>
   <div class="col-sm-8">
     <input type="text" name="title" class="form-control">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="description">Mô tả:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
     </textarea>
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="description">Chi tiết:</label>
   <div class="col-sm-8">
     <textarea id="content" name="content" class="form-control" >
     </textarea>
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
<script>CKEDITOR.replace('content', {
  filebrowserImageBrowseUrl: "{{asset('/images')}}",
  filebrowserImageUploadUrl: "{{asset('/uploadImage?_token='.csrf_token())}}",
}); </script>
@endsection
