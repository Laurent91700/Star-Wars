@extends('layouts.master')

@section('content')
    <div class="container">
{{--        @foreach($products as $product)--}}
        @forelse($products as $product)
            <div class="row">
                <div class="col-sm-6">
                    @if($pict=$product->picture)
                        <img class="img_big" src="{{url('uploads',$product->picture->uri)}}">
                    @endif
                </div>
                <div class="col-sm-6">
                   <h2><a href="{{route('Product',[$product->id,$product->slug])}}">{{$product->name}}</a></h2>
                    <p><b>Description:</b>{{$product->abstract}}</p>
                    <p><b>{{trans('app.tag')}}</b>
                    @forelse($product->tags as $tag)
                        {{$tag->name}}
                    @empty
                        {{trans('app.noTag')}}
                    @endforelse
                </div>
            </div>
        @empty
        <p>No product</p>
        @endforelse
    </div>
@stop