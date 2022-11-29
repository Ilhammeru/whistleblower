@extends('layouts.base')

@section('content')
    <div class="main-success">
        <p class="title text-navy fw-bold mb-3">{{ __('view.report_received') }}</p>
        <p class="content">
            Kami ucapkan terima kasih atas partisipasi bapak/ibu telah membuat laporan pengaduan di MNK whistleblower system.
        </p>

        <div class="summary">
            {{-- ticket --}}
            <div class="row">
                <div class="col-6 text-end d-flex align-items-center justify-content-end">
                    <p class="fw-bold">{{ __('view.no_registration') }} : </p>
                </div>
                <div class="col-6">
                    <button class="btn btn-orange btn-ticket">WRK6JB/2022</button>
                </div>
            </div>

            {{-- token --}}
            <div class="row mt-1">
                <div class="col-6 text-end d-flex align-items-center justify-content-end">
                    <p class="fw-bold">{{ __('view.token') }} : </p>
                </div>
                <div class="col-6">
                    <button class="btn border-black btn-token">4123</button>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="text-gray">{{ __('view.info_token_credential') }}</p>
            </div>
        </div>

        <div class="description mt-3">
            <p class="content text-gray">
                Bapak/Ibu dapat memantau progres tindak lanjut laporan pada menu sebelumnya dengan menginput nomor laporan tesebut.
                Isi laporan anda kami jamin kerahasiaanya dan akan kami tindak lanjuti sesuai peraturan dan ketentuan yang berlaku.
            </p>
            <br>
            <p class="content text-gray">
                PT. Multi Nitrotama Kimia memiliki komitmen untuk perusahaan secara profesional dengan berlandaskan pada perilaku perusahaan yang sesuai
                dengan Budaya Kerja dan sikap kerja perusahaan, khususnya nilai budaya Integritas.
            </p>
        </div>

        <div class="text-end mt-3">
            <a class="btn btn-navy" href="{{ route('reporting.index') }}">{{ __('view.back_to_home') }}</a>
        </div>
    </div>
@endsection