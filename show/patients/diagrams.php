<?php 
    session_start();
    if($_SESSION['username']){
      $username=$_SESSION['username'];
      include "mainpage.php";
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
<script src="https://cdn.plot.ly/plotly-1.8.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.2.0/require.min.js"></script>
<script src="https://cdn.rawgit.com/etpinard/plotlyjs-finance/master/plotlyjs-finance.js"></script>


<link rel="stylesheet" href="//cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css">
<title></title>
<header>
<div>
	<ul>
		<li><a href="../patient.php" title="my_page">My Page</a></li>
		<li><a href="#" title="aboutme">About Me</a></li>
		<li><a href="http://plustor.ir/connect/logout.php" title="logout">Logout</a></li>
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
		#myDiv:hover .modebar-group{
		    display:none;
		}
		#map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
	</style>
    <script src="https://cdn.plot.ly/plotly-1.2.0.min.js"></script>
</head>
<body>
    <main>


            <div class="col-lg-9 col-md-8 col-sm-6 col-xs-10 home-section bg-gray paddingbot-60 paddingtop-20 container" id="patients">

          
                      
                      <div class="row"style="margin-top:12px;margin-bottom:-15px; font-size:16px;">
                                        <div class="col-lg-6"> 
                                           <p style="font-weight: bold;">Welcome Dear <?php echo $username;?></p>
                                        </div>
                                   
                                    </div>
                                    
                                   
                                      <hr class="bg-info" style="height:1px;opacity:0.6">
                               
                              <div class="section-heading text-center paddingbot-20">
                                <h2 class="h-bold">Patient Data</h2>
                                <br>
                                 
                              </div>
                              <br>
                      
                      
                      <div class="ibox-body">
                          <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%" style="text-align:center;vertical-align: middle;">
                            
                              </tbody>
                          </table>
                      </div>
                      

<div class="wrapper">
<div id="graphDiv"></div>


 <div id="myDiv" style="width: 100%; height: 500px;"></div>
 

<?php
 
   $my_file = fopen($_GET['data'], 'r');
 
    while(!feof($my_file)) {
 
        $line = fgets($my_file);
     
    }
 
    fclose($my_file);
	

$A=strlen($line );
 

    $my_file = fopen($_GET['data'], 'r');
	$string1="";
	$ddata=[];
	$j=0;
	$k=0;
	$n=0;
    for($i=0;$i<$A;$i++){
        $char = fgetc($my_file);
			if(ord($char)<>13){
				if($char<>","){
					if($j==0)
					$string1=$string1.$char;
				}
				else{
					if($k==0){
						$ddata[$n]=$string1;
						$string1="";
						$n=$n+1;
						
					}
					$j=$j+1;
					$k=$k+1;
					
				}
			}
			else{
				$j=0;
				$k=0;
			}
				
	}

    fclose($my_file);


		
?>


<?php
 
   $my_file = fopen($_GET['data'], 'r');
 
    while(!feof($my_file)) {
 
        $line = fgets($my_file);
     
    }
 
    fclose($my_file);
	

$A=strlen($line );
 

    $my_file = fopen($_GET['data'], 'r');
	$string1="";
	$datay=[];
	$j=0;
	$k=0;
	$n=0;
    for($i=0;$i<$A;$i++){
        $char = fgetc($my_file);
			if(ord($char)<>13){
				if($char<>","){
					if($j==1)
					$string1=$string1.$char;
				}
				else{
					if($k==0){
						$datay[$n]=$string1;
						$string1="";
						$n=$n+1;
						
					}
					$j=$j+1;
					$k=$k+1;
					
				}
			}
			else{
				$j=0;
				$k=0;
			}
				
	}

    fclose($my_file);
 array_splice($datay, 0, 1);
?>

<div class="wrapper">
<div id="graphDiv"></div>
 
  <div id="myDiv" style="width: 800; height: 640;"></div>

<script type="text/javascript">
	
var ar = <?php echo json_encode($datay) ?>;
var ary = <?php echo json_encode($ddata) ?>;
x=ar;

	 var myPlot = document.getElementById('myDiv'),
        d3 = Plotly.d3,
        N = 10,
		
        x = ar,
        y1 = ary,
       
         trace1 = { x:x, y:y1, type:'scatter', mode:'markers', name:'X&Y' },
     
        data = [ trace1 ],
       layout = {
            hovermode:'none',
            title:'Click on Points to add an Annotation on it'
         }; 
    Plotly.newPlot('myDiv', data, layout, {showSendToCloud: true});

    myPlot.on('plotly_click', function(data){
        var pts = '';
        for(var i=0; i<data.points.length; i++){
            annotate_text = 'x = '+data.points[i].x +
                          'y = '+data.points[i].y.toPrecision(4);

            annotation = {
              text: annotate_text,
              x: data.points[i].x,
              y: parseFloat(data.points[i].y.toPrecision(4))
            }

            annotations = self.layout.annotations || [];
            annotations.push(annotation);
            Plotly.relayout('myDiv',{annotations: annotations})
        }
    });
	
	
	
	</script>



<div id="graphDiv"></div>


            
            </div><!-- cloes right side of pannel -->      
          </section>      

</main>




</body>
</html>