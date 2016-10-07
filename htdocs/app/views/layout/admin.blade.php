<!DOCTYPE html>
<html lang="vn">
    <head>
        @include('user.partial.headtag')
    </head>
    <body>
      <div class="wrapper container-fluid">
        @include('user.partial.header')
        @include('user.partial.menu')
        <div class="content row">
          <div class="products col-sm-9">
            @yield('content')
          </div>
          <div class="news col-sm-3">
          </div>
        </div>
        @include('user.partial.footer')
      </div>
    </body>
    @yield('js')
</html>
