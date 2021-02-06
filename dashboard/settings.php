<html>

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
          include("sidebar.php")
       ?>;

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- header -->
        <?php
          include("header.php")
         ?>;
          
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="row">
			<div class="col-lg-7">
				<div class="shadow general">
					<h4 class="mb-3">Billing address</h4>
			          <form class="needs-validation" novalidate>
			            <div class="row">
			              <div class="col-md-6 mb-3">
			                <label for="firstName">First name</label>
			                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
			                <div class="invalid-feedback">
			                  Valid first name is required.
			                </div>
			              </div>
			              <div class="col-md-6 mb-3">
			                <label for="lastName">Last name</label>
			                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
			                <div class="invalid-feedback">
			                  Valid last name is required.
			                </div>
			              </div>
			            </div>
			            <div class="mb-3">
			              <label for="email">Email </label>
			              <input type="email" class="form-control" id="email" placeholder="you@example.com">
			              <div class="invalid-feedback">
			                Please enter a valid email address for shipping updates.
			              </div>
			            </div>

			            <div class="mb-3">
			              <label for="address">Address</label>
			              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
			              <div class="invalid-feedback">
			                Please enter your shipping address.
			              </div>
			            </div>

			            <div class="mb-3">
			              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
			              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
			            </div>

			            <div class="row">
			              <div class="col-md-5 mb-3">
			                <label for="country">Country</label>
			                <select class="custom-select d-block w-100" id="country" required>
			                  <option value="">Choose...</option>
			                  <option>United States</option>
			                </select>
			                <div class="invalid-feedback">
			                  Please select a valid country.
			                </div>
			              </div>
			              <div class="col-md-4 mb-3">
			                <label for="state">State</label>
			                <select class="custom-select d-block w-100" id="state" required>
			                  <option value="">Choose...</option>
			                  <option>California</option>
			                </select>
			                <div class="invalid-feedback">
			                  Please provide a valid state.
			                </div>
			              </div>
			              <div class="col-md-3 mb-3">
			                <label for="zip">Zip</label>
			                <input type="text" class="form-control" id="zip" placeholder="" required>
			                <div class="invalid-feedback">
			                  Zip code required.
			                </div>
			              </div>
			            </div>
			            </form>
			            <hr class="mb-4">
			            <div class="custom-control custom-checkbox">
			              <input type="checkbox" class="custom-control-input" id="same-address">
			              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
			            </div>
			            <hr class="mb-4">

			            <h4 class="mb-3">Payment</h4>

			            <div class="d-block my-3">
			              <div class="custom-control custom-radio">
			                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
			                <label class="custom-control-label" for="debit">Debit card</label>
			              </div>
			              <div class="custom-control custom-radio">
			                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
			                <label class="custom-control-label" for="paypal">Paypal</label>
			              </div>
			            </div>
			          
		    </div>
			</div>
			<div class="col-lg-5">
				<div class="shadow card-body">
					<form class="pay-form"> <span id="card-header">Saved cards:</span>
				        <div class="row row-1">
				            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> </div>
							<div class="col-7 pay-input"> **** **** **** 6895</div>
				            <div class="col-3 d-flex justify-content-center"> <a href="#">X</a> <a href="#">Z</a>  </div>
				        </div>
				        <div class="row row-1">
				            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" /></div>
				            <div class="col-7 pay-input"> **** **** **** 3193</div>
				            <div class="col-3 d-flex justify-content-center"> <a href="#">X</a> </div>
				        </div> <span id="card-header">Add new card:</span>
				        <div class="row-1">
				            <div class="row row-2"> <span id="card-inner">Card holder name</span> </div>
				            <div class="row row-2"> <input type="text" placeholder="Bojan Viner" class="pay-input"> </div>
				        </div>
				        <div class="row three">
				            <div class="col-7">
				                <div class="row-1">
				                    <div class="row row-2"> <span id="card-inner">Card number</span> </div>
				                    <div class="row row-2"> <input type="text" placeholder="5134-5264-4" class="pay-input"> </div>
				                </div>
				            </div>
				            <div class="col-2"> <input type="text" placeholder="Exp. date" class="pay-input"> </div>
				            <div class="col-2"> <input type="text" placeholder="CVV" class="pay-input"> </div>
				        </div> <button class="pay-btn d-flex mx-auto"><b>Add card</b></button>
				    </form>
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
