<?= $this->extend('layout/admin/template'); ?>


<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2>Form Menu lainya</h2>
            <!-- ambil validation -->
            <form action="/akses/updatelainya/<?= $lainya['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="slug" value="<?= $lainya['slug']; ?>" ?>
                <input type="hidden" name="sampulLama" value="<?= $lainya['sampul']; ?>">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $lainya['judul']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $lainya['harga']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control  <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value=""><?= (old('deskripsi')) ? old('deskripsi') : $lainya['deskripsi']; ?></textarea>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('deskripi'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
                    <div col-sm-2>
                        <img src="/assets/img/menulainya/<?= $lainya['sampul']; ?>" class="img-thumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul"><?= $lainya['sampul']; ?></label>

                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>