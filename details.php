<?php

include('config/db_connect.php');
	
	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($conn, $_GET['id']);
	}
	$sql = "SELECT * FROM items WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$itemlist = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);

 ?>

<?php include('templates/header.php') ?>

	<main>
		<?php if($itemlist): ?>
		<h2><?php echo $itemlist['name'] ?></h2>
		<div class="wrapper">
			<figure>
				<img src="img/items/<?php echo $itemlist['id'] ?>.jpg">
			</figure>
			<aside>
				<p><?php echo $itemlist['description'] ?></p>
				<h4>R$ <?php echo $itemlist['price'] ?></h4>
				<a href="#" id="buybtn">COMPRAR</a>
			</aside>
		</div>
		<?php else: ?>
			<p>Não existe nada aqui!</p>
			<a href="#" onclick="history.back();">Voltar à página anterior.</a>
		<?php endif; ?>		
	</main>

<?php include('templates/footer.php') ?>