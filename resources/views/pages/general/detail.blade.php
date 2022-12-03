@extends('layouts.base')

@section('content')
    <div class="main-detail position-relative">
        {{-- close button --}}
        <a class="btn border-black btn-sm" href="{{ route('reporting.tracking') }}" style="position: absolute; top: 0; right: 0;"><span class="me-2">&#215;</span> {{ __('view.close') }}</a>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="true">{{ __('view.detail') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="result-tab" data-bs-toggle="tab" data-bs-target="#result-tab-pane" type="button" role="tab" aria-controls="result-tab-pane" aria-selected="false">{{ __('view.result') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ask" data-bs-toggle="tab" data-bs-target="#ask-pane" type="button" role="tab" aria-controls="ask-pane" aria-selected="false">{{ __("view.ask_team") }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                @include('pages.general.components.detail_summary')
            </div>
            <div class="tab-pane fade" id="result-tab-pane" role="tabpanel" aria-labelledby="result-tab" tabindex="0">
                @include('pages.general.components.result')
            </div>
            <div class="tab-pane fade" id="ask-pane" role="tabpanel" aria-labelledby="ask" tabindex="0">
                @include('pages.general.components.ask')
            </div>
        </div>
    </div>
@endsection