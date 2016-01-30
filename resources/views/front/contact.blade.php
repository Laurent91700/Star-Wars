@extends('layouts.master')

@section('content')
    <main class="main">
        @if(Session::has('message'))
            @include('partials.flash')
        @else
            <form method="POST" action="{{url('storeContact')}}">
                    {!! csrf_field() !!}
                <div class="form-group">
                    <label for="email">{{trans('app.emailAdress')}}</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{old('email')}}">
                    @if($errors->has('email'))<span class="error">{{$errors->first('email')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="content">{{trans('app.content')}}</label>
                    <textarea row="50" cols="50" class="form-control" name="content">{{old('content')}}</textarea>
                    @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span>@endif
                </div>
                <div class="form-submit">
                    <input type="submit" class="btn btn-default" value="Envoyer">
                </div>
           </form>
        @endif
    </main>

@stop