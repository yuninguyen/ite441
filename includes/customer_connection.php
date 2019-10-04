<?php

	class dbPharmacy {
		public $conn;
		public function __construct(){

			include 'includes/config.php';
			// Connect to server and select database.
			$this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	};

	class CustomerConnection extends dbPharmacy {

		//get all the posts in db
		public function getCustomer() {
			include 'config.php';
			try {
				$db = new dbPharmacy;
				$err = '';
											// display medicine list
				$stmt = $db->conn->prepare("SELECT * FROM customer");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		//display details of medicine detail
		public function getCustomerDetails($pid) {
			include 'config.php';
			try {
				$db = new dbPharmacy;
				$err = '';
											//Get order details from employee...
				
				$stmt = $db->conn->prepare("SELECT `customer`.`id` as customer_id, `customer`.`name` as customer_name, `places_order_details`.`order_id`, `order`.`order_date`, `medicine`.`name` as medicine_name, `include_details`.`selling_price`, `include_details`.`quantity`
											FROM `order`
    										LEFT JOIN `places_order_details` 
    										ON `places_order_details`.`order_id` = `order`.`id`
   											LEFT JOIN `include_details` 
   											ON `include_details`.`order_id` = `order`.`id`
    										LEFT JOIN `medicine` 
    										ON `include_details`.`medicine_id` = `medicine`.`id`
    										LEFT JOIN `customer` 
    										ON `places_order_details`.`customer_id` = :pid
    										WHERE `customer`.id = :pid
    										");

				$stmt->bindParam(':pid', $pid);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
	};

?>
