<?php 

	session_start(); 
	include_once('../includes/connection.php');
	
	$teacher_id = $_SESSION['teacher_id'];
	$query = "SELECT * FROM students WHERE teacher_id='$teacher_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_num_rows($result);
    // getting id from the url
    $id = $_GET['id'];
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
							<a class="dropdown-item active" href="view.php">View Students</a>
						</div>
					</li>
					<li class="nav-link">
						<?php echo '<strong>Welcome, '.$_SESSION['username'].'</strong>'; ?>
					</li>
					
				</ul>	
			</nav>
			<a class="btn btn-outline-primary" href="../logout.php">Logout</a>
		</div>
		<div class="container mt-5">
			<h5>Total Number of Students : <?php echo '<strong>'.$row.'</strong>' ?></h5>
		</div>
		<!--view all the students that are registered by the logged in teacher-->
		<div class="container my-5">
			<table class="table">
				<thead class="bg-secondary text-white">
					<tr>
						<th scope="col">id</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col"> Email</th>
						<th scope="col"> Gender</th>
                        <th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php	
					while($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<th scope="row"><?php echo $row['id']; ?></th>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['mail']; ?></td>
						<td><?php echo $row['gender']; ?></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>