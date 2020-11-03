<?php
include('../connect/database.php');
include('config.php');
		
		if(isset($_GET['code']))
			{
			
			$url = "https://www.linkedin.com/oauth/v2/accessToken";
			$params = [
					'client_id' => $config['Client_ID'],
					'client_secret' => $config['Client_Secret'],
					'redirect_uri' => $config['callback_url'],
					'code' => $_GET['code'],
					'grant_type' => 'authorization_code'
				];
			$paramet = http_build_query($params);
			$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $paramet);
				$headers = [];
				$headers[] = "Content-Type: application/x-www-form-urlencoded";
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				$result = curl_exec($ch);
				curl_close($ch);
				$data = json_decode($result);
				$access_token = $data->access_token;
				if($access_token == "")
		{
			die('Error in logined please tragin');
		}
		else
		{
			$url2 = "https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))&oauth2_access_token=". $access_token;
			$params2 = [];
			$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL, $url2);
			curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			$headers2 = [];
			$headers2[] = "Content-Type: application/x-www-form-urlencoded";
			curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
			$result2 = curl_exec($ch2);
			curl_close($ch2);
			$data2= json_decode($result2);
			$email = $data2->elements[0]->{"handle~"}->emailAddress;
			$username = explode("@", $email)[0];
		}
}
		$sql = "SELECT u.userID, u.username, u.email, u.Role_IDrole, u.Organization, u.Lat, u.Long, r.name as r_name FROM user u LEFT JOIN `role` r ON u.Role_IDrole = r.roleID WHERE email=$email";
		
		$result = $conn->query($sql);
 
        if($result->num_rows > 0){
       
            while($row = $result->fetch_assoc()){
                session_start();
                $_SESSION["username"]=$row['username'];
                $_SESSION["email"]=$row['email'];
                $_SESSION["role"]=$row['Role_IDrole'];
                $_SESSION["org"]=$row['Organization'];
                $_SESSION["lat"]=$row['Lat'];
                $_SESSION["long"]=$row['Long'];
                $_SESSION["r_name"]='physician';
                $_SESSION["userID"]=$row['userID'];
                $role = $row['userID'];
                $sql = "UPDATE `user` SET `Role_IDrole` = 3 WHERE `userID` = $role";
                $result = $conn->query($sql);
                header('Location:../show/researchers/researcher.php');
               exit();
            }
        } else {
				session_start();
				$sql = "INSERT INTO `user`(`username`,`email`,`Role_IDrole`,`organization`,`Lat`,`Long`) VALUES ('$username','$email',3,2,NULL,NULL)";
				$result = $conn->query($sql);
				$_SESSION["username"]=$username;
				$_SESSION["email"]=$email;
				$_SESSION["role"]=3;
				$_SESSION["org"]='Hospital';
				$_SESSION["lat"]=NULL;
				$_SESSION["long"]=NULL;
				$_SESSION["r_name"]='physician';
				header('Location:../show/researchers/researcher.php');
				exit();
			} 
?>