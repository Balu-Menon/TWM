<?php
$con=mysqli_connect("mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/","adminmZNxAg2","pLCbgLcQULEK","twm");
// Check connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    header("location: index.php");
}

//validating email	
if (isset($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error! Email not valid!!";
            header("location: index.php");
            }
          
	else {
		$sql="SELECT * FROM register WHERE email='$email'";
		$result = mysqli_query($con,$sql);
		$num_rows=mysqli_num_rows($result);
		{    
			$name = stripslashes($_POST['name']);
			$college = stripslashes($_POST['college']);
			$branch = stripslashes($_POST['branch']);
			$email= stripslashes($_POST['email']);
			$mob = stripslashes($_POST['mob']);
			if(isset($_POST['event1'])){
				$e1=2;
			}
			else {
				$e1=1;
			}
			if(isset($_POST['event2'])){
				$e2=2;
			}
			else {
				$e2=1;
			}
			if(isset($_POST['event3'])){
				$e3=2;
			}
			else {
				$e3=1;
			}
			if(isset($_POST['event4'])){
				$e4=2;
			}
			else {
				$e4=1;
			}
			if(isset($_POST['event5'])){
				$e5=2;
			}
			else {
				$e5=1;
			}

			$sql="INSERT INTO register (name,branch,college,email,mob,singleboard,signalp,fgpa,micro,eda) VALUES ('$name', '$branch','$college','$email','$mob','$e1','$e2','$e3','$e4', '$e5')";
			if (!mysqli_query($con,$sql)) {
				echo "Server busy. Please try again later.";
			}
			else {
				echo "Successfully Registered.";
			}
 	    }
	}
}
mysqli_close($con);

?>