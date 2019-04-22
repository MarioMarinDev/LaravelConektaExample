@extends('layouts.base')

@section('base')

@include('partials.main.header')

<div id="app">
	@yield('main')
</div>

@include('partials.main.footer')
@include('partials.main.scripts')

@stop
