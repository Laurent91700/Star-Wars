@extends('layouts.master')

@section('content')
            @if(Session::has('message'))
                @include('partials.flash')
            @endif
            <div class="product">
                @include('partials.listProduct')
            </div>
            <div id="loader">
                <img src="assets/img/ajax-loader.gif">
            </div>
            <input type="hidden"  value="{{$products->count()}}" id="maxpage">
@stop