@extends('layouts.master')

@section('content')
    <div class="connexion">
        <form method="POST" action="{{route('saveuser')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @if($errors->has('name'))<span class="error">{{$errors->first('name')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @if($errors->has('email'))<span class="error">{{$errors->first('email')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                @if($errors->has('password'))<span class="error">{{$errors->first('password')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @if($errors->has('password_confirmation'))<span class="error">{{$errors->first('password_confirmation')}}</span>@endif
            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
</div>

@stop