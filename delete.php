<?php
// echo "Delete a record";

$con = mysqli_connect("localhost","root","","test_db");
if (!$con) {
  echo "failed";
} else {
  // echo "successful";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dltquery = "DELETE FROM `st_form` WHERE `id` = $id";

    $result = mysqli_query($con,$dltquery);
    if (!$result) {
        echo "query failed";
    }
    else{
        header('location:code.php');
    }
}

?>