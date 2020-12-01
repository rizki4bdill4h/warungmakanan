<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<style>
    /* hilangin tombol whatsapp */
    @media only screen and (max-width: 768px) {
        .floating-whatsapp {
            display: none;
        }
    }

    @media only screen and (min-width: 768px) {
        .mt-5 {
            padding-top: 2rem;
        }
    }
</style>

<!-- Breadcrumbs -->
<div class="container mt-5">
    <nav>
        <ol class="breadcrumb  bg-transparent pl-0">
            <li class="breadcrumb-item"><a href="/listmenu">Listmenu</a></li>
            <li class="breadcrumb-item"><a href="/listmenu/menuikan">Menuikan</a></li>
            <li class="breadcrumb-item active" aria-current="page">menu <?php echo $ikan['judul']; ?></li>
        </ol>
    </nav>
</div>

<!-- Single Product -->
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <figure class="figure">
                    <img src="/assets/img/menuikan/<?php echo $ikan['sampul']; ?>" class="figure-img img-fluid">
                </figure>
            </div>
            <div class="col-lg-4 text-center">
                <h5><?php echo $ikan['judul']; ?></h5>
                <p class="text-muted"><span style="font-weight: 600;">Rp </span> <?php echo $ikan['harga']; ?></p>
                <div class="btn-product">
                    <a href="" class="btn" data-toggle="modal" data-target="#exampleModal">Mau ini <i class="fab fa-whatsapp"></i></a>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Formulir warungmakanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="whatsapp-form">
                                    <div class="datainput">
                                        <label><i class="fas fa-user-circle"></i> Nama</label><br>
                                        <input class="validate" id="wa_name" name="name" required="" type="text" value='' autofocus>
                                    </div>
                                    <div class="datainput">
                                        <label><i class="fas fa-map-marker-alt"></i> Alamat</label><br>
                                        <textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required=""></textarea>
                                    </div>
                                    <div class="datainput">
                                        <p class="validate" id="wa_url" name="url">https://warungmakanan/Listmenu/detailikan/<?php echo $ikan['slug']; ?></p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a class="send_form" href="javascript:void" type="submit" title="KIrim via whatsapp">Kirim ke Whatsapp admin <i class="fab fa-whatsapp"></i></a>
                                <div id="text-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- Product Description & Review -->
<section class="product-description">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Deskripsi Menu</a>
                    </li>
                </ul>
                <div class="tab-content p-3" id="myTabContent">
                    <div class="tab-pane fade show active product-review" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <p><?php echo $ikan['deskripsi']; ?></p>
                        <hr>
                        <div class="note">
                            <h5>Notes:</h5>
                            <div class="bg-not">
                                <p><b>Wajib DP </b>Minimal 10% setelah pemesanan</p>
                                <p>Pemesanan Minimal <b> 6 Jam </b>sebelum di Kirim</p>
                                <p>Pemesanan Minimal <b> 5 Box</b></p>
                                <p>Sayur pendamping bisa <b>Riquest</b></p>
                                <p>Ongkir Se-<b>Ikhlas</b>nya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- menu lainya -->
<main class="mb-2">
    <div class="container m-laptop">
        <div class="conta">
            <div class="terkait">
                <p>Menu Terkait</p>
            </div>
            <div class="d-flex table-responsive mt-2 mb-2">
                <?php foreach ($lainya as $w => $da) : ?>
                    <?php if ($w == 5) break; ?>
                    <div class="allbox">
                        <div class="crh">
                            <img src="/assets/img/menuikan/<?php echo $da['sampul']; ?>" class="im-crh">
                            <a href="/listmenu/detailikan/<?php echo $da['slug']; ?>" class="d-flex justify-content-center">
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
</main>






<?php echo $this->endsection(); ?>