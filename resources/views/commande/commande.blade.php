@extends('layouts.master')

@section('content')
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                        @forelse($cde as $product )
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <img class="img_small" src="{{url('uploads',$product['uri'])}}" alt="Photo du produit">
                                    <p>{{trans('App.price')}}{{$product['price']}}</p>
                                    <p>{{trans('App.quantity')}}{{$product['quantity']}}</p>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <h3>{{$product['name']}}</h3>
                                </div>
                            </div>
                        @empty
                            <p>Votre panier est vide !!!!</p>
                        @endforelse
                        <p>{{trans('App.total')}}{{$total}}</p>
                        <a href="{{url('savecde')}}">
                            <input type="button" value="Commander" class="btn btn-primary">
                        </a>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </main>
@stop