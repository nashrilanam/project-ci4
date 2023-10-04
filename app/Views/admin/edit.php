<?php $this->extend('layout/admin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data</h1>

            <!-- form edit data -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Data Bencana Alam
                </div>
                <div class="card-body">
                    <form action="/bencana/update/<?= $bencana['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $bencana['id']; ?>">
                        <div class="row mb-3">
                            <label for="nama_bencana" class="col-sm-2 col-form-label">Nama Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_bencana')) ? 'is-invalid' : ''; ?>" id="nama_bencana" name="nama_bencana" autofocus value="<?= (old('nama_bencana')) ? old('nama_bencana') : $bencana['nama_bencana']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_bencana'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $bencana['keterangan']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('keterangan'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" id="waktu" name="waktu" value="<?= (old('waktu')) ? old('waktu') : $bencana['waktu']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('waktu'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('rekomendasi')) ? 'is-invalid' : ''; ?>" id="rekomendasi" name="rekomendasi" value="<?= (old('rekomendasi')) ? old('rekomendasi') : $bencana['rekomendasi']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('rekomendasi'); ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
            <!-- end form edit data -->
    </main>

    <?php $this->endSection(); ?>