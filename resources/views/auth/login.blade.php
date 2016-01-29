@extends('layouts.master')

@section('content')
    <div class="connexion">
        @if(Session::has('message'))
            @include('partials.flash')<br>
        @endif
        <form method="POST" action="{{url('login')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="email">{{trans('app.emailAdress')}}</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @if($errors->has('email'))<span class="error">{{$errors->first('email')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="password">{{trans('app.password')}}</label>
                <input type="password" name="password" class="form-control" id="password">
                @if($errors->has('password'))<span class="error">{{$errors->first('password')}}</span>@endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"  value="true"> Remember Me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <a href="{{route('registerUser')}}">{{trans('app.register')}}</a>
    </div>

@stop