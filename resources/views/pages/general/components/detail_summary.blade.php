<div class="detail-tab__item mt-3">
    <div class="detail-tab__item-header d-flex align-items-center justify-content-between">
        <p class="title text-navy fw-bold">
            {{ __('view.reporting_detail_1') }} No. {{ $detail['ticket_number'] }}
        </p>
    
        <button class="btn btn-warning text-white pe-5 ps-5" type="button">
            <span class="text-uppercase d-block">{{ $detail['status_text'] }}</span>
            <span class="d-block" style="font-size: 12px;">{{ date('d M Y', strtotime($detail['created_at'])) }}</span>
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
                    <p class="col-form-label text-gray">{{ $detail['name'] ?? '-' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.phone') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">{{ $detail['phone'] ?? '-' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.email') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">{{ $detail['email'] ?? '-' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="time_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.time_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">{{ $detail['report_time_text'] ?? '-' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="place_reporting" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.place_reporting') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">{{ $detail['scene'] ?? '-' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="chronology" class="col-form-label fw-bold col-md-2 position-relative">
                    {{ __('view.chronology') }}
                    <span class="helper-sign">:</span>
                </label>
                <div class="col-md-4">
                    <p class="col-form-label text-gray">
                        {{ $detail['original_description']['description'] ?? '-' }}
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
                        @foreach ($detail['original_evidence'] as $key => $item)
                            <button class="btn btn-grey d-flex align-items-center gap-2"
                                type="button"
                                onclick="detailEvidence('{{ $item['image_path'] }}')">
                                <i class="bi bi-eye"></i>
                                Bukti {{ $key + 1 }}
                            </button>
                        @endforeach
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
                        @foreach ($detail['additional_evidence'] as $key => $item)
                            <button class="btn btn-grey d-flex align-items-center gap-2"
                                type="button"
                                onclick="detailEvidence('{{ $item['image_path'] }}')">
                                <i class="bi bi-eye"></i>
                                Bukti {{ $key + 1 }}
                            </button>
                        @endforeach
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
                        {{ $detail['additional_description'][0]['description'] ?? '-' }}
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
                <img id="img-evidence" src="{{ asset('assets/icons/dummy.jpg') }}" alt="preview-evidence" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function detailEvidence(url) {
            $('#img-evidence').attr('src', url);
            $('#DetailEvidence').modal('show');
        }
    </script>
@endpush