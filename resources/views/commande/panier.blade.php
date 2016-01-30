@extends('layouts.master')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
            <?php
                $encrypter = app('Illuminate\Encryption\Encrypter');
                $encrypted_token = $encrypter->encrypt(csrf_token());
            ?>
                    <input type="hidden" name="_token" value="{{ $encrypted_token }}">

                        @foreach($cde as $product )
                                <div class="row">
                                <div class="col-sm-6 form-group">
                                    <img class="img_small" src="{{url('uploads',$product['uri'])}}" alt="Photo du produit">
                                    <input type="hidden" value="{{$product['id']}}" name="id">
                                    <p>{{trans('App.price')}}{{$product['price']}}</p>
                                    <a href="#" class="moins" prodid="{{$product['id']}}">
                                        <img src="{{url('assets/img/moins.png')}}" alt="image d'un moins pour diminuer la quantité">
                                    </a>
                                    {{trans('App.quantity')}}
                                    <input type="text" size="2" readonly value="{{$product['quantity']}}" class="quantity" id="qte{{$product['id']}}">
                                    <input type="hidden" name="stock" id="stock{{$product['id']}}" value="{{$product['stock']}}">
                                    <a href="#" class="plus" prodid="{{$product['id']}}">
                                        <img src="{{url('assets/img/plus.png')}}" alt="image d'un plus pour augmenter la quantité">
                                    </a>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <h3>{{$product['name']}}</h3>
                                    <a href="panier/{{$product['id']}}" class="confirmModal">
                                        <input type="button" class="btn btn-default" value="reset">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <p>{{trans('App.total')}}<b id="total">{{$total}}</b></p>
                        <a href="{{url('commande')}}">
                            <input type="button" value="Valider" class="btn btn-primary">
                        </a>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
@stop