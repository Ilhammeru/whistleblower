@extends('layouts.admin', ['with_sidebar' => false, 'with_header' => false])

@section('content')
    <div class="row h-100">
        <div class="col-md-8 border-end"></div>
        <div class="col-md-4">
            <div class="container-login">
                <div class="box-login">
                    <div class="row">
                        <div class="col">
                            {{-- logo --}}
                            <div class="logo">
                                <img src="{{ asset('assets/icons/logomnk.png') }}" alt="">
                            </div>
                            <div class="title">
                                <p>{{ __('view.whistleblower') }}</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.login.post') }}" method="POST" id="form-login">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username" class="col-form-label">{{ __('view.username') }}</label>
                            <input type="text" placeholder="{{ __('view.username') }}" value="{{ old('username') }}" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="col-form-label">{{ __('view.password') }}</label>
                            <div class="password-container position-relative">
                                <input type="password" placeholder="{{ __("view.password") }}" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">
                                <i class="bi bi-eye open position-absolute" id="btn-show-password" onclick="togglePassword('show')"></i>
                                <i class="bi bi-eye-slash close position-absolute" id="btn-hide-password" onclick="togglePassword('hide')"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-sm border bg-transparent w-25" type="submit">{{ __('view.login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function togglePassword(action) {
            if (action == 'show') {
                $('#password').attr('type', 'text');
                $('#btn-show-password').removeClass('open')
                $('#btn-show-password').addClass('close')
                $('#btn-hide-password').removeClass('close')
                $('#btn-hide-password').addClass('open')
            } else {
                $('#password').attr('type', 'password');
                $('#btn-hide-password').removeClass('open')
                $('#btn-hide-password').addClass('close')
                $('#btn-show-password').removeClass('close')
                $('#btn-show-password').addClass('open')
            }
        }
    </script>
@endpush