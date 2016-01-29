<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Star Wars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="dialog-confirm" title="Confirmation de la suppression" style="display:none;">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        Etes-vous sûr de vouloir supprimer cet élément ?
    </p>
</div>
<header id="header" role="banner" class="line pam">
    <div class="navbar navbar-default">
        <nav id="navigation" role="navigation">
            <ul class="nav navbar-nav center">
                <li><a href="{{route('FrontController')}}">Site public</a></li>
                <li><a href="{{url('product')}}">Dashboard</a></li>
                <li><a href="{{route('history')}}">History</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="main" role="main" class="line pam">
    @yield('content','default value')
</div>
<footer id="footer" role="contentinfo" class="line pam txtcenter">
    @include('partials.footer')
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="{{url('assets/jquery/popup.min.js')}}"></script>
<script src="{{url('assets/jquery/MajQuantity.min.js')}}"></script>
<script src="{{url('assets/jquery/InfinyScroll.min.js')}}"></script>

</body>
</html>














