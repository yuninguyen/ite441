<?php include ('includes/header.php'); ?>
<?php include ("includes/customer_connection.php"); ?>
<?php
	// 
	$a = new CustomerConnection;
	$posts =  $a->getCustomer();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Customer List <small></small></h1>
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
					echo "<tr>";
					echo "<td><a href='customer_show.php?id=".$result['id']."'>".$result['id']."</a></td>";
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
