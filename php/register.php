<?php
$name = $_POST["username"];
$pswd = $_POST["password"];

if (!empty($username) || !empty($pswd)) {

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "my-app";

$con = new mysqli($host,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_error()) {
    die("Connect Error (" . mysqli_connect_errno() . ")" . mysqli_connect_error());
}

else {

    $SELECT = "SELECT username FROM student WHERE username = ? Limit 1";
    $INSERT = "INSERT INTO register (username, password) values(?,?)";

    $stmt = $con ->prepare($SELECT);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt-> close() ;
        $stmt = $con -> prepare($INSERT);
        $stmt->bind_param("ss", $name, $pswd); 
        $stmt->execute();
        echo "User registered Successfully!";
    }

    else{
        echo "Email already registered!";
    }
    $stmt ->close() ;
    $con -> close();
}
}
else
 {
    echo "All fields are required!";
}

?>