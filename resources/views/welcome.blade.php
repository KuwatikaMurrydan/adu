@extends('layouts.app')

@section('content')
<div class="container-fluid bg-green">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-3 text-primary fw-bold">Sistem Pengaduan Desa Wanajaya</h1>
            <p class="lead text-dark">Masyarakat yang kuat dimulai dari keberanian untuk berbicara.</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body text-center">
                    <div class="icon-circle bg-success text-white mb-3">
                        <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5 class="card-title fw-bold">Ajukan Pengaduan</h5>
                    <p class="card-text text-muted">Dengan respon cepat, lengkapi dengan detail dan lampiran pengaduan Anda.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body text-center">
                    <div class="icon-circle bg-info text-white mb-3">
                        <i class="fas fa-search-location fa-2x"></i>
                    </div>
                    <h5 class="card-title fw-bold">Lacak Status</h5>
                    <p class="card-text text-muted">Pantau status pengaduan Anda secara real-time.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body text-center">
                    <div class="icon-circle bg-warning text-white mb-3">
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                    <h5 class="card-title fw-bold">Respon Tanggapan</h5>
                    <p class="card-text text-muted">Terima tanggapan dan pembaruan atas pengaduan Anda secara tepat waktu.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center mb-4 text-success fw-bold">Langkah Mengajukan Pengaduan</h2>
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item bg-light">Buat akun atau login jika sudah memiliki akun</li>
                        <li class="list-group-item bg-light">Klik "Ajukan Pengaduan" dari dashboard Anda</li>
                        <li class="list-group-item bg-light">Isi detail pengaduan dengan informasi yang akurat</li>
                        <li class="list-group-item bg-light">Unggah dokumen atau foto yang relevan</li>
                        <li class="list-group-item bg-light">Ajukan dan pantau status pengaduan Anda</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mx-auto text-center">
            <h3 class="fw-bold text-success">Kontak Darurat</h3>
            <p class="lead text-dark">
                <strong>Telepon:</strong> 0823-4565-7898<br>
                <strong>Email:</strong> kelompok@gmail.com
            </p>
        </div>
    </div>
</div>
@endsection
