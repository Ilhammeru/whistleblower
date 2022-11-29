@extends('layouts.base')

@section('content')
    <div class="report-greeting">
        <p class="title">Selamat Datang di MNK Whistleblowing System</p>
        <br>
        <p class="content">
            MNK Whistleblowing System adalah aplikasi yang disediakan oleh PT. Multi Nitrotama Kimia bagi pihak eksternal dan internal perusahaan,
            yang memiliki informasi dan ingin melaporkan suatu perbuatan berindikasi <i>Fraud</i> dan/atau
            pelanggaran yang terjadi di lingkungan perusahaan.
            <br><br>
            Anda tidak perlu khawatir terungkapnya identitas diri anda karena PT. Multi Nitrotama Kimia akan merahasiakan identitas diri anda
            sebagai whitleblower. PT. Multi Nitrotama Kimia menghargai informasi yang anda laporkan.
            Fokus kami kepada materi informasi yang Anda Laporkan.
        </p>
        <br>
        <p class="title">Penyapaian Pelaporan</p>
        <br>
        <p class="content">
            Dalam rangka mempermudah dan mempercepat proses tindak lanjut, pengaduan <i>fraud</i> dan/atau pelanggaran
            yang dilaporkan, sebaiknya dapat memenuhi informasi yang jelas dan dapat dipertanggungjawabkan serta dilengkapi dengan bukti yang relevan,
            kompeten dan cukup, diantaranya meliputi:
            <br>
        </p>
        <br>
        <ul>
            <li>
                <b>What: </b> Perbuatan berindikasi pelanggaran yang diketahui
            </li>
            <li>
                <b>Where: </b> Dimana perbuatan tersebut dilakukan
            </li>
            <li>
                <b>When: </b> Kapan perbuatan tersebut dilakukan
            </li>
            <li>
                <b>Who: </b> Siapa saja yang terlibat dalam perbuatan tersebut
            </li>
            <li>
                <b>How: </b> Bagaimana perbuatan tersebut dilakukan (modus, cara, bukti, kerugian, dsb.)
            </li>
        </ul>
        <br>
        <p class="content">
            Selain, dengan dashoard pada web ini pelaporan juga dapat langsung dikirimkan melalui email <b>pengaduan@mnk.co.id</b>
            dan whatsapp melalui nomor <b>+6281xxxxxxx</b>
        </p>
    </div>

    <div class="report-section mt-3">
        <div class="text-end">
            <a class="btn btn-orange" href="{{ route('reporting.create') }}">{{ __('view.create_report') }}</a>
        </div>

        <p class="follow-up text-navy fw-bold mt-3 mb-3">{{ __('view.follow_up') }}</p>
        <p class="follow-up-content mb-3">
            Apabila Bapak/Ibu ingin mengetahui status, perkembangan dan tindak lanjut atas laporan yang telah dibuat,
            dapat meninput nomor laporan pengaduan pada menu dibawah ini:
        </p>
        <div class="tracking">
            <form action="" id="tracking">
                <div class="form-group row">
                    <label for="ticket" class="col-form-label col-md-1">{{ __('view.ticket') }}:</label>
                    <div class="col-md-3">
                        <input type="text" name="ticket" class="form-control border-orange w-100" id="ticket">
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-orange" id="btn-tracking" href="{{ route('reporting.tracking') }}">{{ __('view.track') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection