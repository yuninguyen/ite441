<?php include ('includes/header.php'); ?>
<?php include ("includes/customer_connection.php"); ?>
<?php
	// 
	$a = new CustomerConnection();
	$pid = $_GET["id"];
	$pid =  $a->getCustomerDetails($pid);
	//var_dump($pid);
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Customer Details List <small></small></h1>
		</div>
	</div>
	</br>
</div>

<div class="container">
	<div class="row">
		<?php		
			if (is_array($pid) || is_object($pid))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr>
						<th>Customer ID</th>
						<th>Customer Name</th>
						<th>Order ID</th>
						<th>Order Date</th>
						<th>Medicine Name</th>
						<th>Unit Price</th>
						<th>Quantity</th>
						<th>Total Price</th>";
				foreach ($pid as $result) {
					echo "<tr>";
					echo "<td>".$result['customer_id']."</td>";
					echo "<td>".$result['medicine_name']."</td>";
					echo "<td>".$result['order_id']."</td>";
					echo "<td>".$result['order_date']."</td>";
					echo "<td>".$result['medicine_name']."</td>";
					echo "<td>".$result['selling_price']."</td>";	
					echo "<td>".$result['quantity']."</td>";
					echo "<td>".$result['selling_price'] * $result['quantity']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
			<small><a href="customer.php" class="btn btn-primary btn-lg">RETURN TO LIST</a></small>
</div>

<?php include ('includes/footer.php'); ?>