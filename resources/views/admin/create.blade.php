@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        @include('partials.flash')
    @endif
    <h1>{{trans('app.create')}}</h1>
    <form method="POST" action="{{url('product')}}" enctype="multipart/form-data">
    {!!csrf_field() !!}
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name" id="name">{{trans('app.name')}}</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @if($errors->has('name'))<span class="error">{{$errors->first('name')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="abstract" id="abstract">{{trans('app.abstract')}}</label>
                            <input type="text" name="abstract" class="form-control" value="{{old('abstract')}}">
                            @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="content" id="content">{{trans('app.content')}}</label>
                            <textarea name="content" class="form-control" rows="5" cols="35">{{old('content')}}</textarea>
                            @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="price" id="price">{{trans('app.price')}}</label>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                            @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="quantity" id="quantity">{{trans('app.quantity')}}</label>
                            <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
                            @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span>@endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="categories">{{trans('app.categorie')}}</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach($categories as $id => $title)
                                    <option value="{{$id}}">{{$title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))<span class="error">{{$errors->first('categories')}}</span><br>@endif
                        </div>
                        <div class="form-group">
                            <label for="tags">{{trans('app.tags')}}</label>
                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach($tags as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('tags'))<span class="error">{{$errors->first('tags')}}</span><br>@endif
                        </div>
                        <div class="form-group">
                            <label for="status">{{trans('app.status')}}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="opened">opened</option>
                                <option value="closed">closed</option>
                            </select>
                             @if($errors->has('status'))<span class="error">{{$errors->first('status')}}</span><br>@endif
                        </div>
                        <div class="form-group">
                            <label for="published_at">{{trans('app.published_at')}}</label>
                            <input  type="date" name="published_at" id="published_at" class="form-control" value="{{old('published_at')}}">
                            @if($errors->has('published_at'))<span class="error">{{$errors->first('published_at')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <h2>{{trans('app.addImage')}}</h2>
                            <input type="file" name="thumbnail"><br>
                            @if($errors->has('thumbnail'))<span class="error">{{$errors->first('thumbnail')}}</span>@endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary" value="Validate">
            </div>
        </div>
    </form>
@stop

