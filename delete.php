<?php
include 'db_connect.php';

$survey_question = '';
$agree= ''; 
$disagree = '';
$prefer_not_to_say = '';
$update = false;
$question_number = 0;
$laced = '';
$laceless = '';
$both = '';

//session_start();
//delete data from table
function deleteTable($conn_del, $table_name){
    if (isset($_GET['delete'])){
        $question_number = $_GET['delete'];
        $del_query = "DELETE FROM $table_name WHERE question_number=$question_number";
        $deleted = mysqli_query($conn_del, $del_query) or die(mysqli_error($conn_del));

        $_SESSION['message'] = "Record has been successfully deleted!";
        $_SESSION['msg_type'] = "success";
      
        header("location: index.php");
    }
}
deleteTable($conn, 'aspora_recognition');
deleteTable($conn, 'laces_laceless');
deleteTable($conn, 'product_interest');
deleteTable($conn, 'shoe_prices');
deleteTable($conn, 'shoe_sizes');
deleteTable($conn, 'sports_experience');
?> 