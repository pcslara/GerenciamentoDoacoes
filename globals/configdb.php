<?php
    
    if (isset($_SESSION['usertimestamp']) && (time() - $_SESSION['usertimestamp']) > 900) {
        //session_unset();     // unset $_SESSION variable for the run-time 
        //session_destroy();   // destroy session data in storage
        //if(!isset($_SESSION)) session_start();
        $_SESSION['loginerrormsg'] = 'Desculpe, sua sessão expirou.';
        header("location: index.php");
        exit;
    }
    
  
    $servername = "localhost";
    $username = "root";
    $password = "MineMasterkey321";
    $dbname = "doacoespet";
    
    
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $conn->query("SET NAMES 'utf8'");
    $conn->query('SET character_set_connection=utf8');
    $conn->query('SET character_set_client=utf8');
    $conn->query('SET character_set_results=utf8');
    

    
    
?>
