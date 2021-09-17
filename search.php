<?php 

include('config/db_connect.php');

	$sql = "SELECT * FROM items";
	if(isset($_GET['search'])) {
		$name = mysqli_real_escape_string($conn, htmlspecialchars($_GET['search']));
		$sql = "SELECT * FROM items WHERE name OR description LIKE '%$name%'";
	}
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	mysqli_close($conn);

 ?>

<?php include('templates/header.php') ?>

	<main>
		<?php if($count>0) { ?>
		<ul>
			<?php while($row = $result->fetch_assoc()) { ?>
				<li>
					<a href="details.php?id=<?php echo $row['id'] ?>">
						<img src="img/items/<?php echo $row['id'] ?>.jpg">
						<h3><?php echo $row['name'] ?></h3>
						<h4>R$ <?php echo $row['price'] ?></h4>
					</a>
				</li>
			<?php } ?>
		</ul>
		<?php } else { ?>
			<p>Não foi encontrado nada.</p>
		<?php } ?>
	</main>

<?php include('templates/footer.php') ?>