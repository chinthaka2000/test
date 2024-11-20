<!-- edit.php -->
<?php
	require_once("db.php");
    require_once("header.php");
	
	$name = "";
	$email = "";
	$phone = "";
	$address = "";
	$error = "";
	$success = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		//GET method: Show the data of the client
		
		if(!isset($_GET['id'])){
			header("Location:inventory.php");
			exit;
		}
		
		$id = $_GET['id'];
		
		$sql = "SELECT * FROM clients WHERE id = $id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();//read the data from database
		
		if(!$row){
			header("Location:inventory.php");
			exit;
		}
		
		//store the values
		$name = $row['name'];
		$email = $row['email'];
		$phone = $row['phone'];
		$address = $row['address'];
		
	}
	else{
		//POST method: Update the data of the client
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		
		do{
			if(empty($name) || empty($email) || empty($phone) || empty($address)){
				$error = "All the fields are required";
				break;
			}
			
			$sql = "UPDATE clients SET 
					name='$name',
					email='$email',
					phone='$phone',
					address='$address' WHERE id='$id'";
					
			$result = $conn->query($sql);
			if(!$result){
				$error = "Invalid query: ".$conn->error;
				break;
			}
			
			$success = "Client updated sucessfully";
			
			header("Location:inventory.php");
			exit;
			
		}while(false);
	}
?>
    <div class="container my-5">
		<h2>Edit Client</h2>
			
		<?php
			if(!empty($error)){
				echo "
					<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						<strong>$error</strong>
						<button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>
				";
			}
		?>
			
		<form method="POST">
		<input type="hidden" name='id' value="<?php echo $id; ?>">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
				</div>
			</div>
				
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
				</div>
			</div>
				
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Phone</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
				</div>
			</div>
				
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
				</div>
			</div>
				
			<?php
				if(!empty($success)){
					echo "
					<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						<strong>$success</strong>
						<button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>
				";
				}
			?>
				
			<div class="row mb-3">
				<div class="offset-sm-3 col-sm-3 d-grid">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="col-sm-3 d-grid">
					<a class="btn btn-outline-primary" href="inventory.php" role="button">Cancel</a>
				</div>
			</div>
		</form>

<?php include_once("footer.php"); ?>