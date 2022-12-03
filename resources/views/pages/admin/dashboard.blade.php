@extends('layouts.admin')

@section('content')
    <div class="dashboard pb-5">
        <p class="title fw-bold">{{ __('view.dashboard') }}</p>

        {{-- begin::card-info --}}
        <div class="card-info mt-3">
            <div class="card-info__1">
                <div>
                    <p class="fw-bold">110 <span class="text-uppercase">diterima</span></p>
                    <p class="fw-bold">110 <span class="text-uppercase">belum ditindaklanjuti</span></p>
                </div>
            </div>
            <div class="card-info__2">
                <p class="fw-bold">110 <span class="text-uppercase">kurang bukti</span></p>
                <p class="fw-bold">110 <span class="text-uppercase">diproses</span></p>
            </div>
            <div class="card-info__3">
                <p class="fw-bold">110 <span class="text-uppercase">terbukti</span></p>
                <p class="fw-bold">110 <span class="text-uppercase">tidak terbukti</span></p>
            </div>
        </div>
        {{-- end::card-info --}}

        {{-- begin::chart --}}
        @include('pages.admin.components.chart')
        {{-- end::chart --}}

        {{-- begin::latest table --}}
        @include('pages.admin.components.latest_report')
        {{-- end::latest table --}}
    </div>
@endsection