<?= $this->extend('layout/admin/template'); ?>


<?= $this->section('content'); ?>
<style>
    .sampul {
        width: 60px;
    }

    .table>tbody>tr>* {
        vertical-align: middle;
    }
</style>

<div class="container-fluid">

    <h4>daftar Menu Ayam</h4>
    <a href="/akses/createayam" class="btn btn-primary mb-2">Tambah Menu Ayam</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="wrap table-responsive">
        <table class="table table-bordered  bg-white mt-2 text-align-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">judul</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php $i = 1 + (5 * ($page - 1)); ?>
                    <?php foreach ($ayam as $am) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/assets/img/menuayam/<?= $am['sampul'] ?>" alt="" class="sampul"></td>
                        <td><?= $am['judul']; ?></td>
                        <td><a href="/akses/detailayam/<?= $am['slug']; ?>" class="btn btn-success">detail</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links() ?>
</div>





<?= $this->endSection(); ?>