<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.header')
    </head>
<body>
    <div class="container">
        <x-navbar />
        <div id="error-msg" class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div id="main" class="row">
                {{-- @dd($articles) --}}
                @if(request()->route()->getName() == 'home')
                <x-show_articles :articles="$articles"/>
                @endif
            @yield('content')
        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>
