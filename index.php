<?php 

include('config/db_connect.php');
	
	$sql = 'SELECT id, name, price, description FROM items ORDER BY id DESC';
	$result = mysqli_query($conn, $sql);
	$itemlist = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);

 ?>

<?php include('templates/header.php') ?>
<main>
	<h2>Novidades:</h2>
	<ul>
		<?php foreach ($itemlist as $list): ?>
			<li>
				<a href="details.php?id=<?php echo $list['id'] ?>">
					<img src="img/items/<?php echo $list['id'] ?>.jpg">
					<h3><?php echo $list['name'] ?></h3>
					<h4>R$ <?php echo $list['price'] ?></h4>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</main>
<?php include('templates/footer.php') ?>