@extends('layouts.admin')

@section('content')

        @if(Session::has('message'))
            @include('partials.flash')
        @endif
        <form method="POST" action="{{url('product',$product->id)}}" enctype="multipart/form-data">
            {{csrf_field() }}
            {{method_field('PUT')}}
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" id="name">{{trans('app.name')}}</label>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                            @if($errors->has('name'))<span class="error">{{$errors->first('name')}}</span><br>@endif
                            <div class="form-group">
                                <label for="abstract" id="abstract">{{trans('app.abstract')}}</label>
                                <input type="text" name="abstract" class="form-control" value="{{$product->abstract}}">
                            </div>
                            @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span><br>@endif
                            <div class="form-group">
                                <label for="content" id="content">{{trans('app.content')}}</label>
                                 <textarea name="content" class="form-control" rows="5" cols="35">{{$product->content}}</textarea>
                            </div>
                            @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span><br>@endif
                            <div class="form-group">
                                <label for="price" id="price">{{trans('app.price')}}</label>
                                <input type="text" name="price" class="form-control" value="{{$product->price}}">
                            </div>
                            @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span><br>@endif
                            <div class="form-group">
                                <label for="quantity" id="quantity">{{trans('app.quantity')}}</label>
                                <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                            </div>
                            @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span><br>@endif
                            <div class="form-group">
                                <label for="categories">{{trans('app.categorie')}}</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach($categories as $id => $title)
                                        <option value="{{$id}}" {{$product->category_id==$id?'selected':''}}>{{$title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('categories'))<span class="error">{{$errors->first('categories')}}</span><br>@endif
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tags">{{trans('app.tags')}}</label>
                                <select name="tags[]" id="tags" class="form-control" multiple>
                                    @foreach($tags as $id => $name)
                                        <option value="{{$id}}" {{$product->hasTag($id)?'selected':''}}>{{$name}}</option>
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
                                <input  type="date" name="published_at" id="published_at" class="form-control" value="{{$product->published_at}}">
                                @if($errors->has('published_at'))<span class="error">{{$errors->first('published_at')}}</span><br>@endif
                            </div>
                            <div class="form-group">
                                <h2>{{trans('app.addImage')}}</h2>
                                <input type="file" name="thumbnail" class=""><br>
                                @if(!is_null($product->picture))
                                     <img src="/uploads/{{$product->picture->uri}}" class="img_small" alt="photo du produit">
                                @endif
                                @if($errors->has('thumbnail'))<span class="error">{{$errors->first('thumbnail')}}</span><br>@endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="btn-group " role="group" aria-label="...">
                        <input type="submit" class="btn btn-default" value="Validate">
                    </div>
                </div>
            </div>
        </form>

@stop
