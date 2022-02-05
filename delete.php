<?php 
include ('include/conn.php');
$id = $_GET['id'];
$asdf = mysqli_query($con, "DELETE FROM myadvert where advert_id = '$id' ");
if ($asdf){
                echo "<script>window.alert('Sucessfully deleted');</script>";
                echo "<script>window.location='index.php';</script>";
            } else {
                echo "<script>window.alert('not save!');</script>";
            }

?>