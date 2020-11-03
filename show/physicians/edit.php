<?php
if(isset($_GET['patient_name']))
{
    $patient_name=$_GET['patient_name'];
    if(isset($_POST['submit']))
    {
        $note = $_POST['note'];
        if(strlen($note) == 0)
        {
            echo "<script>alert('please enter your text!!!');</script>";
        }
        else
        {
           
            require_once __DIR__ . '../../../connect/connect.php';
            $sql = 'UPDATE `user` SET `note` = ? WHERE `username` = ?';
            $query = $connect->prepare($sql);
            $query->bindValue(1,$note);
            $query->bindValue(2,$patient_name);
            if($query->execute())
            {
                header("location:physician.php");
                exit();
            }
            else
            {
                echo '<script>alert("error in update database!!!");</script>';
            }
        }
    }

}
else
{
    header("location:researcher.php");
    exit();
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form action="" method='POST'>
    <h1 style='margin:0 auto;text-align:center;margin-top:50px;'>Paitent: <?php echo $patient_name?></h1>
    <h2 style='text-align:center;margin-top:100px;'>Edit Your Note</h2>
<div class="text-secondary" style='text-align:center;margin:50px auto;width:400px;height:400px;background-color:#cccccc;border-radius:10px;border:2px solid blue;'>
    <div style='position:relative;width:60px;height:50;border-radius:15px;'><a href='researcher.php'><i class="fa fa-arrow-circle-left" style="font-size:48px;color:blue"></i></a></div>
    <textarea name='note' style='width:80%;height:100px;text-align:center;border-radius:10px;margin-top:50px;font-size:20px;' placeholder=''></textarea>
<div><input type='submit' name='submit' value='Enter' style='margin-top:80px;width:100px;height:60px;border-radius:5px;border:2px solid red;font-size:20px;font-family:'tahoma';'></div>


</div>
</form>