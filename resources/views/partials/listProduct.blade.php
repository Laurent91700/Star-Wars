
@forelse($products as $product)
    <div class="row">
        <article>
            <div class="col-sm-6">
                @if(!is_null($product->picture))
                    <img class=" img_small" src="{{url('uploads',$product->picture->uri)}}">
                @endif
            </div>
            <div class="col-sm-6">
                <h2><a href="{{route('Product',[$product->id,$product->slug])}}">{{$product->name}}</a></h2>
                <p><b>Description:</b>{{$product->abstract}}</p>
                <p><b>{{trans('app.tag')}}</b>
                    @forelse($product->tags as $tag)
                        <a href="{{route('Tag',$tag->id)}}">{{$tag->name}}</a> -
                @empty
                    {{trans('app.noTag')}}
                @endforelse
                <p>
                    <b>Published: </b> {{$product->published_at}}
                </p>
                <p>
                    <b>Catégorie:</b> {{$product->category->title}}
                </p>

            </div>
        </article>
    </div>

    @empty
        <p>No product</p>
    @endforelse

