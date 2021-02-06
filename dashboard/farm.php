<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Virtual Farm - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
      
      <!-- sidebar -->
      <?php
          include("sidebar.php");
       ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- header -->
        <?php
          include("header.php");
         ?>
          
        <!-- Begin Page Content -->
        <div class="container-fluid">
            	<p class="my-farm">My Farm</p>
                <br/>
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-4">
                            <div class="farm-tiles">
                                <label>Carrot</label>
                                <br/>
                                <img src="img/carrot.jpg" class="farm-pics">
                                <br/>
                                <br/>
                                <p class="location"><i class=""></i> Nagpur, India</p>
                                <button class="details">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            	<br/>
                <br/>
                <h5>Plant New</h5>
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="crop-tiles">
                                <img src="img/carrot.jpg" class="crop-pics">
                                <h4>Carrot</h4>
                                <h5>$40 per Stand</h5>
                                <p class="location"><i class=""></i> Abuja, Nigeria</p>
                                <button class="details">Plant Now</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-4">
                                <div class="crop-tiles"></div>
                            </div>
                        </div>
                    </div>
                </div> 
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Virtual Farm 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
