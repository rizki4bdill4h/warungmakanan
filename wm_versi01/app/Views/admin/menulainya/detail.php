<?= $this->extend('layout/admin/template'); ?>



<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/assets/img/menulainya/<?= $lainya['sampul']; ?>" class="card-img" alt="<?= $lainya['judul']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $lainya['judul']; ?></h5>
                            <p class="card-text"><?= $lainya['deskripsi']; ?></p>
                            <a href="/akses/lainya/<?= $lainya['slug']; ?>" type="button" class="btn btn-warning">Ubah</a>
                            <form action="/akses/lainya/<?= $lainya['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('serius mau di hapus.?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>