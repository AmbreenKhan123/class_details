<?php
$con = mysqli_connect("localhost","root","","test_db");
if (!$con) {
  echo "failed";
} else {
  // echo "successful";
}


// $query = "SELECT * FROM st_form WHERE id='" . $_GET['id'] . "'";
// $result = mysqli_query($con,$query);
// $row= mysqli_fetch_array($result);

// $query2 = "SELECT * FROM st_sbject WHERE st_id='" . $_GET['id'] . "'";
// $st_subj = mysqli_query($con,$query2);
// $row_subj= mysqli_fetch_array($st_subj);

$result = mysqli_query($con,"SELECT * FROM st_form WHERE id='" . $_GET['id'] . "'");

$row= mysqli_fetch_array($result);

$st_subj = mysqli_query($con,"SELECT * FROM st_sbject WHERE st_id='" . $_GET['id'] . "'");

$row_subj= mysqli_fetch_array($st_subj);

// print_r(($row_subj));
// die;
// die(gettype($st_subj));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<!-- Main Body -->

<body>

    <div class="box1">
        <h1 style="padding-left:480px ; padding-top: 50px;">Update Student Form</h1>
    </div>
    <center>
        <form style="width:50%;" method="POST" action="code.php" id="form1">



            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="hidden" class="form-control" value="<?php echo $row['id']; ?>" name="st_id">
                    <input type="text" class="form-control" value="<?php echo $row['st_name']; ?>" name="st_name" placeholder="Student Name" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" value="<?php echo $row['roll_no']; ?>" name="roll_no" placeholder="Roll No" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" value="<?php echo $row['st_class']; ?>" name="st_class" placeholder="Class" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" value="<?php echo $row['st_section']; ?>" name="st_section" placeholder="Section" required>
                </div>
            </div>


            <button type="button" id="button1" class="btn btn-primary" style="margin-left:500px ;">Update Subject</button>


            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Subject No</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($st_subj as $key => $value) {
                ?>
                <tr><td><?php echo $key+1 ?></td><td>
                <input type="hidden" class="form-control" value="<?php echo $value['id']; ?>" name="sbj_id">
                <input type="text" class="form-control" value="<?php echo $value['sbj_code']; ?>"  name="sbj_code[]" placeholder="Subject Code"></td>
                <td><input type="text" class="form-control" value="<?php echo $value['sbj_name']; ?>" name="sbj_name[]" placeholder="Subject Name"></td>
                <td><button type="button" id="button1" class="remove-btn btn btn-danger">Remove</button></td></tr>
                <?php
                }
                ?>
                </tbody>

            </table>
            <input type="submit" value="Update" name="submit_update" class="btn btn-primary" style="margin-left:500px; width:100px;">
        </form>
    </center>

    
</body>


<!-- Jquery Code -->
<script type="text/javascript">
    $(document).ready(function() {



        $(document).on('click', '.remove-btn', function() {
            $(this).closest('tr').remove();
        });
        let someValue = 1;

        $("#button1").on('click', function() {
            $('#myTable tr:last').after('<tr><td>' + someValue + '</td><td>\
            <input type="text" class="form-control" name="sbj_code[]" placeholder="Subject Code"></td>\
            <td><input type="text" class="form-control" name="sbj_name[]" placeholder="Subject Name"></td>\
            <td><button type="button" id="button1" class="remove-btn btn btn-danger">Remove</button></td></tr>');
            someValue++;
        });
    })
</script>

