@extends('layouts.base')

@section('content')
    <div class="main-tracking">
        <div class="main-tracking__summary d-flex align-items-center justify-content-between">
            <div>
                <div class="d-flex align-items-center">
                    <p class="title text-navy fw-bold">
                        {{ __('view.reporting_status') }} No. WRKBJB/2022 :
                    </p>
                    <button class="btn btn-success text-uppercase ms-3">Diterima</button>
                </div>
                <p class="text-gray mt-3">Laporan bapak/Ibu telah kami terima dan akan kami tindak lanjuti</p>
            </div>
            <div>
                <button class="btn border-navy d-block" type="button" onclick="openTokenModal()">{{ __('view.reporting_detail') }}</button>
                <button class="btn btn-navy mt-3 d-block">{{ __('view.ask_investigator') }}</button>
            </div>
        </div>

        <div class="main-tracking__additional">
            <p class="mt-3 text-gray">Bapak Ibu juga dapat melampirkan bukti atau keterangan tambahan untuk laporan ini.</p>

            <div class="mt-4 d-flex align-items-center gap-3">
                <p class="fw-bold">Tambah Bukti/Keterangan:</p>
                <div>
                    <button class="btn text-center btn-grey me-2 btn-sm" onclick="openModal()" type="button">&#43;</button>
                    <span>{{ __('view.add_evidence') }}</span>
                </div>
            </div>
            <p class="text-gray" style="font-size: 13px;">Dapat berupa dokument, foto, dlsb.</p>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modalAdditionalEvidence" tabindex="-1" aria-labelledby="modalAdditionalEvidenceLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdditionalEvidenceLabel">Tambah Bukti</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row mb-3">
                            <label for="description" class="col-form-label col-md-3">{{ __('view.additional_description') }} : </label>
                            <div class="col-md-9">
                                <textarea name="description" id="description" cols="3" rows="3" class="form-control border-orange"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="evidences" class="col-form-label col-md-3 position-relative">
                                {{ __('view.upload_evidence') }}
                                <span class="helper-sign">:</span>
                                <p class="file-helper" style="font-size: 13px; color: darkgray;">Data berupa dokumen, foto, dlsb.</p>
                            </label>
                            <div class="col-md-9">
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
                            <div class="col-md-8">
                                <div class="text-end">
                                    <div class="d-flex align-items-center gap-3">
                                        {{-- captcha --}}
                                        <span>{!! $captcha !!}</span>
                                        <input type="text" name="captcha" class="form-control border-orange" placeholder="Captcha">
                                        <a class="btn btn-orange w-100" href="{{ route('reporting.success') }}">{{ __('view.send_report') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal token --}}
    <div class="modal fade" id="modalToken" tabindex="-1" aria-labelledby="modalTokenLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <form action="">
                        <div class="form-group mb-2">
                            <p class="fw-bold">{{ __('view.input_token') }}</p>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <div class="text-end">
                                <a class="btn btn-navy" href="{{ route('reporting.detail') }}">{{ __('view.submit') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal() {
            $('#modalAdditionalEvidence').modal('show');
        }

        function addEvidence(id) {
            const target = $('.target-files-form');
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

        function openTokenModal() {
            $('#modalToken').modal('show');
        }
    </script>
@endpush