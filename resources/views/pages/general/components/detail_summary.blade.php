<div class="detail-tab__item mt-3">
    <div class="detail-tab__item-header d-flex align-items-center justify-content-between">
        <p class="title text-navy fw-bold">
            {{ __('view.reporting_detail_1') }} No. WRK6JB/2022
        </p>
    
        <button class="btn btn-warning text-white pe-5 ps-5" type="button">
            <span class="text-uppercase d-block">diproses</span>
            <span class="d-block" style="font-size: 12px;">11 Nov 2022</span>
        </button>
    </div>

    <div class="detail-tab__item-body">
        {{-- main section --}}
        <div class="main pb-4 border-bottom">
            <div class="form-group row">
                <label for="name" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.name_and_company') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">detektifconan - Kantor Pajak</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.phone') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">0812-3456-7890</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.email') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">abc@def.com</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="time_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.time_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">Senin, 10 November 2022</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="place_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.place_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">Tugu Pahlawan, Surabaya</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="chronology" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.chronology') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit blanditiis excepturi quo ullam nulla! Ea necessitatibus voluptas quia eaque perferendis accusamus dolorum pariatur illo, iure numquam porro corrupti deleniti tempora.
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="place_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.first_evidence') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <button class="btn btn-grey d-flex align-items-center gap-2"
                            type="button"
                            onclick="detailEvidence()">
                            <i class="bi bi-eye"></i>
                            Bukti 1
                        </button>
                        <button class="btn btn-grey d-flex align-items-center gap-2"
                            type="button"
                            onclick="detailEvidence()">
                            <i class="bi bi-eye"></i>
                            Bukti 2
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- additional section --}}
        <div class="additional mt-3 mb-5">
            <div class="form-group row">
                <label for="place_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.additional_evidence') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <button class="btn btn-grey d-flex align-items-center gap-2"
                            type="button" onclick="detailEvidence()">
                            <i class="bi bi-eye"></i>
                            Bukti 3
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="additional_description" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.additional_description') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit blanditiis excepturi quo ullam nulla! Ea necessitatibus voluptas quia eaque perferendis accusamus dolorum pariatur illo, iure numquam porro corrupti deleniti tempora.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal-view-evidence --}}
<div class="modal fade" id="DetailEvidence" tabindex="-1" aria-labelledby="DetailEvidenceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DetailEvidenceLabel">Detail Bukti</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('assets/icons/dummy.jpg') }}" alt="preview-evidence" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function detailEvidence() {
            $('#DetailEvidence').modal('show');
        }
    </script>
@endpush