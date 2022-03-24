<?php 
function conDb(){
    $con=mysqli_connect("localhost","root","","crud"); // connection to database
    // check connection
    if(!$con) { die(" Connection Error "); } 
    return $con;
}

?>