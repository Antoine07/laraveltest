@include('partials.header')
<div class="container header">
    <div class="row header">
        <div class="col-lg-8">
            <h1><a href="{{url('/')}}">Blog-Laravel</a></h1>
        </div>
        <div class="col-lg-4 col-xs-offset-4">
            <blockquote>
                @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            </blockquote>
        </div>
    </div>
</div><!-- header-->
<div class="container content">
    <div class="row content">
        <div class="col-lg-8">
            @yield('content')
        </div>
        @section('sidebar')
            <div class="col-lg-4">
                Sidebar
            </div>
        @show
    </div>
</div><!-- content -->
@include('partials.footer')