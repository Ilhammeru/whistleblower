@extends('layouts.admin')

@section('content')
    <div class="main-reporting">
        <p class="title fw-bold">{{ __('view.reporting') }}</p>

        <div class="table-responsive mt-5">
            <table class="table w-100 table-striped" id="table-admin-reporting">
                <thead>
                    <tr class="fw-bold text-capitalize">
                        <th>#</th>
                        <th>Tgl. Masuk</th>
                        <th>pelapor</th>
                        <th>no. laporan</th>
                        <th>laporan via</th>
                        <th>status terakhir</th>
                        <th>aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modalChangeReportStatus" tabindex="-1" aria-labelledby="modalChangeReportStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="title fw-bold">{{ __('view.change_status') }}</p>

                    <form action="form-change-status" class="mt-3">
                        <div class="form-group row mb-3">
                            <label for="proof" class="col-form-label col-md-3">{{ __('view.proof') }}:</label>
                            <div class="col-md-9">
                                <select name="proof" id="proof" class="form-control form-control-sm">
                                    <option value="1">Memadahi</option>
                                    <option value="2">Tidak memadahi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="description" class="col-form-label col-md-3">{{ __('view.description') }}:</label>
                            <div class="col-md-9">
                                <textarea name="description" id="description" cols="3" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="file" class="col-form-label col-md-3">{{ __('view.upload_investigation_report') }}:</label>
                            <div class="col-md-9">
                                <input type="file" id="file" name="file">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="text-end">
                                <button class="btn btn-navy btn-sm" type="button">{{ __('view.save') }}</button>
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
        let columns = [
            {data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                } 
            },
            {data: 'created_at', name: 'created_at'},
            {data: 'name', name: 'name'},
            {data: 'ticket', name: 'ticket'},
            {data: 'channel', name: 'channel'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ];
        let dt_route = "{{ route('admin.reporting.ajax') }}"
        const dt = setDataTable(
            'table-admin-reporting',
            columns,
            dt_route,
        )

        function changeStatusReport() {
            $('#modalChangeReportStatus').modal('show');
        }
    </script>
@endpush