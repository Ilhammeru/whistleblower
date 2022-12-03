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
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    {{-- iziToast --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/izitoast/dist/css/iziToast.min.css') }}">
    {{-- main style --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    {{-- custom css --}}
    <style>
        .container-message .message-box {
            padding: 5px;
            box-shadow: 1px 2px 11px -2px rgba(84,75,75,0.75);
            -webkit-box-shadow: 1px 2px 11px -2px rgba(84,75,75,0.75);
            -moz-box-shadow: 1px 2px 11px -2px rgba(84,75,75,0.75);
        }
    </style>
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
    @php
        $set_header = true;
        $set_sidebar = true;
        if (isset($with_header)) {
            $set_header = $with_header;
        }
        if (isset($with_sidebar)) {
            $set_sidebar = $with_sidebar;
        }
    @endphp

    @if ($set_header)
        @include('layouts.partials.admin_header')
    @endif

    @if ($set_sidebar)
        @include('layouts.partials.sidebar')
    @endif

    {{-- content --}}
    <div class="container-fluid">
        <div class="main-section {{ !$set_sidebar && !$set_header ? 'plain' : '' }}">
            @yield('content')
        </div>
    </div>

    {{-- bootstrap --}}
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- datatables --}}
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    {{-- izitoast --}}
    <script src="{{ asset('assets/plugins/izitoast/dist/js/iziToast.min.js') }}"></script>
    {{-- app.js --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- tippy.js --}}
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    {{-- session alert --}}
    @include('layouts.partials.message-alert')

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

        // set active sidebar (SIMPLE METHOD)
        let currentUrl = window.location.href;
        let split = currentUrl.split('/');
        let item = split.pop();
        if (item == 'dashboard') {
            $('#dashboard-nav').addClass('active');
        } else if (item == 'report') {
            $('#report-nav').addClass('active');
        } else if (item == 'message') {
            $('#message-nav').addClass('active');
        }

        function setDataTable(tableId, columns, route) {
            let dt = $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                ajax: route,
                columns: columns,
                drawCallback: function (settings, json) {
                    tippy('[data-tippy-content]');
                },
                order: [[0, 'desc']]
            });
            return dt;
        }
    </script>
    @stack('scripts')
</body>
</html>