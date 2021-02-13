<?php 
include 'db_connect.php';

 //creating a CRUD functionality for the aspora_recognition table
if(isset($_POST['key'])){
    // get the data from jquery and prefill the form with it for editing
    if($_POST['key'] == 'getRecg') {
    $questionId = $_POST['questionId'];
    $query_edit = "SELECT  * FROM aspora_recognition WHERE question_number='$questionId'";
    $edit = mysqli_query($conn, $query_edit) or die(mysqli_error());
        $row = $edit->fetch_array();
        $jsonArray = array(
          'question_number'=> $row['question_number'],
          'survey_question' => $row['survey_question'],
          'agree' => $row['agree'],
          'disagree'=> $row['disagree'],
          'prefer_not_to_say' => $row['prefer_not_to_say']
        );
        exit(json_encode($jsonArray));
  }

    $question_number= $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $agree = $_POST['agree'];
    $disagree = $_POST['disagree'];
    $prefer_not_to_say = $_POST['prefer_not_to_say'];

 
  //insert new data to aspora_recognition table
  if($_POST['key'] == 'addRecg') {
    $query = "INSERT INTO aspora_recognition (question_number, survey_question, agree, disagree, prefer_not_to_say)
    VALUES ('$question_number', '$survey_question', '$agree', '$disagree', '$prefer_not_to_say')";
    $result = mysqli_query($conn, $query);
    if($result){
      //exit('rowAdded');
      echo 'rowAdded';
  }else{
    echo mysqli_error($conn);
    }
    //redirect the user to the mainpage
    header("location: index.php");
  }
   
  //update existing data to aspora_recognition table
  if($_POST['key'] == 'updateRecg') {
    $questionId = $_POST['questionId'];
    $query_update = "UPDATE aspora_recognition SET question_number='$question_number', survey_question='$survey_question', agree='$agree', disagree='$disagree', prefer_not_to_say='$prefer_not_to_say' WHERE question_number='$questionId'";
    $updated = mysqli_query($conn, $query_update) or die(mysqli_error($conn));
    if ($updated) {
        echo "rowUpdated";
    }
    else {
      echo mysqli_error($conn);
    }
    
  }

  //delete data from aspora_recognition table
  if($_POST['key'] == 'deleteRecg') {
    $questionId = $_POST['questionId'];
    $del_query = "DELETE FROM aspora_recognition WHERE question_number='$questionId'";
    $deleted = mysqli_query($conn, $del_query) or die(mysqli_error($conn));
    if($deleted){
      //exit('rowAdded');
      echo 'rowDeleted';
    }else{
     echo mysqli_error($conn);
    }
    header("location: index.php");
    
  }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora Form</title>
</head>
<body>
<div class="modal fade" id="recgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Aspora Recognition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
         <input type="hidden" id="editRecgId" value="0">
          <div class="form-group">
            <label class="col-form-label">Question Number:</label>
            <input type="number" class="form-control" id="question_number" placeholder="Enter Question Number">
          </div>
          <div class="form-group">
            <label  class="col-form-label">Survey Question:</label>
            <textarea class="form-control" id="survey_question" type="text" placeholder="Enter Survey Question"></textarea>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Agree:</label>
            <input class="form-control" id="agree" type="number" placeholder="Enter Number of Agree">
          </div>
          <div class="form-group">
            <label class="col-form-label">Disagree:</label>
            <input class="form-control" id="disagree" type="number" placeholder="Enter Number of Disagree">
          </div>
          <div class="form-group">
            <label class="col-form-label">PreferNotToSay:</label>
            <input class="form-control" id="prefer_not_to_say" type="number" placeholder="Enter Number of indifference">
          </div>
          <input type="hidden" id="editRecgId" value="0">

          <div class="modal-footer">
          <input type="button" onclick=manageData('addRecg') value="Save" id="updateRecg" class="btn btn-info">
  
      </div>
        </form>
      </div>

    </div>
  </div>
</div>

  
</body>
</html>