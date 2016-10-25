<!DOCTYPE html>
<html lang="vn">
    <head>
        @include('user.partial.headtag')
    </head>
    <body>
      <div class="wrapper container-fluid">
        @include('user.partial.header')
        @yield('headcontent')
        <div id="main-content" class="content row">
          <div class="products col-sm-9">
            @yield('content')
          </div>
          <div id="news" class="news col-sm-3">
            @include('user.partial.news')
          </div>
        </div>
        @yield('extra')
        @include('user.partial.about')
        @include('user.partial.footer')
      </div>
    </body>
    @yield('js')
</html>
