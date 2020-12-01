<?php echo $this->extend('layout/template'); ?>



<?php echo $this->section('content'); ?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img/slide/home2.jpg" class="img-fluid" alt="...">
        </div>
    </div>
</div>


<!-- ===============================================menu daging -->
<div class="container">
    <div class="row mt-4 mr-1">
        <?php foreach ($daging as $da) : ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                <div class="fullbox shadow">
                    <div class="cmd">
                        <img src="/assets/img/menudaging/<?php echo $da['sampul']; ?>" class="img-cmd">
                        <a href="/listmenu/detaildaging/<?php echo $da['slug']; ?>" class="d-flex justify-content-center">
                            <img src="/assets/img/bg/detail.webp" class="align-self-center">
                        </a>
                    </div>
                    <div class="crp">
                        <p><?php echo $da['judul']; ?></p>
                        <p class="pb-3 text-muted"><span style="font-weight: 600;">Rp </span><?php echo $da['harga']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</main>


<?php echo $this->endSection(); ?>