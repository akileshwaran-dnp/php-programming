<html>
	<head>
		<title>Travelly</title>
		<style>
			input[type=number]{
				-moz-appearance: textfield;
			}
			*{
				margin: 0;
			}
			body{
				background-color: #edebe4;
				
			}
			label{
				font-weight: bold;
			}
			input{
				margin-bottom: 20px;
				max-width: 250px;
			}
			.nav-bar{
				position: relative;
				width: 100%;
				height: 50px;
				background-color: #d98362;
				z-index: 1;
				align-items: center;
				display: flex;
				padding: 5px;
				padding-left: 25px;
			}
			#hotel-booking-form{
				margin: 50px;
				left: 15%;
				width: 60%;
				position: relative;
				display: flex;
				flex-direction: column;
				align-items: left;
				padding: 30px;
				padding-left: 100px;
				border: 1px solid grey;
				border-radius: 10px;
					
				
			}
			.heading{
				font-size: xx-large;
				color: crimson;
			}
			#room-info{
				position: relative;
				display: flex;
				flex-direction: column;
				margin-top: 20px;			}
			#personal-info{
				position: relative;
				display: flex;
				margin-top: 20px;
				flex-direction: column;
			}
		</style>
		<script>
			function validateform(){
				var checkInDate = new Date(document.hotelBookingForm.checkInDate.value);
				var checkOutDate = new Date(document.hotelBookingForm.checkOutDate.value);
				var differenceInTime = checkOutDate - checkInDate;
				var differenceInDay = differenceInTime / (1000*3600*24);
				if (differenceInDay > 7){
					alert ("Maximum stay 7 days");
					return false;
				}
				if (differenceInDay < 0){
					alert ("Invalid Date range");
					return false;
				}
				var firstname = document.hotelBookingForm.firstName.value;
				var lastname = document.hotelBookingForm.lastName.value;
				var isFirstNameValid = /^[a-zA-Z]*$/.test(firstname);
				var isLastNameValid = /^[a-zA-Z]*$/.test(lastname);
				if (!isFirstNameValid || !isLastNameValid){
					alert ("Invalid Name");
					return false;
				}
				var age = document.hotelBookingForm.age.value;
				if (age < 18){
					alert ("Minimum age is 18");
					return false;
				}
				var proofType = document.hotelBookingForm.proofType.value;
				var proofNumber = document.hotelBookingForm.proofNumber.value;
				if (proofType == "Aadhar Card"){
						var isValid = /^\d+$/.test(proofNumber);
						if (!isValid || proofNumber.length != 12){
							alert ("Invalid Proof Number");
							return false;
						}
				} else {
					var alphaNumPart = proofNumber.substring(0,3);
					var isAlphaValid = /^[a-zA-Z0-9]*$/.test(alphaNumPart);
					if (proofNumber.length != 10 ||  !isAlphaValid){
						alert ("Invalid Proof Number");
						return false;
					}
				}
			}

		</script>
	</head>
	<body>
		<div class="nav-bar">
			<p>Travelly</p>
		</div>
		<form id="hotel-booking-form" name="hotelBookingForm" method="post" action="/hotel-booking-action.php" onsubmit="return validateform()">
			<label for="room-info" class="heading">Room Info</label>
			<div id="room-info">
				<label for="check-in-date">Check In</label>
				<input type="date" name="checkInDate" id="check-in-date" required />
				<label for="check-out-date">Check Out</label>
				<input type="date" name="checkOutDate" id="check-out-date" required />
				<label for="cots-count">Cots</label>
				<input type="number" name="cotsCount" id="cots-count" max="4" min="1" />
				<div id="ac-radio-list" required >
					<input type="radio" name="acType" id="ac" value="AC" checked />
					<label for="ac" style="font-weight: normal">AC</label>
					<input type="radio" name="acType" id="non-ac" value="Non AC" />
					<label for="non-ac" style="font-weight: normal">Non AC</label>
				</div>
			</div>
			<label for="personal-info" class="heading">Personal Info</label>
			<div id="personal-info">
				<label for="first-name">Firstname</label>
				<input type="text" maxlength="25" name="firstName" id="first-name" required />
				<label for="last-name">Last Name</label>
				<input type="text" maxlength="25" name="lastName" id="last-name" />
				<label for="age">Age</label>
				<input type="number" name="age" id="age" required />
				<label for="proofType">Proof Type</label>
				<div id="proof-type">
					<input type="radio" name="proofType" id="aadhar-card" value="Aadhar Card" checked />
					<label for="aadhar-card" style="font-weight: normal">Aadhar Card</label>
					<input type="radio" name="proofType" id="pan-card" value="PAN Card" />
					<label for="pan-card" style="font-weight: normal">PAN Card</label>
				</div>
				<label for="proof-number">Proof Number</label>
				<input type="text" name="proofNumber" id="proof-number" required />
			</div>
			<input type="submit" name="submitForm" value="submit" />
		</form>
	</body>
</html>
