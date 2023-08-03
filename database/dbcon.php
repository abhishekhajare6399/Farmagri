<?php

$server ="localhost";
$user ="root";
$password ="";
$db ="farmagri.main";

$con = mysqli_connect($server,$user,$password,$db);

if($con)
{

}else{
    ?>
    <script>
        alert("No connection ")
    </script>
    <?php
}
?>