<?php
include("databaseConn.php");
$response = array();

if ($conn) {
    $query = "SELECT * FROM information";
    $result = mysqli_query($conn,$query);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]["name"] = $row["name"];
            $response[$i]["email"] = $row["email"];
            $response[$i]["address"] = $row["address"];
            $response[$i]["phone"] = $row["phone"];

            $i++;
        }

        echo json_encode($response,JSON_PRETTY_PRINT);
    }
} else {
    echo "Database connection failed";
}





?>