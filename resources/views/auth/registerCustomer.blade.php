@extends('layouts.master')

@section('content')
    <div class="connexion">
        <form method="POST" action="{{route('saveCustomer')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                @if($errors->has('address'))<span class="error">{{$errors->first('address')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="number_card">Number Card</label>
                <input type="number_card" name="number_card" class="form-control" value="{{ old('number_card') }}">
                @if($errors->has('number_card'))<span class="error">{{$errors->first('number_card')}}</span>@endif
            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
</div>

@stop