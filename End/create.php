<!-- create.php -->
<?php
    include_once("db.php");
    include_once("header.php");

    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $error = "";
    $success = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        //check fields are empty
        do{
            if(empty($name) || empty($email) || empty($phone) || empty($address)){
                $error = "All the fields are required";
                break;
            }
            //insert a new client to database
            $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

            $result = $conn->query($sql);//execute sql query

            if(! $result){
                $error = "Invalid query: " . $conn->error;
                break;
            }
            $success = "Client added correctly";

            header ("Location: inventory.php");
            exit;
        }while(false);
    }
?>

    <div class="container my-5">
        <center><h2>Register New Client</h2></center>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>

            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Phone</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="phone" value="<?php echo $phone ?>">
				</div>
		    </div>

            <div class="row mb-3">
				<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" value="<?php echo $address ?>">
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
						<a class="btn btn-outline-primary" href="create.php" role="button">Cancel</a>
					</div>
				</div>
			</form>

<?php include_once("footer.php"); ?>