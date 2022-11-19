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
        header('location:code.php?delete_msg=<div class="alert alert-danger" role="alert">You deleted a record</div>');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<body>
  
</body>
</html>