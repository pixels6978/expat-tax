
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ config('app.name', 'Expat Tax') }}</title>

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="css/app.css"> -->

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
        <link rel="stylesheet" rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sidebars.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
        

        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
  </head>
  <body class="">
    

    <div class="container">
         
    @livewire('set-new-password')

    </div>


    
      @livewireScripts
  </body>
</html>
