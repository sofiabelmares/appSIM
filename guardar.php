<?php

 $serverName = "somail.database.windows.net"; //serverName\instanceName, portNumber (por defecto es 1433)
 $connectionInfo = array( "Database"=>"SOMAIL", "UID"=>"rootIts", "PWD"=>"Somail2020its");
 $conn = sqlsrv_connect( $serverName, $connectionInfo);
 if ($conn === false) {  
    echo "Could not connect.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  

$nombre  = $_POST['nombre'];
$apellido  = $_POST['apellido'];
$email = $_POST['email'];

/* Set up the parameterized query. */  
$tsql = "INSERT INTO dbo.clientes   
        (nombre,   
         apellido,   
         email)  
        VALUES   
        (?, ?, ?)";  
  
/* Set parameter values. */  
$params = array($nombre, $apellido, $email);  
  
/* Prepare and execute the query. */  
$stmt = sqlsrv_query($conn, $tsql, $params);  
if ($stmt) {  
    echo "Row successfully inserted.\n";  
} else {  
    echo "Row insertion failed.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
  
/* Free statement and connection resources. */  
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);  

?>