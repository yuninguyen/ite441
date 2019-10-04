<?php include ('includes/header.php'); ?>
<?php include ("includes/manufacturer_connection.php"); ?>
<?php
	// 
	$a = new ManufacturerConnection;
	$posts =  $a->getManufacturer();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Manufacturer List <small></small></h1>
		</div>
	</div>
	</br>
</div>
<div class="container">
	<div class="row">
		<?php		
			if (is_array($posts) || is_object($posts))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>ID</th><th>Name</th><th>Adress</th><th>Phone</th></tr>";
				foreach ($posts as $result) {
					echo "<tr><td>".$result['id']."</td>";
					echo "<td>".$result['name']."</td>";
					echo "<td>".$result['address']."</td>";
					echo "<td>".$result['phone']."</td>";		
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>


<?php include ('includes/footer.php'); ?>
