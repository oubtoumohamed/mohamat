<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="ar" />
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#4188c9">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="{{ asset('img/favicon.ico') }}"/>
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <title>{{ config('app.name') }}</title>
  <link href="{{ asset('theme/css/app.css') }}?v=4" rel="stylesheet">
  
  <link href="{{ asset('css/select2.min.css') }}?v=1" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  
  @if( @App::getLocale() == "ar" )
  <link href="{{ asset('theme/css/app.rtl.css') }}?v=3" rel="stylesheet" />
  <script src="{{ asset('js/select2-ar.js') }}"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">

  <style type="text/css">body {font-family: 'Tajawal';}</style>
  @endif

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

  <script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("select").select2({
      dir: "ltr"
    });
    jQuery(".delete_btn").click( function(e){
      e.preventDefault();
      jQuery("#delete_confirm_btn").attr("href", $(this).attr("href"));
      jQuery("#confirmdelete").modal("show");
    });
    //$( ".datepicker" ).datepicker({ dateFormat : "yy-mm-dd"});
    //$( ".datetimepicker" ).datetimepicker({ dateFormat : "yy-mm-dd", timeFormat: 'HH:mm'});
  });
  function closeModal(t){
    jQuery("#confirmdelete").modal("hide");
  }
</script>
  @yield('head')
</head>
<body>
  <div class="wrapper">
    
    @section('sidebar')
      @include('sidebar')
    @show

    <div class="main">
      @section('header')
        @include('header')
      @show

      <main class="content">
        <div class="container-fluid p-0">

          {{ isset($title) ? '<h1 class="h3 mb-3">'.$title.'</h1>' : "" }}

          <div class="">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
              <div class="alert-icon"> <i class="fa fa-bell"></i> </div>
              <div class="alert-message">{{ $message }}</strong>
            </div>
            @endif
            
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button> 
              <div class="alert-icon"> <i class="fa fa-bell"></i> </div>
              <div class="alert-message">{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
              <div class="alert-icon"> <i class="fa fa-bell"></i> </div>
              <div class="alert-message">{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('info'))
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
              <div class="alert-icon"> <i class="fa fa-bell"></i> </div>
              <div class="alert-message">{{ $message }}</strong>
            </div>
            @endif

            @foreach ($errors->all() as $error) 
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <div class="alert-icon"> <i class="fa fa-bell"></i> </div>
              <div class="alert-message"> {{ $error }} </div>
            </div>
            @endforeach
            
          </div>

          <div class="row">
            <div class="col-12">

              @yield('content')

            </div>
          </div>

        </div>
      </main>
     
    </div>
  </div>
  <script src="{{ asset('theme/js/app.js') }}"></script>

  <div class="modal" tabindex="-1" id="confirmdelete" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
          <h1 style="color: #dc3545;font-size: 6em;"><i class="fa fa-trash" aria-hidden="true"></i></h1>
          <b>{{ __('global.confirm_delete') }}.</b>
          <br><br>
          <p>{{ __('global.confirm_delete_text') }}.</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger" id="delete_confirm_btn" href="">{{ __('global.delete') }}</a>
          <button type="button" class="btn btn-secondary" onclick="closeModal(this)">{{ __('global.cancel') }}</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>