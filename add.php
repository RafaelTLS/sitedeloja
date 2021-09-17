<?php 

include('config/db_connect.php');

$name = $price = $description = '';
$errors = array('name'=>'', 'price'=>'', 'description'=>'');

if(isset($_POST['submit'])) {
	if(empty($_POST['name'])) {
		$errors['name'] = 'A name is required <br>';
	} else {
		$name = $_POST['name'];
	}
	if(empty($_POST['price'])) {
		$errors['price'] = 'A price is required <br>';
	} else {
		$price = $_POST['price'];
	}
	if(empty($_POST['description'])) {
		$errors['description'] = 'A description is required <br>';
	} else {
		$description = $_POST['description'];
	}

	if(array_filter($errors)) {
		echo 'error in form';
		print_r(array_values ($errors));
	} else {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);

		$sql = "INSERT INTO items(name, price, description) VALUES ('$name', '$price', '$description')";

		if(mysqli_query($conn, $sql)) {
			header('location: index.php');
		} else {
			echo 'query error: ' . mysqli_error($conn);
		}
	}
}

 ?>

 <?php include('templates/header.php') ?>

 <main>
 	<h3>Add:</h3>
 	<form action="add.php" method="POST">
 		<label>Nome:</label>
 		<input type="text" name="name" value="<?php echo $name ?>"><br>
 		<label>Preço:</label>
 		<input type="text" name="price" value="<?php echo $price ?>"><br>
 		<label>Descrição:</label>
 		<textarea name="description" value="<?php echo $description ?>"></textarea><br>
 		<input type="submit" name="submit" value="Enviar">
 	</form>
 </main>

 <?php include('templates/footer.php') ?>