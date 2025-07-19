@extends('errors::layout')

@section('title', __('Not Found'))
{{-- @section('code', '404') --}}
@section('message')
<div class="text-center">
    <img src="{{url('/images/errors/warning.png')}}" alt="warning" width="200px">
    <p class="m-0 display-1">404</p>
    <p class="display-5">Oop's Sorry page not found!</p>
</div>
@endsection
