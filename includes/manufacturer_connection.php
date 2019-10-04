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

	class ManufacturerConnection extends dbPharmacy {

		//get all the posts in db
		public function getManufacturer() {
			include 'config.php';
			try {
				$db = new dbPharmacy;
				$err = '';
											// display medicine list
				$stmt = $db->conn->prepare("SELECT * FROM manufacturer");
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
