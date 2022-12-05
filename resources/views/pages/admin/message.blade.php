@extends('layouts.admin')

@section('content')
    <div class="main-message">
        <p class="title fw-bold">{{ $title }}</p>

        <div class="table-responsive mt-5">
            <table class="table w-100 table-striped" id="table-admin-message">
                <thead>
                    <tr class="fw-bold text-capitalize">
                        <th>#</th>
                        <th>No. Pengaduan</th>
                        <th>Penanya</th>
                        <th>Waktu</th>
                        <th>status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modalMessage" tabindex="-1" aria-labelledby="modalMessageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="title fw-bold text-navy">Pertanyaan Masuk | No. Pengaduan WRK6JB/2022</p>

                    <form action="form-change-status" class="mt-3">
                        <div class="mb-3">
                            <form action="">
                                <div class="form-group mb-3">
                                    <textarea name="question" placeholder="Lorem ipsum dolor sit amet" id="question" cols="3" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col">
                                        <div class="text-end">
                                            <a class="btn btn-navy" href="#">{{ __('view.send') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box p-3">
                            @include('pages.components.chat')
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
            {data: 'ticket', name: 'ticket'},
            {data: 'name', name: 'name'},
            {data: 'time', name: 'time'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ];

        let dt_route = "{{ route('admin.message.ajax') }}"
        const dt = setDataTable(
            'table-admin-message',
            columns,
            dt_route,
        )

        function showMessage() {
            $('#modalMessage').modal('show');
        }
    </script>
@endpush