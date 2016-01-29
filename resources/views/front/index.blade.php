@extends('layouts.master')

@section('content')
            @if(Session::has('message'))
                @include('partials.flash')
            @endif
            <div class="container product">
                @include('partials.listProduct')
            </div> {{--avant @empty container--}}
            {{--@endforeach--}}
            {{--{!! $products->links() !!}--}}
            <div id="loader"><img src="assets/img/ajax-loader.gif"></div>
            <input type="text" readonly value="{{$products->currentPage()}}" id="currentpage">
@stop