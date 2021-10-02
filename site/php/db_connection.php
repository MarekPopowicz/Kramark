<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "q7dnw6k";
 $db = "db_kramark";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or 
        die("Connect failed: %s\n". $conn -> error);
      
 
 return $conn;
 }
 
function CloseCon($conn)
 {
    $conn -> close();
 }

 
 

 function getConnection(){
   return $conn = OpenCon();
}
   
?>