<?php
	include("connect.php");
	include("mail.php");
	include("function.php");
	@session_start();
	function sanitize($string) {
		include("connect.php");
		return htmlspecialchars(trim(mysqli_real_escape_string($db, $string)));
	}
	function generate_farm_id() {
		include("connect.php");
		$cnt = 1;
		$farmid = "";
		while ($cnt >= 1) {
			$farmid = "VF_".str_shuffle('0123456789AaBbCcDdWwXxYyZzMm')."_".mt_rand(11,99);
			$cnt = mysqli_num_rows(mysqli_query($db, "SELECT farmid FROM farms WHERE farmid = '$farmid'"));
		}
		return $farmid;
	}
	if (isset($_POST["login"])) {
		$result = array();
		$now = time();
		if (isset($_SESSION["next_login"])) {
			if ($now < $_SESSION["next_login"]) {
				$diff = round(intval($_SESSION["next_login"] - $now) / 60);
				$result = [
					"status"=>"error",
					"message"=>"Failed. Try again in ".$diff." minutes. You exceeded 5 login attempts"
				];
				echo json_encode($result);
				die;
			}
			else {
				unset($_SESSION["next_login"]);
				if (isset($_SESSION["failed_logins"])) {
					unset($_SESSION["failed_logins"]);	
				}
			}
		}
		$email = sanitize($_POST["email"]);
		$password = sanitize($_POST["password"]);
		$cnt = 0;
		$params = ['email', 'password'];
		foreach ($params as $i){
			if (str_replace(" ", "", $_POST[$i]) == "") {
				$cnt++;
			}
		}
		if ($cnt >= 1) {
			$result = [
				"status"=>"error",
				"message"=>"No field must be left blank"
			];
			echo json_encode($result);
			die;
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = [
				"status"=>"error",
				"message"=>"Invalid email address provided"
			];
			echo json_encode($result);
			die;
		}
		$hash = "";
		$userid = "";
		$q = mysqli_query($db, "SELECT password, userid FROM users WHERE email = '$email'");
		$cnt = mysqli_num_rows($q);
		if ($cnt == 0) {
			$result = [
				"status"=>"error",
				"message"=>"There is no user with that email address"
			];
			echo json_encode($result);
			die;
		}
		else {
			while ($r = mysqli_fetch_array($q)) {
				$hash = $r['password'];
				$userid = $r['userid'];
			}
			if (!password_verify($password, $hash)) {
				$result = [
					"status"=>"error",
					"message"=>"Invalid password provided!"
				];
				if (isset($_SESSION["failed_logins"])) {
					$_SESSION["failed_logins"] = $_SESSION["failed_logins"] + 1;
					if ($_SESSION["failed_logins"] == 5) {
						$_SESSION["next_login"] = strtotime("+30 Minutes");
						$result = [
							"status"=>"error",
							"message"=>"You have made 5 failed login attempts. Please try again in 30 minutes"
						];
					}
				}
				else {
					$_SESSION["failed_logins"] = 1;
				}
				echo json_encode($result);
			}
			else {
				$_SESSION["user"] = $userid;
				$result = [
					"status"=>"success"
				];
				if (isset($_SESSION["next_login"])) {
					unset($_SESSION["next_login"]);
					if (isset($_SESSION["failed_logins"])) {
						unset($_SESSION["failed_logins"]);
					}
				}
				echo json_encode($result);
			}
		}
	}
	else if (isset($_POST["signup"])) {
		$result = array();
		$params = ['fullname', 'email', 'password', 'confirmpassword'];
		$email = sanitize($_POST["email"]);
		$fullname = sanitize($_POST["fullname"]);
		$password = sanitize($_POST["password"]);
		$date = date("Y-m-d H:i:s.0000");
		$cnt = 0;
		foreach ($params as $i) {
			if (str_replace(" ", "", $_POST[$i]) == "") {
				$cnt++;
			}
		}
		if ($cnt >= 1) {
			$result = [
				"status"=>"error",
				"message"=>"No field must be left blank!"
			];
			echo json_encode($result);
			die;
		}
		if ($_POST["confirmpassword"] != $_POST["password"]) {
			$result = [
				"status"=>"error",
				"message"=>"Both passwords provided do not match"
			];
			die;
		}
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$result = [
				"status"=>"error",
				"message"=>"Invalid email address provided"
			];
			echo json_encode($result);
			die;
		}
		$cnt = mysqli_num_rows(mysqli_query($db, "SELECT email FROM users WHERE email = '$email'"));
		$password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
		if ($cnt == 0) {
			$userid = "usr_".md5($email.strval(date("Y-m-dH:i:s")));
			mysqli_query($db, "INSERT INTO users (fullname, email, password, userid, date_created) VALUES ('$fullname','$email','$password','$userid','$date')");
			$result = [
				"status"=>"success"
			];
			$_SESSION["user"] = $userid;
			echo json_encode($result);
			die;
		}
		else {
			$result = [
				"status"=>"error",
				"message"=>"A user exists with that email address already! Please try again with another email"
			];
			echo json_encode($result);
			die;	
		}
	}
	else if (isset($_POST["forgot"])) {
		$email = sanitize($_POST["email"]);
		$cnt = mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE email = '$email'"));
		$result = array();
		if ($cnt == 0) {
			$result = [
				"status"=>"error",
				"message"=>"There isn't a user with the email address provided"
			];
			echo json_encode($result);
			die;
		}
		else {
			$random = mt_rand(1000, 9999);
			$duration = strtotime("+5 minutes");
			mysqli_query($db, "INSERT INTO reset (code, email, duration) VALUES ('$random', '$email', '$duration')");
			$result = [
				"status"=>"success",
				"message "=>"Please provide the four digit PIN sent to your email. It will expire in 5 minutes"
			];
			$_SESSION["reset_email"] = $email;
			sendMail($email, "Reset Password", "Your 4-digit PIN to reset your password is ".$random.". Type it in the provided field. It will expire within 5 minutes");
			echo json_encode($result);
			die;
		}
	}
	else if (isset($_POST["reset"])) {
		$result = array();
		if (!isset($_SESSION["reset_email"])) {
			$result = [
				"status"=>"error",
				"message "=>"An error occured. Please restart the process"
			];
			echo json_encode($result);
			die;
		}
		else {
			$email = sanitize($_SESSION["reset_email"]);
			$code = sanitize($_POST["code"]);
			$time = time();
			$cnt = mysqli_num_rows(mysqli_query($db, "SELECT * FROM reset WHERE code = '$code' AND email = '$email'"));
			if ($cnt == 0) {
				$result = [
					"status"=>"error",
					"message "=>"Invalid or expired reset code provided! Please go back and request for a new request code"
				];
				mysqli_query($db, "DELETE FROM reset WHERE email = '$email'");
				echo json_encode($result);
				die;
			}
			else {
				$_SESSION["reset_code"] = $code;
				$_SESSION["reset_email"] = $email;
			}
		}
	}
	else if (isset($_POST["new_password"])) {
		$email = "";
		if (isset($_SESSION["reset_code"]) && isset($_SESSION["reset_email"])) {
			$code = sanitize($_SESSION["reset_code"]);
			$email = sanitize($_SESSION["reset_email"]);
			$cnt = mysqli_num_rows(mysqli_query($db, "SELECT * FROM reset WHERE code = '$code' AND email = '$email'"));
			if ($cnt == 0) {
				$result = [
					"status"=>"error",
					"message "=>"Invalid request token provided"
				];
				echo json_encode($result);
				die;
			}
		}
		else {
			$result = [
				"status"=>"error",
				"message "=>"Invalid request token provided"
			];
			echo json_encode($result);
			die;
		}
		$new_password = sanitize($_POST["password"]);
		$confirm = sanitize($_POST["confirm"]);
		if ($confirm == $new_password) {
			$result = [
				"status"=>"success"
			];
			$hash = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
			mysqli_query($db, "UPDATE users SET password = '$hash' WHERE email = '$email'");
			echo json_encode($result);
			die;
		}
		else {
			$result = [
				"status"=>"error",
				"message "=>"Both passwords don't match. Please confirm your password input"
			];
			echo json_encode($result);
			die;
		}
	}
	else if (isset($_GET["_fetch_notification"])) {
		$id = mysqli_real_escape_string($db, $_GET["_fetch_notification"]);
		$data = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM notifications WHERE id = '$id'"));
		?>
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['title']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="notify">
               <p class="text-dark font-weight-lighter"><?php echo $data['message']; ?></p>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
		<?php
	}
	else if (isset($_POST["generate_code"])) {
		if (!isset($_SESSION["user"])) {
			echo "error";
		}
		else {
			$farmid = generate_farm_id();
			echo $farmid;
		}
	}
?>