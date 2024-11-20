<!-- inventory.php -->
<?php
    include_once("header.php");
?>
<div class="container">
			<h2>Client List</h2>
			<a class="btn btn-primary" href="create.php" role="button">New Client</a>
			<a class="btn btn-primary" href="main.php" role="button">Back</a>
			<br>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        include_once("db.php");

                        $sql = "SELECT * FROM clients";
                        $result = $conn->query($sql);

                        //check whether query executed properly
                        if(! $result){
                            die("Something went wrong". $conn->error);
                        }
                        //read data of each row
                        while($row = $result->fetch_assoc()){
                            echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[phone]</td>q
                                    <td>$row[address]</td>
                                    <td>$row[created_at]</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='edit.php? id=$row[id]''>Edit</a>
                                        <a class='btn btn-danger btn-sm' href='delete.php? id=$row[id]''>Delete</a>
                                    </td>
                                </tr>        
                            ";
                        }
                    ?>
                </tbody>
<?php include_once("footer.php"); ?>