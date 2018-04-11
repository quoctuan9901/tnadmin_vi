@php
$config_site = DB::table('config')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>Truy Cập Bị Từ Chối</title>
    <meta name="author" content="{{ $config_site->author }}" />
    <meta name="keywords" content="Access Denied" />
    <meta name="description" content="Access Denied" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Bootstrap CSS -->
    <link type="text/css" media="all" href="{{ asset('public/errors/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="{{ asset('public/errors/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="{{ asset('public/errors/css/responsive.css') }}" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,800italic,800,700italic,700,600italic,600,400italic,300' rel='stylesheet' type='text/css' />
  </head>

  <body>
    <!-- Header -->
    <section>
      <div class="container">
        <div class="row">
          <div>
            <h1>Truy Cập Bị Từ Chối</h1>
            <h2>Truy Cập Trang Web Đã Bị Từ Chối </h2>
            <p>Vui lòng liên hệ với Quản trị viên của bạn để bạn có thể tiếp tục truy cập</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end Header -->

    <!-- Illustration -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="illustration">
              <div class="island"></div>
              <div class="char"></div>
              <div class="hand"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end Illustration -->

     <!-- Button -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="{{ url()->previous() }}"><div class="btn btn-action">Quay Lại</div></a>
          </div>
        </div>
      </div>
    </section>
    <!-- end Button -->

    <!-- Footer -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p>Copyright (c) 2018 {{ $config_site->name_site }} . All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end Footer -->

    <!-- Scripts -->
    <script src="{{ asset('public/errors/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/errors/js/bootstrap.min.js') }}" type="text/javascript"></script>
  </body>

</html>