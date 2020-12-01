<?= $this->extend('layout/admin/template'); ?>



<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/assets/img/menudaging/<?= $daging['sampul']; ?>" class="card-img" alt="<?= $daging['judul']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $daging['judul']; ?></h5>
                            <p class="card-text"><?= $daging['deskripsi']; ?></p>
                            <a href="/akses/daging/<?= $daging['slug']; ?>" type="button" class="btn btn-warning">Ubah</a>
                            <form action="/akses/daging/<?= $daging['id']; ?>" method="post" class="d-inline">
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