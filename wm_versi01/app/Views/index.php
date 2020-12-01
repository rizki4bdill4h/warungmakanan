<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img/slide/home1.jpg" class="img-fluid" alt="warungmakanan">
        </div>
        <div class="carousel-item">
            <img src="/assets/img/slide/home2.jpg" class="img-fluid" alt="warungmakanan">
        </div>
        <div class="carousel-item">
            <img src="/assets/img/slide/home3.jpg" class="img-fluid" alt="warungmakanan">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- =========================================================================================== catagory menu  -->
<style>
    .list-menu>.table-responsive::-webkit-scrollbar {
        visibility: hidden;
    }
</style>

<main class="list-menu">
    <h5 class="ctg">katagori catring</h5>
    <div class="table-responsive">
        <div class="d-flex">
            <div class="ctr">
                <img src="/assets/img/catring/harian.webp" alt="">
                <p class="tls">harian</p>
            </div>
            <div class="ctr">
                <img src="/assets/img/catring/kantor.webp" alt="">
                <p class="tls">kantor</p>
            </div>
            <div class="ctr">
                <img src="/assets/img/catring/hajatan.webp" alt="">
                <p class="tls"> hajatan</p>
            </div>
            <div class="ctr">
                <img src="/assets/img/catring/nasibox.webp" alt="">
                <p class="tls">nasibox</p>
            </div>
            <div class="ctr">
                <img src="/assets/img/catring/snaxbox.webp" alt="">
                <p class="tls">snack</p>
            </div>
        </div>
    </div>
    <h5 class="ctg">katagori menu</h5>
    <div class="table-responsive">
        <div class="d-flex">
            <div class="ctr">
                <a href="/listmenu/menudaging"><img src="/assets/img/menu/daging.webp" alt="">
                    <p class="tls">Daging</p>
                </a>
            </div>
            <div class="ctr">
                <a href="/listmenu/menuayam"> <img src="/assets/img/menu/ayam.webp" alt="">
                    <p class="tls">Ayam</p>
                </a>
            </div>
            <div class="ctr">
                <a href="/listmenu/menuikan"> <img src="/assets/img/menu/ikan.webp" alt="">
                    <p class="tls"> Ikan</p>
                </a>
            </div>
            <div class="ctr">
                <a href="/listmenu/menutelor"> <img src="/assets/img/menu/telor.webp" alt="">
                    <p class="tls">Telor</p>
                </a>
            </div>
            <div class="ctr">
                <a href="/listmenu/menusayur"> <img src="/assets/img/menu/lainya.webp" alt="">
                    <p class="tls">Lainya</p>
                </a>
            </div>
        </div>
    </div>
</main>



<!-- =============================================================================================menu daging -->

<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="tekcol">
                <div class="head-tekcol">
                    <div class="text-tekcol">Menu Daging</div>
                </div>
                <div class="lhs"><a class="link-tekcol" href="/listmenu/menudaging">Lihat Semua</a></div>
            </div>
            <div class="table-responsive">
                <div class="d-flex mt-2 ">
                    <?php foreach ($daging as $w => $da) : ?>
                        <?php if ($w == 6) break; ?>
                        <div class="allbox">
                            <div class="crh">
                                <img src="/assets/img/menudaging/<?php echo $da['sampul']; ?>" class="im-crh">
                                <a href="/listmenu/detaildaging/<?php echo $da['slug']; ?>" class="d-flex justify-content-center">
                                    <img src="/assets/img/bg/detail.webp" class="align-self-center">
                                </a>
                            </div>
                            <div class="crf">
                                <p><?php echo $da['judul']; ?></p>
                                <p class="text-muted"><span style="font-weight: 600;">Rp </span> <?php echo $da['harga']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!--================================================================================Menu ayam -->
<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="tekcol">
                <div class="head-tekcol">
                    <div class="text-tekcol">Menu Ayam</div>
                </div>
                <div class="lhs"><a class="link-tekcol" href="/listmenu/menuayam">Lihat Semua</a></div>
            </div>
            <div class="table-responsive">
                <div class="d-flex mt-2">
                    <?php foreach ($ayam as $w => $ay) : ?>
                        <?php if ($w == 5) break; ?>
                        <div class="allbox">
                            <div class="crh">
                                <img src="/assets/img/menuayam/<?php echo $ay['sampul']; ?>" class="im-crh">
                                <a href="/listmenu/detailayam/<?php echo $ay['slug']; ?>" class="d-flex justify-content-center">
                                    <img src="/assets/img/bg/detail.webp" class="align-self-center">
                                </a>
                            </div>
                            <div class="crf">
                                <p><?php echo $ay['judul'] ?></p>
                                <p class="text-muted"><span style="font-weight: 600;">Rp </span><?php echo $ay['harga']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- ======================================================Menu ikan  -->
<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="tekcol">
                <div class="head-tekcol">
                    <div class="text-tekcol">Menu Ikan</div>
                </div>
                <div class="lhs"><a class="link-tekcol" href="/listmenu/menuikan">Lihat Semua</a></div>
            </div>
            <div class="table-responsive">
                <div class="d-flex  mt-2">
                    <?php foreach ($ikan as $w => $ik) : ?>
                        <?php if ($w == 5) break; ?>
                        <div class="allbox">
                            <div class="crh">
                                <img src="/assets/img/menuikan/<?php echo $ik['sampul']; ?>" class="im-crh">
                                <a href="/listmenu/detailikan/<?php echo $ik['slug']; ?>" class="d-flex justify-content-center">
                                    <img src="/assets/img/bg/detail.webp" class="align-self-center">
                                </a>
                            </div>
                            <div class="crf">
                                <p><?php echo $ik['judul']; ?></p>
                                <p class="text-muted"><span style="font-weight: 600;">Rp </span><?php echo $ik['harga']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- ======================================================Menu telor -->
<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="tekcol">
                <div class="head-tekcol">
                    <div class="text-tekcol">Menu telor</div>
                </div>
                <div class="lhs"><a class="link-tekcol" href="/listmenu/menutelur">Lihat Semua</a></div>
            </div>
            <div class="table-responsive">
                <div class="d-flex mt-2">
                    <?php foreach ($telor as $w => $tl) : ?>
                        <?php if ($w == 5) break; ?>
                        <div class="allbox">
                            <div class="crh">
                                <img src="/assets/img/menutelur/<?php echo $tl['sampul']; ?>" class="im-crh">
                                <a href="/listmenu/detail/<?php echo $tl['slug']; ?>" class="d-flex justify-content-center">
                                    <img src="/assets/img/bg/detail.webp" class="align-self-center">
                                </a>
                            </div>
                            <div class="crf">
                                <p><?php echo $ik['judul']; ?></p>
                                <p class="text-muted"><span style="font-weight: 600;">Rp </span><?php echo $ik['harga']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- ========================================Menu lainya -->
<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="tekcol">
                <div class="head-tekcol">
                    <div class="text-tekcol">Menu Lainya</div>
                </div>
                <div class="lhs"><a class="link-tekcol" href="/listmenu/menulainya">Lihat Semua</a></div>
            </div>
            <div class="table-responsive">
                <div class="d-flex mt-2">
                    <?php foreach ($lainya as $w => $ln) : ?>
                        <?php if ($w == 5) break; ?>
                        <div class="allbox">
                            <div class="crh">
                                <img src="/assets/img/menulainya/<?php echo $ln['sampul']; ?>" class="im-crh">
                                <a href="/listmenu/detaillainya/<?php echo $ln['slug']; ?>" class="d-flex justify-content-center">
                                    <img src="/assets/img/bg/detail.webp" class="align-self-center">
                                </a>
                            </div>
                            <div class="crf">
                                <p><?php echo $ln['judul']; ?></p>
                                <p class="text-muted"><span style="font-weight: 600;">Rp </span><?php echo $ln['harga']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>



<!-- =========================list  -->
<style>
    .flex-device {
        min-width: 100%;
        margin-right: 1rem;
    }

    .device {
        min-width: 95%;
        box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.1);
        padding-right: 1rem;
        margin-bottom: 1rem;
        margin-right: 10px;
        margin-left: 10px;
        text-align: center;
    }

    .slide-card {
        /* height: 150px;
        width: 150px; */
        padding-top: 2rem;
        align-self: center;
    }
</style>
<main class="list-device table-responsive ">
    <div class="d-flex flex-device">
        <div class="card device">
            <img src="/assets/img/list-slide/halal.webp" class="slide-card" alt="...">
            <div class="card-body">
                <h5 class="card-title">Dimasak Tanpa MSG (Vetsin)</h5>
                <p class="card-text">Katering harian sehat untuk keluarga, kantor, dan sekolah dimasak tanpa vetsin (MSG) sangat cocok sekali untuk orang yang sedang sakit dan orang orang yang menjalani hidup sehat.</p>
            </div>
        </div>
        <div class="card device">
            <img src="/assets/img/list-slide/deleveri.webp" class="slide-card" alt="...">
            <div class="card-body">
                <h5 class="card-title">Menyesuaikan Pantangan</h5>
                <p class="card-text">Masakan katering harian bisa disesuaikan dengan permintaan khusus jika ada pantangan atau alergi baik terhadap garam, gula, pedas, seafood atau yang lainya. </p>
            </div>
        </div>
        <div class="card device">
            <img src="/assets/img/list-slide/budget.webp" class="slide-card" alt="...">
            <div class="card-body">
                <h5 class="card-title">Menyesuaikan Budget</h5>
                <p class="card-text">Untuk menu Prasmanan, Nasi Bok dan Tumpeng, untuk acara pernikahan, syukuran atau rapat, harganya dan menunya bisa menyesuaikan dengan budget termasuk untuk mahasiswa.</p>
            </div>
        </div>
    </div>
</main>

<style>
    .bento {
        background: url(/assets/img/list-slide/bg-content.webp);
        background-size: cover;
        text-align: center;
    }

    .img-bento {
        padding-bottom: 2rem;
        padding-top: 10px;
    }
</style>
<main class="bento">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="/assets/img/list-slide/bento.webp" alt="" class="img-fluid img-bento">
            </div>
        </div>
    </div>
</main>








<?= $this->endsection(); ?>