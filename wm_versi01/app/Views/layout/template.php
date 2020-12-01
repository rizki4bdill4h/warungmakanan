<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#007aff">
    <meta name="description" content="<?php echo $descript; ?>">
    <meta name="keywords" content="<?php echo $keyword; ?>">
    <meta name="author" content="Rizki abdilah">
    <meta name="robots" content="index,follow">
    <meta name=" og: image " content="https://warungmakan.id/assets/img/meta/default.jpg" />

    <link rel="shortcut icon" href="/assets/img/carousel/mw.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- Navandfooter -->
    <link rel="stylesheet" href="/assets/css/Navandfoot.css">
    <!-- link whatsapp -->
    <link rel="stylesheet" href="/assets/css/Whatsapp.css">
    <!-- link back-up -->
    <link rel="stylesheet" href="/assets/css/Back-to-up.css">
    <!-- link home -->
    <link rel="stylesheet" href="/assets/css/Home.css">
    <!-- link listmenu -->
    <link rel="stylesheet" href="/assets/css/Listmenu.css">
    <!-- link Menumenu  -->
    <link rel="stylesheet" href="/assets/css/Menumenu.css">
    <!-- link detail -->
    <link rel="stylesheet" href="/assets/css/Detail.css">
    <title><?php echo $judul; ?></title>
</head>

<body>



    <!-- manggil navbar =========================-->
    <?php echo $this->include('layout/Navbar'); ?>

    <!-- menggabngkan semua konten -->
    <?php echo $this->renderSection('content'); ?>




    <!-- memangil wathsap========== -->
    <?php echo  $this->include('layout/Whatsapp'); ?>


    <!-- memangil back_up========== -->
    <?php echo  $this->include('layout/thetop'); ?>

    <!-- mangggil footer============= -->
    <?php echo $this->include('layout/Footer'); ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="/assets/js/nav.js"></script>
    <script src="/assets/js/backup.js"></script>
    <script src="/assets/js/Detail.js"></script>
</body>

</html>