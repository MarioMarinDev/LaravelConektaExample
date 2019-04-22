<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <title>{{ config('app.name') }} - @yield('page-title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    @include('partials.main.meta')
    @include('partials.main.styles')
  </head>

  <body>
    @yield('base')
  </body>
</html>
