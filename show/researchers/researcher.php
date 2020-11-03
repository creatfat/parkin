<?php 
    session_start();
    if(isset($_SESSION['username']))
	{
      $username=$_SESSION['username'];
      $email=$_SESSION['email'];
      $role=$_SESSION['role'];
      $org=$_SESSION['org'];
      $lat=$_SESSION['lat'];
      $long=$_SESSION['long'];
      $r_name=$_SESSION['r_name'];
      $userID = $_SESSION['userID'];
      include('../../management/researchers_manage.php');
	}

?>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link rel="stylesheet" href="//cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css">
<title></title>
<header>
<div>
	<ul>
		<li><a href="researcher.php" title="my_page">My Page</a></li>
		<li><a href="rss.php" title="RSS">Rss</a></li>
		<li><a href="#" title="aboutme">About Me</a></li>
		<li><a href="../../connect/logout.php" title="logout">Logout</a></li>
	</ul>
</div>
</header>
</head>
	<style>
		@font-face{
			src: url("../10.Professional.Fonts.for.Web.Designers.ttf-otf-jpg_persiangfx.com/lato/Lato-BlaIta.ttf");
			font-family: 'en_font';
		}
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			outline: none;
		}
		header
		{
			width: 100%;
			height: 150px;
			background-color: #6D6D6D;
		}
		div ul{
			float: left;
			display: flex;
			width: 40%;
			direction: ltr;
			height: 100px;
		}
		div ul li{
			list-style: none;
			margin-right: 15px;
			width: 120px;
			height: 30px;
			text-align: center;
			margin-top: 20px;
			background-color: #5A5959;
			border-radius: 5px;
			transition: all 0.5s;
		}
		div ul li:hover
		{
			transform: scale(0.9);
			text-decoration: none;
		}
		div ul li a{
			font-family:'en_font';
			text-transform: capitalize;
			font-size: 22px;
			color: blue;
			font-weight: bold;
			text-decoration: none;
			font-style: italic;
		}
	</style>

</head>

<body>

    <main>

<!-- right side of pannel -->

            <div class="col-lg-9 col-md-8 col-sm-6 col-xs-10 home-section bg-gray paddingbot-60 paddingtop-20 container" id="patients">

          
                      
                      <div class="row"style="margin-top:12px;margin-bottom:-15px; font-size:16px;">
                                        <div class="col-lg-6"> 
                                           <p style="font-weight: bold;">Welcome Dear <?php echo $username;?></p>
                                        </div>
                                   
                                    </div>
                                    
                                   
                                      <hr class="bg-info" style="height:1px;opacity:0.6">
                               
                              <div class="section-heading text-center paddingbot-20">
                                <h2 class="h-bold">Patient Data</h2>
                              </div>
                              <br>
                      
                      
                      <div class="ibox-body">
                          <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%" style="text-align:center;vertical-align: middle;">
                              <thead>
                                  <th>No</th>
                                  <th>Patient Name</th>
                                  <th>Organization</th>
                                  <th>Therapy</th>
                                  <th>Medicine</th>
                                  <th>Dosage</th>
                                  <th>Test ID</th>
                                  <th>Date Time</th>
                                  <th>Note</th>
                                  <th>Edit Note</th>
                                  <th>Data</th>
                                  <th>location</th>
                                   
                                 
                              </thead>
                              <tbody>
                                <?php
                                    
                                  include('../../management/researchers_manage.php');
                                  $i = 0;
                                  foreach($get_data as $val){
                                    $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $val['patient_name'];?></td>
                                    <td><?php echo $val['organization'];?></td>
                                    <td><?php echo $val['therapy'];?></td>
                                    <td><?php echo $val['doctor_name'];?></td>
                                    <td><?php echo $val['dosage'];?></td>
                                    <td><?php echo $val['testID'];?></td>
                                    <td><?php echo $val['TIME'];?></td>
                                    <td><?php echo $val['note'];?></td>
                                    
                                    <td><?php
                                    
                                    echo '<a href="edit.php?patient_name='.$val['patient_name'].'">edit</a>';
                                    ?></td>  
                              
                                    
                                    <td><a style="text-align:center;" href="http://plustor.ir/show/researchers/details.php/?data=<?php echo $val['data'];?>.csv" ><span class="mdi-24px mdi mdi-content-save"></span></a></td>  
                                    <td>
                                        <?php
                                        
                                        echo '<a href="location.php?loc='.$val['loc'].'">location</a>';
                                        
                                        ?>
                                        
                                        
                                    </td>
                                </tr>
                                    

                                <?php
                                  }
                                ?>
                              </tbody>
                          </table>
                      </div>
</main>

</body>
</html>
