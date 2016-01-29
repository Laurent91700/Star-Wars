@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        @include('partials.flash')
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Historique</div>
        <div class="panel-body">
            <p>Historique des commandes</p>
        </div>
        <table class="table">
            <tr>
                <th>N° commande</th>
                <th>Date commande</th>
                <th>Nom client</th>
                <th>Nom produit</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            @foreach($histories as $history)
                <tr>
                    <td>{{$history->cde_id}}</td>
                    <td>{{$history->command_at}}</td>
                    <td>{{$history->customer->user->name}}</td>
                    <td>{{$history->product->name}}</td>
                    <td>{{$history->price * $history->quantity}}</td>
                    <td>{{$history->status}}</td>
                </tr>

            @endforeach
        </table>
    </div>
@stop



