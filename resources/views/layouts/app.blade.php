<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(Auth::user())
        <meta name="user-id" content="{{ Auth::id() }}">
        <meta name="broadcaster-host" content="{{env('BROADCASTER_HOST')}}">
        <meta name="broadcaster-key" content="{{env('BROADCASTER_KEY')}}">
        @endif

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @foreach (config('plugins.css') as $css)
        <link href="{{ $css }}?{{filemtime(public_path($css))}}" rel="stylesheet">
        @endforeach
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            @yield('content')
        </div>
        @if(Auth::user())
        @foreach (config('plugins.javascript_before') as $javascript)
        <script src="{{ $javascript }}?{{filemtime(public_path($javascript))}}" defer></script>
        @endforeach
        @endif
        <script>
            window._locale = '{{ app()->getLocale() }}';
            window._translations = {!! cache('translations') !!};
        </script>
        @if(Auth::user())
        <script src="{{ mix('js/manifest.js') }}" defer></script>
        <script src="{{ mix('js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        @foreach (config('plugins.javascript') as $javascript)
        <script src="{{ $javascript }}?{{filemtime(public_path($javascript))}}" defer></script>
        @endforeach
        @endif
    </body>
</html>
