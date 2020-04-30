<!DOCTYPE html>
<html>
    <head>
        <title> Pagina principal de PHP</title>
        <meta charset="UTF-8">
        <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="index.php" method="post">
            <input type="text" name="firstname" required placeholder="Nombre"> <br><br> 
            <input type="text" name="lastname" required placeholder="Apellido"> <br><br>  
            <input type="submit" name="insert" required value="Add data"> <br><br>            
        </form>
    </body>
</html>


<?php

if(isset($_POST['insert']))
{

$host = 'db'; //service name from docker-compose-yml
$user = 'devuser';
$password = 'devpass';
$db = 'test_db';


$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error) {
    echo 'connetion failed' . $conn->connect_error;
}

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

$query = "INSERT INTO `Usuarios`(`Nombre`, `Apellido`) VALUES ('$firstName','$lastName')";

$result = mysqli_query($conn,$query);
    
// check if mysql query successful

if($result)
{
    echo 'Data Inserted';
}

else{
    echo 'Data Not Inserted';
}

mysqli_close($conn);

}

?>  