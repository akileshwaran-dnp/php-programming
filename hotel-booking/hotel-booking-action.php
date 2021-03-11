<html>
	<head>
		<style>
			p{
				font-weight: bold;
			}
			span{
				font-weight: normal;
			}
		</style>
	</head>
</html>

<?php
	$connection = new mysqli("localhost", "dnp", "0722", "sem_06");
	if ($connection->conn_error){
		echo ($connection->conn_error);
		die("Connection failed");
		echo("failed");
	}
	if (isset($_POST['submitForm'])){
		$checkInDate = $_POST['checkInDate'];
		$checkOutDate = $_POST['checkOutDate'];
		$cots = $_POST['cotsCount'];
		$acType = $_POST['acType'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$age = $_POST['age'];
		$proofType = $_POST['proofType'];
		$proofNumber = $_POST['proofNumber'];

		$insertQuery = "insert into hotelRegistration (checkInDate, checkOutDate, cots, acType, firstName, lastName, age, proofType, proofNumber) values ('$checkInDate', '$checkOutDate', '$cots', '$acType', '$firstName', '$lastName', '$age', '$proofType', '$proofNumber')";
		$connection->query($insertQuery);

		$getQuery = "select * from hotelRegistration order by billNo desc limit 1";
		$row = $connection->query($getQuery);
		if ($row->num_rows > 0){
			echo ("<p>Success</p>");
			while ($rowDate = $row->fetch_assoc()){
				echo ("<p>Bill No: <span>".$rowDate["billNo"]."</span></p>");
				echo ("<p>Check in date: <span>".$rowDate["checkInDate"]."</span></p>");
				echo ("<p>Check out date: <span>".$rowDate["checkOutDate"]."</span></p>");
				echo ("<p>Cots count: <span>".$rowDate["cots"]."</span></p>");
				echo ("<p>AC Type: <span>".$rowDate["acType"]."</span></p>");
				echo ("<p>First Name: <span>".$rowDate["firstName"]."</span></p>");
				echo ("<p>Last Name: <span>".$rowDate["lastName"]."</span></p>");
				echo ("<p>Age: <span>".$rowDate["age"]."</span></p>");
				echo ("<p>Proof Type: <span>".$rowDate["proofType"]."</span></p>");
				echo ("<p>Proof No: <span>".$rowDate["proofNumber"]."</span></p>");
			}
		} else {
			echo ("<p>Failure</p>");
		}
	}
?>
