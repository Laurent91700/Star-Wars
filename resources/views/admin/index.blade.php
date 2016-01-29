@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        @include('partials.flash')
    @endif

    <a href="{{url('product/create')}}" class="btn">Create</a>
    <div class="panel panel-default">
        <div class="panel-heading">DashBoard</div>
        <div class="panel-body">
            <p>Administration des articles</p>
        </div>
        <table class="table">
            <tr>
                <th>Status</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)

                    <tr>
                        <td><a href="product/status/{{$product->id}}" class="btn btn-{{$product->status}}">{{$product->status}}</a></td>
                        <td><a href="{{url('product',[$product->id, 'edit'])}}">{{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->published_at}}</td>
                        <td>{{$product->category->title}}</td>
                        <td>
                            @foreach($product->tags as $tag)
                                {{$tag->name}} -
                            @endforeach
                        </td>
                        <td>
                            {{--<form action="{{url('product',$product->id)}}" Method="POST">--}}
                                {{--{{ csrf_field() }}--}}
{{--                                {{method_field('DELETE')}}--}}
                                {{--<input type="hidden" name="_method" value="delete">--}}
                                {{--<input type="submit" value="delete" class="confirmModal">--}}
                            {{--</form>--}}
                            <a href="product/destroy/{{$product->id}}" class="confirmModal">
                                <input type="button" class="btn btn-default" value="Delete">
                            </a>
                        </td>
                    </tr>

            @endforeach
        </table>
    </div>
@stop



