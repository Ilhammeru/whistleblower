<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'MNK-app' }}</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- bootstrap-icon --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.css') }}">
    {{-- simplepicker --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplepicker/dist/simplepicker.css') }}">
    {{-- izitoast --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/izitoast/dist/css/iziToast.min.css') }}">
    {{-- main style --}}
    <link rel="stylesheet/less" type="text/css" href="{{ asset('css/main.css') }}" />
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
    {{-- simplepicker --}}
    <script src="{{ asset('assets/plugins/simplepicker/dist/simplepicker.js') }}"></script>
    {{-- izitoast --}}
    <script src="{{ asset('assets/plugins/izitoast/dist/js/iziToast.min.js') }}"></script>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function setNotif(isError, message) {
            if (isError) {
                if (typeof message == 'object') {
                    for (let a = 0; a < message.length; a++) {
                        iziToast.error({
                            title: 'Error',
                            message: message[a],
                            position: 'topRight'
                        })
                    }
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: message,
                        position: 'topRight'
                    });
                }
            } else {
                iziToast.success({
                    title: 'Success',
                    message: message,
                    position: 'topRight'
                });
            }
        }

        function setLoading(id, show, text = 'Submit') {
            let loading = `<div class="spinner-border text-dark" style="width: 1rem; height: 1rem;" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>`;
            if (show) {
                $(`#${id}`).html(loading);
                $(`#${id}`).prop('disabled', true);
            } else {
                $(`#${id}`).html(text);
                $(`#${id}`).prop('disabled', false);
            }
        }
    </script>
    @stack('scripts')
</body>
</html>