<?php include ('includes/header.php'); ?>
<?php include ("includes/medicine_connection.php"); ?>
<?php
	// 
	$a = new MedicineConnection;
	$posts =  $a->getMedicine();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Medicine List <small></small></h1>
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
				echo "<tr><th>ID</th><th>Name</th><th>Exp Date</th><th>Side Effect</th><th>Price</th></tr>";
				foreach ($posts as $result) {
					echo "<td><a href='medicine_show.php?id=".$result['id']."'>".$result['id']."</a></td>";
					echo "<td>".$result['name']."</td>";
					echo "<td>".$result['exp_date']."</td>";
					echo "<td>".$result['side_effect']."</td>";
					echo "<td>".$result['price']." Baht</td>";			
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>


<?php include ('includes/footer.php'); ?>
