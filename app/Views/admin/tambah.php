<?php $this->extend('layout/admin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data</h1>

            <!-- form edit data -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tambah Data Bencana Alam
                </div>
                <div class="card-body">
                    <form action="/bencana/admin/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_bencana" name="nama_bencana" autofocus placeholder="Nama Bencana">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_bencana'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('keterangan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('waktu'); ?>
                                </div>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Rekomendasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" placeholder="Rekomendasi">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('rekomendasi'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
            <!-- end form edit data -->
    </main>

    <?php $this->endSection(); ?>