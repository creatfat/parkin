<?php
include('../connect/database.php');
include('config.php');

		$client_id_git = $config1['Client_ID'];
		$client_secret_git = $config1['Client_Secret'];
		$redirect_url_git = $config1['callback_url'];
		$url_git = 'https://github.com/login/oauth/access_token';

		if(isset($_GET["code"]))
		{
		
		$code_git = $_GET['code'];
		$postparameters = [
			'client_id' => $client_id_git,
			'client_secret' => $client_secret_git,
			'code' => $code_git
			];
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url_git);
			curl_setopt($ch,CURLOPT_POST,true);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$postparameters);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array('Accept: application/json'));
			$response = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($response);
			$token = $data->access_token;
			if($token == "")
			{
				echo "error in login with github";

			}
			else
			{
			
				$_SESSION['access_token'] = $token;
				$url1 = 'https://api.github.com/user/emails';
				$authHeader = 'Authorization: token '.$_SESSION['access_token'];
				$userAgentheader = "User-Agent: Demo";
				$ch1 = curl_init();
				curl_setopt($ch1,CURLOPT_URL,$url1);
				curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($ch1,CURLOPT_SSL_VERIFYPEER,false);
				curl_setopt($ch1,CURLOPT_HTTPHEADER,array('Accept: application/vnd.github[.version].param[+json]',$authHeader,$userAgentheader));
				$response1 = curl_exec($ch1);
				$data1 = json_decode($response1,true);
				$email = $data1[0]['email'];
	
			}

		}

        $sql = "SELECT u.userID, u.username, u.email, u.Role_IDrole, u.Organization, u.Lat, u.Long, r.name as r_name FROM user u LEFT JOIN `role` r ON u.Role_IDrole = r.roleID WHERE email='$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
           while($row = $result->fetch_assoc()) {
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
                $sql = "UPDATE `user` SET `Role_IDrole` = 2 WHERE `userID` = $role";
                $result = $conn->query($sql);
                
                header('Location:../show/physicians/physician.php');
			   exit();
            }
        } else {
            
            $username = explode("@", $email)[0];
             $sql = "INSERT INTO `user`(`username`, `email`, `Role_IDrole`, `organization`,`Lat`,`Long`) VALUES ('$username','$email', 2,1,NULL,NULL)";
            $result = $conn->query($sql);
            session_start();
            
            $_SESSION["username"]=$username;
            $_SESSION["email"]=$email;
            $_SESSION["role"]=1;
            $_SESSION["org"]='Hospital';
            $_SESSION["lat"]=NULL;
            $_SESSION["long"]=NULL;
            $_SESSION["r_name"]='physician';
            header('Location:../show/physicians/physician.php');
			exit();
        }	 
?>