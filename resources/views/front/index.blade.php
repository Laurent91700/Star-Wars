@extends('layouts.master')

@section('content')
            @if(Session::has('message'))
                @include('partials.flash')
            @endif
            <div class="container product">
                @include('partials.listProduct')
            </div> {{--avant @empty container--}}
            {{--@endforeach--}}
            {!! $products->links() !!}
@stop