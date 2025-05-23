<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/styleIndex.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dark-mode.css') }}" rel="stylesheet">
    <link href='{{ asset('fullcalendar-5.3.2/lib/main.css') }}' rel='stylesheet' />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!--CSS DINAMICO-->
    @yield('css')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('navbar')

    @if(View::hasSection('sidebar'))
        {{-- <div class="ml-auto mensagem"> apagar o css depois
        </div> --}}

        <main class="flex-grow-1">
            <div class="row">
                <div class="col-md-2">
                    @include('components.sidebar', ['evento' => $evento])

                </div>
                <div class="col-md-10 my-5">
                    @include('componentes.mensagens')

                    @yield('content')

                </div>
            </div>
        </main>

    @else
        @include('componentes.mensagens')

        <main class="flex-grow-1 my-5">
            @yield('content')
        </main>

    @endif

    @include('componentes.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-mask-plugin.js')}}"></script>
    <script defer src="{{ asset('js/alpine.js') }}"></script>
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/submit.js') }}"></script>
    <!-- CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- FullCalendar -->
    <script src='{{ asset('fullcalendar-5.3.2/lib/main.js') }}'></script>
    <script src='{{ asset('fullcalendar-5.3.2/lib/locales-all.js') }}'></script>

    @hasSection('javascript')
    @yield('javascript')
    @endif
</body>

</html>
