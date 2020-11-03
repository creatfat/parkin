<?php 
    session_start();
    if(isset($_SESSION['username'])){
      $username=$_SESSION['username'];
    }
    else{
        header("location:../../index.php");
        exit();
    }
      include('../../management/researchers_manage.php');

?>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jqueryform.js" type="text/javascript"></script>
<title></title>
<header>
<div>
	<ul>
		<li><a href="researcher.php" title="">My Page</a></li>
		<li><a href="rss.php" title="rss">Rss</a></li>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>


    <main>

            <div class="col-lg-9 col-md-8 col-sm-6 col-xs-10 home-section bg-gray paddingbot-60 paddingtop-20 container" id="patients">

                               
                                   
                                      <div class="row"style="margin-top:12px;margin-bottom:-15px; font-size:16px;">
                                        <div class="col-lg-6"> 
                                           <p style="font-weight: bold;">Welcome Dear <?php if(isset($username))
										   {
											   echo $username;
										   }?></p>
                                        </div>
                                   
                                    </div>
                                    
                                   
                                      <hr class="bg-info" style="height:1px;opacity:0.6">
                                  
                                      
                                <br>
                        
                              <div class="section-heading text-center paddingbot-20">
                                <h2 class="h-bold">RSS Feed</h2>
                              </div>
                                <br>
                                <br>
                                
                                  <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> The Michael J. Fox Foundation for Parkinson's Research  </br>
                                     <a style="font-weight:bold;">Abstract:</a> Breaking news, research updates, and daily inspiration for the Parkinson's community. The Michael J. Fox Foundation is dedicated to finding a cure for Parkinson's disease through an aggressively funded research agenda and to ensuring the development of improved therapies for those living with Parkinson's today.
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                                 <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> National Parkinson Foundation  </br>
                                     <a style="font-weight:bold;">Abstract:</a> We make life better for people with Parkinson's through expert care and research. Everything we do helps people enjoy life with friends, families, children and grandchildren until there is a tomorrow without Parkinson's
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                                    <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> The Parkinson's Disease Foundation  </br>
                                     <a style="font-weight:bold;">Abstract:</a> The Parkinson's Disease Foundation (PDF) is a leading national presence in Parkinson's disease research, education and public advocacy. We are working for the nearly one million people in the US who live with Parkinson's by funding promising scientific research while supporting people living with Parkinson's through educational programs and services.
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                                    <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> The PatientsLikeMe Parkinson's Disease </br>
                                     <a style="font-weight:bold;">Abstract:</a> PatientsLikeMe is a patient network that improves lives and a real-time research platform that advances medicine. Through our network, people connect with others who have the same disease or condition and track and share their own experiences. In the process, they generate data about the real-world nature of disease that helps companies and organizations develop more effective products & services.
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                                    <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> About Parkinson's Disease </br>
                                     <a style="font-weight:bold;">Abstract:</a> Parkinsons Recovery is a clearinghouse of information about treatments and therapies for persons diagnosed with Parkinson's disease. This blog is to provide support, information and resources to families with a member currently experiencing the symptoms of Parkinsons.
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                                    <div>
                                     <P> 
                                     <a style="font-weight:bold;">Title:</a> 9zest Blog RSS Feed  </br>
                                     <a style="font-weight:bold;">Abstract:</a> 9zest offers Personalized Therapy Programs for Parkinson's disease, Stroke Rehabilitation and Pain Management. We leverage neuroplasticity principles to improve the quality of life. Mission is to Enhance quality of life and health by leveraging global network of health, fitness and nutrition coaches that are affordable and available anywhere, anytime.
                                     <a href="#" target="_blank">Read More...</a>
                                     </p>
                                 </div>
                                 <hr class="bg-success" style="height:1px;opacity:0.6;">
                                 
                  
                </div>
           
          
</main>

</body>