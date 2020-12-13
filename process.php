<?php
include 'db_connect.php';

$survey_question = '';
$agree= ''; 
$disagree = '';
$prefer_not_to_say = '';
$update = false;
$question_number = 0;

//insert new data to table
/* function insertTable(){

} */
if(isset($_POST['submit'])) {
    $survey_question = $_POST['survey_question'];
    $agree = $_POST['agree'];
    $disagree = $_POST['disagree'];
    $prefer_not_to_say = $_POST['prefer_not_to_say'];

    if(!empty($survey_question) && !empty($agree) && !empty($disagree) && !empty($prefer_not_to_say)){
        
    $query = "INSERT INTO aspora_recognition(survey_question, agree, disagree, prefer_not_to_say)
    VALUES ('$survey_question', '$agree', '$disagree', '$prefer_not_to_say')";

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

//delete data from table
function deleteTable($conn_del, $table_name){
    if (isset($_GET['delete'])){
        $question_number = $_GET['delete'];
        $del_query = "DELETE FROM $table_name WHERE question_number=$question_number";
        $deleted = mysqli_query($conn_del, $del_query) or die(mysqli_error($conn_del));
        if ($deleted) {
            echo "Data successfully deleted!";
        }
        else {
            echo "Data not successfully deleted!";
        }
      
        header("location: index.php");
    }
}

deleteTable($conn, 'aspora_recognition');
deleteTable($conn, 'laces_laceless');
deleteTable($conn, 'product_interest');
deleteTable($conn, 'shoe_prices');
deleteTable($conn, 'shoe_sizes');
deleteTable($conn, 'sports_experience');

//edit data from table

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


//update data from table

if (isset($_POST['update'])){
    $question_number = $_POST['question_number'];
    $survey_question = $_POST['survey_question'];
    $agree = $_POST['agree'];
    $disagree = $_POST['$disagree'];
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
?>