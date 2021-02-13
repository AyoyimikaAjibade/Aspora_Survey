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
$agree= ''; 
$disagree = '';
$prefer_not_to_say = '';
$update = false;
$question_number = null;

//creating a CRUD functionality for the aspora_recognition table
//insert new data to aspora_recognition table
if(isset($_POST['submit'])) {
    $question_number= $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $agree = $_POST['agree'];
    $disagree = $_POST['disagree'];
    $prefer_not_to_say = $_POST['prefer_not_to_say'];
    
    if(!empty($survey_question) && !empty($agree) && !empty($disagree) && !empty($prefer_not_to_say)){
            
    $query = "INSERT INTO aspora_recognition (question_number, survey_question, agree, disagree, prefer_not_to_say)
    VALUES ('$question_number', '$survey_question', '$agree', '$disagree', '$prefer_not_to_say')";
    
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

//edit data from aspora_recognition table
if (isset($_GET['edit'])){ //if edit link is clicked
    $question_number = $_GET['edit'];
    $update = true;
    $query_edit = "SELECT  * FROM aspora_recognition WHERE question_number=$question_number";
    $edit = mysqli_query($conn, $query_edit) or die(mysqli_error());
    //if (count($edit)==1){ //if record exist
    $row = $edit->fetch_array();
   /*  foreach($row as $key => $value){
        //echo('key==>',$key);
    } */
    $survey_question = $row['survey_question'];
    $agree = $row['agree'];
    $disagree= $row['disagree'];
    $prefer_not_to_say = $row['prefer_not_to_say'];

}

//update data from aspora_recognition table
if (isset($_POST['update'])){
    $question_number = $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $agree = $_POST['agree'];
    $disagree = $_POST['disagree'];
    $prefer_not_to_say = $_POST['prefer_not_to_say'];
    $query_update = "UPDATE aspora_recognition SET survey_question='$survey_question', 
    agree='$agree', disagree='$disagree', prefer_not_to_say='$prefer_not_to_say'  
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
  $del_query = "DELETE FROM shoe_prices WHERE question_number=$question_number";
  $deleted = mysqli_query($conn, $del_query) or die(mysqli_error($conn));

  $_SESSION['message'] = "Record has been successfully deleted!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");
}
?>

    <!--Modal
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Insert</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aspora Recognition</h5>
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
            <label for="agree" class="col-form-label">Agree:</label>
            <input class="form-control" id="agree" type="number" name="agree" value="<?php echo $agree; ?>" placeholder="Enter Number of Agree">
          </div>
          <div class="form-group">
            <label for="disagree" class="col-form-label">Disagree:</label>
            <input class="form-control" id="disagree" type="number" name="disagree" value="<?php echo $disagree; ?>" placeholder="Enter Number of Disagree">
          </div>
          <div class="form-group">
            <label for="prefer_not_to_say" class="col-form-label">Indifference:</label>
            <input class="form-control" id="prefer_not_to_say" type="number" name="prefer_not_to_say" value="<?php echo $prefer_not_to_say; ?>" placeholder="Enter Number of indifference">
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