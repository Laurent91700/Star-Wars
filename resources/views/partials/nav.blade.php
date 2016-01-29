<nav class="navbar navbar-default">

    <ul class="nav navbar-nav navbar-static-top centre">
        <li><a href="{{route('FrontController')}}">Accueil</a></li>
        @forelse($categories as $category)
            <li><a href="{{route('category',$category->id)}}">{{$category->title}}</a></li>
        @empty
            <li>{{trans('app.noCategory')}}</li>
        @endforelse
        <li><a href="{{route('contact_home')}}">Contact</a></li>
        @if(Auth::check())
            <li><a href="{{route('logout')}}">Logout</a></li>
            @if(Auth::user()->role=='administrator')
                <li><a href="{{url('product')}}">Dashboard</a></li>
            @endif
        @else
            <li><a href="{{route('login')}}">Login</a></li>

        @endif

    </ul>
    @if (Session::has('cde'))
        <a href="{{url('/panier')}}" class="pull-right" class="panier">
            <img src="{{url('assets/img/','caddie.png')}}"  class="vignette" alt="icone du caddie">
            <span class="badge">{{sizeof(Session::get('cde'))}}</span>
        </a>
    @endif

</nav>