<?php

$con = mysqli_connect("localhost", "root", "", "test_db");
if (!$con) {
  echo "failed";
} else {
  // echo "successful";
}


if (isset($_POST["submit"])) {

  $name = $_POST['st_name'];
  $roll_no = $_POST['roll_no'];
  $st_class = $_POST['st_class'];
  $st_section = $_POST['st_section'];
  $code = $_POST['sbj_code'];
  $sbj_name = $_POST['sbj_name'];
  // echo "I am code"; 
    
  $check_rollno = "SELECT * FROM `st_form` WHERE `roll_no`= '$roll_no'";
  $output = mysqli_query($con,$check_rollno);
  $count = mysqli_num_rows($output);
  if ($count>0) {
    echo "<div class='alert alert-danger' role='alert'>This Roll No is already registered, Try anyother number</div>";
  }
else{
  $query = "INSERT INTO `st_form`(`st_name`, `roll_no`, `st_class`, `st_section`)
      VALUES ('$name','$roll_no','$st_class','$st_section')";

  if (mysqli_query($con, $query)) { 
    $last_id = mysqli_insert_id($con);
    echo "<div class='alert alert-success' role='alert'>New record created successfully. Last inserted ID is:" . $last_id . "</div>";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
  }

  foreach ($code as $index => $names) {
    // echo $names."_".$sbj_name[$index];

    $s_code = $names;
    $sb_name = $sbj_name[$index];

    $query2 = "INSERT INTO `st_sbject`(`st_id`, `sbj_code`, `sbj_name`)
       VALUES ('$last_id','$s_code','$sb_name')";
    $result2 = mysqli_query($con, $query2);
  }
} 
}
else {
  "Error:" . "<br>" . mysqli_error($con);
}

?>



<!-- Update Code -->
<?php

if (isset($_POST["submit_update"])) {
  // print_r($_POST['sbj_id']);
  // die;
  $st_id = $_POST['st_id'];
  $name_upd = $_POST['st_name'];
  $roll_noupd = $_POST['roll_no'];
  $st_classupd = $_POST['st_class'];
  $st_sectionupd = $_POST['st_section'];
  $sbj_id = $_POST['sbj_id'];
  $code_upd = $_POST['sbj_code'];
  $sbj_nameupd = $_POST['sbj_name'];
  // echo "I am code"; 

  
  $update = "UPDATE `st_form` SET `st_name`='$name_upd', `roll_no`=$roll_noupd, `st_class`='$st_classupd' , `st_section`='$st_sectionupd' WHERE id = $st_id ";

  $result_upd1 = mysqli_query($con, $update);


  // if (mysqli_query($con, $update)) {
  //   $last_id = mysqli_insert_id($con);
  //   echo "<div class='alert alert-success' role='alert'>Record updated successfully. Last inserted ID is:". $last_id ."</div>";
  //   } else {
  //   echo "Error: " . $update . "<br>" . mysqli_error($con);
  // }

    foreach ($code_upd as $index => $names) {
      // echo $names."_".$sbj_name[$index];
  
      $s_codeupd = $names;
      $sb_nameupd = $sbj_nameupd[$index];
  
      $update2 = "UPDATE `st_sbject` SET `sbj_code`='$s_codeupd',`sbj_name`='$sb_nameupd' WHERE id = '$st_id'";
      // print_r($update2);
      // die;
      $result_upd = mysqli_query($con, $update2);
    }
  }

  
// End of update code 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>show data</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>

<body>
  
  
  <div class="box1">
    <h3 style="padding-left:200px ; padding-top: 30px;">Student Information</h3>
    <a type="button" href="form.php" class="btn btn-primary" style="margin-left:1015px;"> ADD STUDENTS</a>
  </div>
  <div style="width:75%;margin-left:200px">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Student Name</th>
          <th>Roll No</th>
          <th>Class</th>
          <th>Subject</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM `st_form`";
        $result = mysqli_query($con, $query);
        if (!$result) {
          echo "query failed";
        } else {
          $result;
        }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <?php
          $student_id = $row['id'];
          $s_query2 = "SELECT * FROM `st_sbject` where st_id = '$student_id'";
          $s_result2 = mysqli_query($con, $s_query2);
          // print_r($s_result2);
          $subject = "";
          while ($row2 = mysqli_fetch_assoc($s_result2)) {
            $subject = $subject  . ' ' . $row2['sbj_name'];
          }
          ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['st_name'] ?></td>
            <td><?php echo $row['roll_no'] ?></td>
            <td><?php echo $row['st_class'] . "_" . $row['st_section'] ?></td>

            <td><?php echo $subject; ?></td>

            <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">EDIT</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></< /td>
          </tr>
        <?php
        }
        ?>
      </tbody>

    </table>
  </div>
</body>
<script>

</script>

</html>