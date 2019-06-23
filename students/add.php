<?php 
	session_start(); 
	include_once('../includes/connection.php');
	// echo $_SESSION['teacher_id'];
	if($_SERVER['REQUEST_METHOD']=='POST') {
		if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_SESSION['teacher_id'])) {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$teacher_id = $_SESSION['teacher_id'];
			// $dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$time = strtotime($_POST['dob']);
			if ($time) {
				$dob = date('Y-m-d', $time);
			} else {
				echo 'Invalid Date: ' . $_POST['dob'];
				
			}

			$query = "INSERT INTO students(firstname, lastname, mail, dob, gender, teacher_id) VALUES('$firstname','$lastname','$email','$dob', '$gender', '$teacher_id')";
			$result = mysqli_query($conn, $query) or die(mysqli_error());
			if($result) {
				header('Location: ../admin-dashboard.php');
			} else {
				echo '<script>alert("value failed");</script>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="./assets/css/style.css">
		<title>Student Management System </title>
	</head>
	<body>
		<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-3 bg-white border-bottom box-shadow">
			<h5 class="my-0 mr-md-auto font-weight-normal">Student Management System</h5>
			<nav class="navbar navbar-expand-lg">
				<ul class="navbar-nav">
					<li class="nav-link">
						<a class="p-2 text-dark" href="../reports/student_reports.php">Reports</a>
					</li>
					<li class="nav-item dropdown text-dark">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Students
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="add.php">Add Students</a>
							<a class="dropdown-item" href="remove.php">Remove Students</a>
							<a class="dropdown-item" href="update.php">Update Students</a>
							<a class="dropdown-item" href="view.php">View Students</a>
						</div>
					</li>
					<li class="nav-link">
						<?php echo '<strong>Welcome, '.$_SESSION['username'].' id : '.$_SESSION['teacher_id'].'</strong> '; ?>
					</li>	
				</ul>	
			</nav>
			<a class="btn btn-outline-primary" href="../logout.php">Logout</a>
		</div>
		<div class="container text-center">
			<h2>Add Student</h2>
			<div class="row text-left">
				<div class="col-12">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="form-group">
							<label for="firstname">First Name </label>
							<input type="text" name="firstname" class="form-control" placeholder="Enter the first name" required autocomplete="off">
						</div>
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<input type="text" name="lastname" class="form-control" placeholder="Enter the last name" required>
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email Address" required>
						</div>
						<div class="form-group">
							<label for="dob">Date of Birth</label>
							<input type="date" name="dob" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="gender">Gender</label>
							<select class="custom-select" name="gender" required>
							
								<option selected>Select</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Others</option>
							
							</select>
						</div>
						<input type="submit" value="Add Student" class="btn btn-primary btn-lg btn-block">
					</form>
				</div>			
			</div>
			
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>