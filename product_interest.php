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
$very_likely= ''; 
$likely = '';
$neutral = '';
$unlikely = '';
$very_unlikely= ''; 
$update = false;
$question_number = null;

//creating a CRUD functionality for the product_interest table
//insert new data to product_interest table
if(isset($_POST['submit'])) {
    $question_number= $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $very_likely = $_POST['very_likely'];
    $likely = $_POST['likely'];
    $neutral = $_POST['neutral'];
    $unlikely = $_POST['unlikely'];
    $very_unlikely = $_POST['very_unlikely'];
    
    
    if(!empty($survey_question) && !empty($very_likely) && !empty($likely) && !empty($neutral) && !empty($unlikely) && !empty($very_unlikely)){
            
    $query = "INSERT INTO product_interest (question_number, survey_question, very_likely, likely, neutral, unlikely, very_unlikely)
    VALUES ('$question_number', '$survey_question', '$very_likely', '$likely', '$neutral', '$unlikely', '$very_unlikely')";
    
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

//edit data from product_interest table
if (isset($_GET['edit'])){ //if edit link is clicked
    $question_number = $_GET['edit'];
    $update = true;
    $query_edit = "SELECT  * FROM product_interest WHERE question_number=$question_number";
    $edit = mysqli_query($conn, $query_edit) or die(mysqli_error());
    //if (count($edit)==1){ //if record exist
    $row = $edit->fetch_array();
   /*  foreach($row as $key => $value){
        //echo('key==>',$key);
    } */
    $survey_question = $row['survey_question'];
    $very_likely = $row['very_likely'];
    $likely = $row['likely'];
    $neutral = $row['neutral'];
    $unlikely = $row['unlikely'];
    $very_unlikely = $row['very_unlikely'];

}

//update data from product_interest table
if (isset($_POST['update'])){
    $question_number = $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $very_likely = $_POST['very_likely'];
    $likely = $_POST['likely'];
    $neutral = $_POST['neutral'];
    $unlikely = $_POST['unlikely'];
    $very_unlikely = $_POST['very_unlikely'];
    $query_update = "UPDATE product_interest SET survey_question='$survey_question', 
    very_likely='$very_likely', likely='$likely', neutral='$neutral', unlikely='$unlikely', very_unlikely='$very_unlikely'  
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
  $del_query = "DELETE FROM product_interest WHERE question_number=$question_number";
  $deleted = mysqli_query($conn, $del_query) or die(mysqli_error($conn));

  $_SESSION['message'] = "Record has been successfully deleted!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");
}
?>

    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo">Insert</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Interest</h5>
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
            <label for="very_likely" class="col-form-label">Very Likely:</label>
            <input class="form-control" id="very_likely" type="number" name="very_likely" value="<?php echo $very_likely; ?>" placeholder="Enter Number of Very Unlikely">
          </div>
          <div class="form-group">
            <label for="likely" class="col-form-label">Likely:</label>
            <input class="form-control" id="likely" type="number" name="likely" value="<?php echo $likely; ?>" placeholder="Enter Number of Likely">
          </div>
          <div class="form-group">
            <label for="neutral" class="col-form-label">Neutral:</label>
            <input class="form-control" id="neutral" type="number" name="neutral" value="<?php echo $neutral; ?>" placeholder="Enter Number of Neutral">
          </div>
          <div class="form-group">
            <label for="unlikely" class="col-form-label">Unlikely:</label>
            <input class="form-control" id="unlikely" type="number" name="unlikely" value="<?php echo $unlikely; ?>" placeholder="Enter Number of Unlikely">
          </div>
          <div class="form-group">
            <label for="very_unlikely" class="col-form-label">Very Unlikely:</label>
            <input class="form-control" id="very_unlikely" type="number" name="very_unlikely" value="<?php echo $very_unlikely; ?>" placeholder="Enter Number of Very Unlikely">
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