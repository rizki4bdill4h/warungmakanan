<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<!--=============================carousel Listmenu===============================-->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img/slide/home1.jpg" class="img-fluid" alt="...">
        </div>
    </div>
</div>



<!-- ===============================list list menu -->
<div class="container mdn">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cont" style="background-image: url(/assets/img/bg/bg-daging.jpg);">
                <a href="/listmenu/menudaging">
                    <div class="ptex">
                        <h4>Menu daging ada (<span style="color: blue;font-weight:bold"><?php echo $jumlahdaging; ?></span>)</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cont" style="background-image: url(/assets/img/bg/bg-ayam.jpg);">
                <a href="/listmenu/menuayam">
                    <div class="ptex">
                        <h4>Menu ayam ada (<span style="color: blue;font-weight:bold"><?php echo $jumlahayam; ?></span>)</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cont" style="background-image: url(/assets/img/bg/bg-ikan.jpg);">
                <a href="/listmenu/menuikan">
                    <div class="ptex">
                        <h4>Menu ikan ada (<span style="color: blue;font-weight:bold"><?php echo $jumlahikan; ?></span>)</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cont" style="background-image: url(/assets/img/bg/bg-telor.jpg);">
                <a href="/listmenu/menutelur">
                    <div class="ptex">
                        <h4>Menu telur ada (<span style="color: blue;font-weight:bold"><?php echo $jumlahtelur; ?></span>)</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cont" style="background-image: url(/assets/img/bg/bg-lainya.jpg);">
                <a href="/listmenu/menulainya">
                    <div class="ptex">
                        <h4>Menu Lainya ada (<span style="color: blue;font-weight:bold"><?php echo $jumlahlainya; ?></span>)</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<?= $this->Endsection(); ?>