@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @if(!is_null($product->picture))
                    <img class="img_big" src="{{url('uploads',$product->picture->uri)}}">
                @endif
            </div>
            {{--comment--}}
            <div class="col-sm-6">
                <h2>{{$product->name}}</h2>
                <p><b>{{trans('app.price')}}</b>{{$product->price}}</p>
                <p><b>Description:</b>{{$product->content}}</p>
                <p><b>{{trans('app.tag')}}</b>
                @forelse($product->tags as $tag)
                    {{$tag->name}}
                @empty
                    {{trans('app.noTag')}}
                @endforelse
                <p>
                    <b>Catégorie:</b> {{$product->category->title}}
                </p>
            </div>
        </div>
        <div class="row">
            @if($product->quantity>0)
                <form action="/cde/{{$product->id}}" method="post" class="command" name="command">
                    {{ csrf_field() }}
                <label for="quantity">{{trans('quantity')}}</label>
                    <select name="quantity" id="quantity">
                       <?php $cpt = 0; ?>
                        @if($product->quantity > 4)
                               <?php $cpt=4;?>
                        @else
                               <?php $cpt=$product->quantity; ?>
                        @endif
                        @for($i=1; $i<=$cpt; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <input type="submit" value="commander">
                </form>
            @else
                <p>Non disponible pour le moment</p>
            @endif
        </div>
    </div>
@stop