<?php include ('includes/header.php'); ?>
<?php include ("includes/medicine_connection.php"); ?>
<?php
	// 
	$a = new MedicineConnection();
	$pid = $_GET["id"];
	$pid =  $a->getMedicineDetails($pid); //cái $pid truyền vào lấy ở đâu?
	//var_dump($pid);
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Medicine Details List <small></small></h1>
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
						<th>Medicine ID</th>
						<th>Medicine Name</th>
						<th>Exp Date</th>
						<th>Site Effect</th>
						<th>Unit Price</th>
						<th>quantity</th>
						<th>Total Price</th>
						<th>Date Import</th>
						<th>Name Manufacturer</th></tr>";
				foreach ($pid as $result) {
					echo "<tr>";
					echo "<td>".$result['id']."</td>";
					echo "<td>".$result['medicine_name']."</td>";
					echo "<td>".$result['exp_date']."</td>";
					echo "<td>".$result['side_effect']."</td>";
					echo "<td>".$result['price']."</td>";	
					echo "<td>".$result['quantity']."</td>";
					echo "<td>".$result['price'] * $result['quantity']."</td>";
					echo "<td>".$result['date_import']."</td>";
					echo "<td>".$result['manufacturer_name']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
			<small><a href="medicine.php" class="btn btn-primary btn-lg">RETURN TO LIST</a></small>
</div>

<?php include ('includes/footer.php'); ?>