<?php

include("databaseConn.php");
extract($_POST);

if (isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['address']) && $_POST['address'] && isset($_POST['phone']) && $_POST['phone']){
    
    $sql="SELECT * FROM information WHERE email='".$_POST['email']."'";
    $result=$conn->query($sql);

    if ($result && mysqli_num_rows($result) == 1) {
        echo json_encode(array('ans' => 2));
    } else {
        $name=mysqli_real_escape_string($conn, $_POST['name']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $address=mysqli_real_escape_string($conn, $_POST['address']);
        $phone=mysqli_real_escape_string($conn, $_POST['phone']);

        $sql1 = "INSERT into information (name,email,address,phone)values('$name','$email','$address','$phone')";

        if ($conn->query($sql1) == TRUE) {
            echo json_encode(array('ans' => 1));
        } else {
            echo json_encode(array('ans' => 0));
        }
    }
}else {
    echo json_encode(array('ans' => 10));
}

    
?>