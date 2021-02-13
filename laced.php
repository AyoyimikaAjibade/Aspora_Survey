<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora Form</title>
</head>
<body>
<?php 
include 'db_connect.php';


$survey_question = '';
$update = false;
$question_number = null;
$laced = '';
$laceless = '';
$pair = '';

/////////////////////////////////////////////////
//Creating a CRUD functionality for the Laces/Laceless table
//insert new data to laces_laceless table
if(isset($_POST['submit'])) {
    $question_number= $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $laced = $_POST['laced'];
    $laceless = $_POST['laceless'];
    $pair = $_POST['pair'];
    
    if(!empty($survey_question) && !empty($laced) && !empty($laceless) && !empty($pair)){
            
    $query = "INSERT INTO laces_laceless (question_number, survey_question, laced, laceless, pair)
    VALUES ('$question_number', '$survey_question', '$laced', '$laceless', '$pair')";
    
    $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    if ($run) {
        echo "Insert has been successfully!";
    }
    else {
        echo "Form not successful!";
    }
    
}
    //redirect the user to the mainpage
    header("location: index.php");
}

//edit data from laces_laceless table
if (isset($_GET['edit'])){ //if edit link is clicked
    $question_number = $_GET['edit'];
    $update = true;
    $query_edit = "SELECT  * FROM laces_laceless WHERE question_number=$question_number";
    $edit = mysqli_query($conn, $query_edit) or die(mysqli_error());
    //if (count($edit)==1){ //if record exist
    $row = $edit->fetch_array();
   /*  foreach($row as $key => $value){
        //echo('key==>',$key);
    } */
    $survey_question = $row['survey_question'];
    $laced = $row['laced'];
    $laceless= $row['laceless'];
    $pair  = $row['pair'];

}

//update data from laces_laceless table
if (isset($_POST['update'])){
    $question_number = $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $laced = $_POST['laced'];
    $laceless = $_POST['laceless'];
    $pair = $_POST['pair'];
    $query_update = "UPDATE laces_laceless SET survey_question='$survey_question', 
    laced='$laced', laceless='$laceless', pair='$pair'  
    WHERE question_number=$question_number";
    $updated = mysqli_query($conn, $query_update) or die(mysqli_error($conn));
    if ($updated) {
        echo "Data successfully updated!";
    }
    else {
        echo "Data not successfully updated!";
    }//redirect the user to the mainpage
    header("location: index.php");
}

if (isset($_GET['delete'])){
  $question_number = $_GET['delete'];
  $del_query = "DELETE FROM laces_laceless WHERE question_number=$question_number";
  $deleted = mysqli_query($conn, $del_query) or die(mysqli_error($conn));

  $_SESSION['message'] = "Record has been successfully deleted!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");
}
?>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Laced/Laceless</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <input type="hidden" name="question_number" value="<?php echo $question_number; ?>">
          <div class="form-group">
            <label for="question_number" class="col-form-label">Question Number:</label>
            <input type="number" class="form-control" id="question_number" name="question_number" value="<?php echo $question_number; ?>" placeholder="Enter Question Number">
          </div>
          <div class="form-group">
            <label for="survey_question" class="col-form-label">Survey Question:</label>
            <textarea class="form-control" id="survey_question" type="text" name="survey_question" value="<?php echo $survey_question; ?>" placeholder="Enter Survey Question"></textarea>
          </div>
          <div class="form-group">
            <label for="laced" class="col-form-label">Laced:</label>
            <input class="form-control" id="laced" type="number" name="laced" value="<?php echo $laced; ?>" placeholder="Enter Number of laced">
          </div>
          <div class="form-group">
            <label for="laceless" class="col-form-label">laceless:</label>
            <input class="form-control" id="laceless" type="number" name="laceless" value="<?php echo $laceless; ?>" placeholder="Enter Number of laceless">
          </div>
          <div class="form-group">
            <label for="pair" class="col-form-label">Both:</label>
            <input class="form-control" id="pair" type="number" name="pair" value="<?php echo $pair; ?>" placeholder="Enter Number of pair">
          </div>
          <div class="modal-footer">
          <?php
        if ($update==true):
        ?>
        <button type="submit" class="btn btn-dark" name="update">Update</button>

        <?php else: ?>
        <button type="submit" name="submit" class="btn btn-info">Save</button>
        <?php endif; ?>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>

