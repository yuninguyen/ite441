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

	class MedicineConnection extends dbPharmacy {

		//get all the posts in db
		public function getMedicine() {
			include 'config.php';
			try {
				$db = new dbPharmacy;
				$err = '';
											// display medicine list
				$stmt = $db->conn->prepare("SELECT * FROM medicine");
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
		public function getMedicineDetails($pid) {
			include 'config.php';
			try {
				$db = new dbPharmacy;
				$err = '';
											//Get order details from employee...
				
				$stmt = $db->conn->prepare("SELECT `medicine`.id, `medicine`.name as medicine_name, `medicine`.exp_date, `medicine`.side_effect, `medicine`.price, `import_details`.`quantity`, `import_details`.`date_import`, `manufacturer`.`name` as manufacturer_name FROM `medicine` LEFT JOIN `import_details` ON `import_details`.`medicine_id` = `medicine`.`id` LEFT JOIN `manufacturer` ON `import_details`.`manufacturer_id` = `manufacturer`.`id` WHERE `medicine`.`id` = :pid");

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
