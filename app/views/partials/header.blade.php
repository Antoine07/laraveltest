<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF8">
    <title>{{ $title or "Blog-Laravel" }}</title>
    <link href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="container navigation">
    <!-- class row  -->
    <div class="row navigation">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <ol class="breadcrumb">

                </ol>
            </div>
            <div class="navbar-collapse collapse navbar-right">
                @section('nav')
                    <ul class="nav navbar-nav" id="menu-menu-principal">
                        <li><a href="{{url('/')}}">
                                <span class="glyphicon glyphicon-home">Home</span></a>
                        </li>
                        <li>chercher apéro</li>
                        <li>organiser apéro</li>
                        <li>se connecter</li>
                    </ul>
                @show
            </div>
        </nav>
    </div>
</div>
<!-- navigation -->