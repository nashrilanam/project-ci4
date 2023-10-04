<?php $this->extend('layout/admin'); ?>
<?php $this->section('content'); ?>

<?php
$besan = session()->getFlashdata('pesan');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Bencana Alam</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Bencana Alam</li>
            </ol>
            <!-- button tambah data -->
            <div class="row mb-3">
                <div class="col-sm-10">
                    <a href="/admin/tambah/bencana" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bencana</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                                <th>Rekomendasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Bencana</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                                <th>Rekomendasi</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($bencana as $b) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                        <?= $b['nama_bencana']; ?>
                                    </td>
                                    <td><?= $b['keterangan']; ?></td>
                                    <td><?= $b['waktu']; ?></td>
                                    <td><?= $b['rekomendasi']; ?></td>
                                    <td>
                                        <a href="/bencana/edit/<?= $b['id']; ?>" class="btn btn-primary" >Edit</a>
                                        <form action="/bencana/<?= $b['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal<?= $b['id']; ?>">Detail</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($besan) { ?>
                                <h5 style="color:green"><?php echo $besan ?><h5>
                                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php foreach ($bencana as $b) : ?>
            <div class="modal fade" id="Modal<?= $b['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Id : <?= $b['id']; ?></h6>
                            <h6>Nama Bencana : <?= $b['nama_bencana']; ?></h6>
                            <h6>Keterangan : <?= $b['keterangan']; ?></h6>
                            <h6>Waktu : <?= $b['waktu']; ?></h6>
                            <h6>Rekomendasi : <?= $b['rekomendasi']; ?></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <?php $this->endSection(); ?>