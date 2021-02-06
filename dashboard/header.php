<?php
	@session_start();
	$userid = $_SESSION["user"];
	include("../connect.php");
	$data = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM users WHERE userid = '$userid'"));
	$n = mysqli_query($db, "SELECT * FROM notifications WHERE userid = '$userid'");
?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto">
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        
      </div>
    </li>
    <?php
    	$c = mysqli_num_rows($n);
    ?>
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"<?php echo ($c == 0)? "":' data-toggle="dropdown"'; ?> aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <?php
        	if ($c == 0) {?>

        	<?php
        	}
        	else {
        		$num = ($c >= 9)?"9+":strval($c);
        		?>
        		<span class="badge badge-danger badge-counter"><?php echo $num; ?></span>		
        	<?php
        	}
        ?>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Notifications
        </h6>
        <?php
        	while ($r = mysqli_fetch_array($n)) {?>
            	<a class="dropdown-item d-flex align-items-center" href="#" onclick="getnotification('<?php echo $r['id']; ?>')">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="<?php echo $r['icon']; ?> text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date('M d, Y', $r['date_created']); ?></div>
                    <b><?php echo $r['title']; ?></b>
                  </div>
                </a>
        	<?php
        	}
        ?>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data["fullname"]; ?></span>
        <img class="img-profile rounded-circle" src="img/pp.jpg">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="settings.php">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->
  <div class="modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="notification-data"></div>
    </div>
  </div>
<script type="text/javascript" src="../js/custom-form.js"></script>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="./logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>