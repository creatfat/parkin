<?php
session_start();
include('../connect/database.php');
// Google passes a parameter 'code' in the Redirect Url
include('config.php');
if(isset($_GET['code'])) {

		$code = $_GET['code'];
		$token = $google_client->fetchAccessTokenWithAuthCode($code);
	
			if(!isset($token['error']))
				{
					$google_client->setAccessToken($token['access_token']);

					$_SESSION['access_token'] = $token['access_token'];

					$google_service = new Google_Service_Oauth2($google_client);

					$data = $google_service->userinfo->get();

					if(isset($data["email"]))
					{
						$email = $data['email'];
						$username = $data['name'];
						$ip = $_SERVER['REMOTE_ADDR'];
						$details = json_decode(file_get_contents('http://ipinfo.io/'.$ip.'/json'));
						$loc = $details->loc;
					}
		
				}
		}
		// Get user information

$sql = "SELECT u.userID, u.username,u.dataURL,u.email,u.loc,u.Role_IDrole, u.Organization, u.Lat, u.Long, r.name as r_name, r.type as r_type FROM user u LEFT JOIN `role` r ON u.Role_IDrole = r.roleID WHERE email = '$email'";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
				
                $_SESSION["username"]=$row['username'];
                $_SESSION["email"]=$row['email'];
                $_SESSION["role"]=$row['Role_IDrole'];
                $_SESSION["org"]=$row['Organization'];
                $_SESSION["lat"]=$row['Lat'];
                $_SESSION["long"]=$row['Long'];
                $_SESSION["r_name"]='patient';
				$_SESSION["userID"]=$row['userID'];
				$_SESSION["dataURL"]=$row['dataURL'];
                $role = $row['userID'];
                $sql = "UPDATE `user` SET `Role_IDrole` = 1 WHERE `userID` = $role";
                $result = $conn->query($sql);
               
                header('Location:../show/patients/patient.php');
				exit();
            }
	 
        } 
			else 
 		{
 		    $random = rand(1,6);
 		    $rand = 'data'.$random.'.csv';
            $sql = "INSERT INTO `user`(`username`, `email`, `Role_IDrole`, `organization`,`Lat`,`Long`,`loc`,`dataURL`) VALUES ('$username','$email', 1,1,NULL,NULL,'$loc','$rand')";
			$result = $conn->query($sql);
				
			$sql2 = "SELECT u.userID, u.username,u.dataURL,u.email, u.Role_IDrole, u.Organization, u.Lat, u.Long, r.name as r_name, r.type as r_type FROM user u LEFT JOIN `role` r ON u.Role_IDrole = r.roleID WHERE email='$email'";
			$result2 = $conn->query($sql2);

			 if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					
					$_SESSION["username"]=$username;
					$_SESSION["email"]=$email;
					$_SESSION["role"]=1;
					$_SESSION["org"]='Hospital';
					$_SESSION["lat"]=NULL;
					$_SESSION["long"]=NULL;
					$_SESSION["r_name"]='patient';
					$_SESSION["userID"]=$row['userID'];
					$_SESSION["dataURL"]=$row['dataURL'];
					header('Location:../show/patients/patient.php');
					exit();
					}
           
			 	}
			
			
			}

?>
