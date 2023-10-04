<?= $this->extend('layout/user'); ?>

<?= $this->section('content'); ?>

<section id="hero">

<div class="container" >
<table class="table " id="productTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Bencana Alam</th>
        <th>Keterangan</th>
        <th>Waktu</th>
        <th>Rekomendasi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($bencana as $b) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $b['nama_bencana']; ?></td>
          <td><?= $b['keterangan']; ?></td>
          <td><?= $b['waktu']; ?></td>
          <td><?= $b['rekomendasi']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</section>

<?= $this->endSection(); ?>