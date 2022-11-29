@extends('layouts.base')

@section('content')
    <div class="main-form-reporting">
        <p class="title text-navy fw-bold mb-3">{{ __('view.reporting_form') }}</p>
        <p class="content">
            Jangan khawatir! Kami akan menjamin kerahasiaan identitas diri anda sebagai <i>whistleblower</i>.
            Laporan dapat disampaikan dengan nama samaran/alias.
        </p>

        <form action="" id="form-reporting" class="mt-3" enctype="multipart/form-data">
            <div class="form-group row mb-3">
                <label for="name" class="col-form-label col-md-2 position-relative">
                    {{ __('view.name_and_company') }}
                    <span>*)</span>
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="name" id="name" class="form-control border-orange">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="phone" class="col-form-label col-md-2 position-relative">
                    {{ __('view.phone') }}
                    <span>*)</span>
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="phone" id="phone" class="form-control border-orange">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="email" class="col-form-label col-md-2 position-relative">
                    {{ __('view.email') }}
                    <span>*)</span>
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="email" id="email" class="form-control border-orange">
                </div>
            </div>

            <div class="row mb-3">
                <p class="form-note">*) bila tidak berkenan, dapat dikosongkan</p>
            </div>

            <div class="form-group row mb-3">
                <label for="time_reporting" class="col-form-label col-md-2 position-relative">
                    {{ __('view.time_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="time_reporting" id="time_reporting" class="form-control border-orange">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="place_reporting" class="col-form-label col-md-2 position-relative">
                    {{ __('view.place_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="place_reporting" id="place_reporting" class="form-control border-orange">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="chronology" class="col-form-label col-md-2 position-relative">
                    {{ __('view.chronology') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <textarea name="chronology" id="chronology" cols="5" rows="5" class="form-control border-orange"></textarea>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="evidences" class="col-form-label col-md-2 position-relative">
                    {{ __('view.upload_evidence') }}
                    <span class="helper-sign">:</span>
                    <p class="file-helper" style="font-size: 13px; color: darkgray;">Data berupa dokumen, foto, dlsb.</p>
                </label>
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-2 file-item">
                        <span class="no me-3">1.</span>
                        <input type="file" name="file_evidence[]">
                    </div>
                    <div class="target-files-form" id="target-files-form-0"></div>
                    <div class="file-container">
                        <div class="d-flex align-items-center mb-2">
                            <span class="no me-3 no-action">2.</span>
                            <button class="btn text-center btn-grey me-2 btn-sm" onclick="addEvidence(0)" type="button">&#43;</button>
                            <span>{{ __('view.add_evidence') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <div class="text-end">
                        {{-- captcha --}}
                        <span>{!! $captcha !!}</span>
                        <input type="text" name="captcha" class="form-control border-orange mt-2" placeholder="Captcha">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <div class="text-end">
                        {{-- <button class="btn btn-orange" type="button">{{ __('view.send_report') }}</button> --}}
                        <a class="btn btn-orange" href="{{ route('reporting.success') }}">{{ __('view.send_report') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const target = $('.target-files-form');
        
        function buildElemFile() {
            let sec = ``;
        }

        function addEvidence(id) {
            let fileItem = $('.file-item');
            let fileItemNo = fileItem.length;
            target.append(`
                    <div class="d-flex align-items-center mb-2 file-item">
                        <span class="no me-3">${fileItemNo + 1}.</span>
                        <input type="file" name="file_evidence[]">
                    </div>
            `);
            $('.no-action').html(parseInt(fileItemNo + 2));
        }
    </script>
@endpush