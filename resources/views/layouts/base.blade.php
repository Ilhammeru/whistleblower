<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'MNK-app' }}</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- main style --}}
    <link rel="stylesheet/less" type="text/css" href="{{ asset('assets/css/main.less') }}" />

    {{-- custom css --}}
    @stack('styles')

    {{-- define less --}}
    <script>
        less = {
            env: "development",
            async: false,
            fileAsync: false,
            poll: 1000,
            functions: {},
            dumpLineNumbers: "comments",
            relativeUrls: false,
        };
    </script>
    {{-- less --}}
    <script src="{{ asset('assets/plugins/less/dist/less.min.js') }}"></script>
    {{-- jquery --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
</head>
<body>
    @include('layouts.partials.header')

    @include('layouts.partials.navbar')


    {{-- content --}}
    <div class="container-fluid">
        <div class="main-section">
            @yield('content')
        </div>

        {{-- footer --}}
    </div>
    
    @include('layouts.partials.footer')

    {{-- bootstrap --}}
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- custom script --}}
    <script>
        $(window).on("scroll", function() {
            if($(window).scrollTop() > 100) {
                $(".navbar").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
            $(".navbar").removeClass("active");
            }
        });
    </script>
    @stack('scripts')
</body>
</html>