<?php include ('includes/header.php'); ?>
<?php include ("includes/order_connection.php"); ?>
<?php
	// 
	$a = new OrderConnection;
	$posts =  $a->getOrder();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Order List <small></small></h1>
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
				echo "<tr><th>Order ID</th><th>Order Date</th></tr>";
				foreach ($posts as $result) {
					echo "<tr>";
					echo "<td><a href='order_show.php?id=".$result['id']."'>".$result['id']."</a></td>";
					echo "<td>".$result['order_date']."</td>";	
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>

<?php include ('includes/footer.php'); ?>
