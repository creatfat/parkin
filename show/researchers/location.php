<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
if(isset($_GET['loc']))
{
    $loc = $_GET['loc'];
    if(strlen($loc) == 0)
    {
        header("location:researcher.php");
        exit();
    }
    else
    {
        echo '<h3>Pationts Locations</h3>
               <div id="map" style="width:100%;height:600px;">
               <iframe src="https://maps.google.com/maps?q='.$loc.'&z=10&output=embed" width="100%" height="100%" frameborder="0" style="border:0"></iframe></div>
                        </div>';
                        
        echo '<a href="researcher.php" title="back"><i class="fa fa-arrow-circle-left" style="font-size:48px;color:blue"></i></a>';
    }
}
?>