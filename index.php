<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PASWA 2022</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body>

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><img class="rounded-circle" src="asset/img/paswa.png" alt="" style="width: 40px; height: 40px;"></i>PASWA 2022</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Data Panitia</a>
                    <a href="kelompok.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Data Kelompok</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Peserta</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Kegiatan</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Tamu</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Tata Tertib</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Perlengkapan Paswa</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Data Nama Kelompok</a>
                    <div class="nav-item dropdown">
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        
        <!-- Content Start -->
        <div class="content">
                       <!-- Navbar Start -->
                       <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="login.php" class="nav-link">
                            <span class="d-none d-lg-inline-flex">Login Admin</span>
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="registrasi.php" class="nav-link">
                            <span class="d-none d-lg-inline-flex">Registrasi Peserta</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <?php
 include_once("connection.php");
$result_peserta = mysqli_query($mysqli, "select count(nim) as total_peserta from tab_peserta");
$total_peserta = mysqli_fetch_assoc($result_peserta);
if(empty($total_peserta)){ $t_peserta = "0"; }else{ $t_peserta = $total_peserta['total_peserta'];}

$result_panitia = mysqli_query($mysqli, "select count(nim) as total_panitia from tab_panitia");
$total_panitia = mysqli_fetch_assoc($result_panitia);
if(empty($total_panitia)){ $t_panitia = "0"; }else{ $t_panitia = $total_panitia['total_panitia'];}

?>

           <!-- Total Peserta $ Panitia -->
           <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Panitia</p>
                                <h6 class="mb-0"><?php echo $t_panitia ?></h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Peserta </p>
                                <h6 class="mb-0"><?php echo $t_peserta ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Tata Tertib $ Perlengkapan -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h3 class="mb-0">Tata Tertib PASWA 2022</h3>
                                <a href="tata_tertib.php" class = "btn btn-danger">Show All</a>
                            </div>
                                <h8>
                                <?php

include_once("connection.php");
$no = 0; 
echo "<tr>";
$result = mysqli_query($mysqli, "SELECT * FROM tab_tata_tertib limit 5");
while ($row = mysqli_fetch_array($result)) {
    $no++;
   
    echo "<td>" . $no. ". "  ;
    echo $row['tata_tertib'] . "</br></td>";
   
}
echo "</tr>";
?>
                                </h8>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h3 class="mb-0">Perlengkapan Paswa 2022</h3>
                                <a href="perlengkapan.php" class = "btn btn-danger">Show All</a>
                            </div>
                                <h8>
<?php

include_once("connection.php");
$no = 0; 
echo "<tr>";
$result = mysqli_query($mysqli, "SELECT * FROM tab_perlengkapan limit 5");
while ($row = mysqli_fetch_array($result)) {
    $no++;
   
    echo $no . "</td>";
    echo $row['perlengkapan'] . "</td>";
    echo $row['kategori'] . "</td>";
   
}
echo "</tr>";
?>
                                </h8>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="index.php">PASWA 2022 </a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="index.php" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/chart/chart.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>