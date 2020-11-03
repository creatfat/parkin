<?php 
   session_start();
    if($_SESSION['username']){
      $username=$_SESSION['username'];
        if(isset($_SESSION['dataURL']))
        {
            $dataURL = $_SESSION['dataURL'];
        }
        else
        {    require_once __DIR__ . '../../../connect/connect.php';
             $sql = 'select * from user where username = ?';
             $query = $connect->prepare($sql);
             $query->bindValue(1,$username);
             $query->execute();
             if($query->rowCount() != "")
             {
                 $value3 = $query->fetch(PDO::FETCH_OBJ);
                 $dataURL = $value3->dataURL;
             }
        }
    }
    else
    {
       
        header("location:../../index.php");
        exit();
    }
     
      include('../../management/patient_manage.php');
?>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jqueryform.js" type="text/javascript"></script>
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
		<li><a href="patient.php" title="">My Page</a></li>
		<li><a href="#" title="aboutme">About Me</a></li>
		<li><a href="../../connect/logout.php" title="logout">Logout</a></li>
	</ul>
</div>
</header>
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
         <div align=center class="ibox-title">
                                      <p style="font-weight: bold;">Welcome Dear <?php echo $username;?></p>
                                      <hr class="bg-info" style="height:1px;opacity:0.6">
                        </div>
                        
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
                                              <th>Data</th>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $i = 0;
                                              foreach($patients_data as $patient_data){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $username; ?></td>
                                                <td><?php echo $patient_data['org'];?></td>
                                                <td><?php echo $patient_data['therapy'];?></td>
                                                <td><?php echo $patient_data['medicine'];?></td>
                                                <td><?php echo $patient_data['dosage'];?></td>
                                                <td><?php echo $patient_data['testID'];?></td>
                                                <td><?php echo $patient_data['dateTime'];?></td>
                                           <td><a style="text-align:center;" href="http://plustor.ir/show/patients/diagrams.php/?data=<?php echo $dataURL;?>" ><span class="mdi-24px mdi mdi-content-save"></span></a></td>  
                                    
                                            </tr>
                                            <?php
                                              }
                                            ?>
                                          </tbody>
                                      </table>
                                  </div>
                        
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-10 col-sm-12">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                  <video style='border-radius:15px;' width=500 height=500 controls>
                      <source src='video/parkinson1.mp4' type='video/mp4'>
                      Your browser not supported this format!!
                  </video>
                  <p style="text-align: left;">
                     Parkinson's disease sports
                  </p>
                </div>
              </div>
              <div class="col-lg-6 col-md-10 col-sm-12">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                  <video style='border-radius:15px;' width=500 height=500 controls>
                      <source src='video/parkinson2.mp4' type='video/mp4'>
                      Your browser not supported this format!!
                  </video>
                  <p style="text-align: left;">
                     Parkinson's Disease, biography
                  </p>
                </div>
              </div>
              <div class="col-lg-6 col-md-10 col-sm-12">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                  <video style='border-radius:15px;' width=500 height=500 controls>
                      <source src='video/parkinson3.mp4' type='video/mp4'>
                      Your browser not supported this format!!
                  </video>
                  <p style="text-align: left;">
                    Reading the Warning Signs of Parkinson’s
                  </p>
                </div>
              </div>
              <div class="col-lg-6 col-md-10 col-sm-12">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                  <video style='border-radius:15px;' width=500 height=500 controls>
                      <source src='video/parkinson4.mp4' type='video/mp4'>
                      Your browser not supported this format!!
                  </video>
                  <p style="text-align: left;">
                      Information about Parkinson's
                  </p>
                </div>
 </div>

    </div>
    </div>

</main>
</body>
</html>