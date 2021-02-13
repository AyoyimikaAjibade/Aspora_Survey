<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora DataBase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "recognition.php";
// include "laced.php";
// include "experience.php";
// include "shoe_sizes.php";
// include "shoe_prices.php";
// include "product_interest.php";

?>


<div class="container">

  <div>
    <table class="table table-hover table-dark table-sm table-striped table-bordered" style="margin-top:20px">
      <thead  style="text-align:center">
      <tr>
        <th colspan = "7"> <h2  style="text-align:center" id="recg_head" data-toggle="modal" data-target="#recgModal">Aspora Recognition</h2></th>
        </tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>Agree</th>
          <th>Disagree</th>
          <th>Prefer not to Say</th>
          <th>Actions</th>
          <th>Actions</th>
      </thead>
      
          <?php
          include 'db_connect.php';
      $query1 = "SELECT * FROM aspora_recognition";
      $result1 = mysqli_query($conn, $query1);
      if ($result1->num_rows > 0) {
        /* output data of each row */
        while($row1 = $result1->fetch_assoc()) {
          ?>
           <tr style="text-align:center"> 
              <td id="question_<?php echo $row1['question_number'] ?>"><?php echo $row1['question_number'] ?></td>
              <td><?php echo $row1['survey_question'] ?></td>
              <td><?php echo $row1['agree'] ?></td>
              <td><?php echo $row1['disagree'] ?></td>
              <td><?php echo $row1['prefer_not_to_say'] ?></td> 
              <td><input type="button" class="btn btn-outline-info btn-sm" onclick=editRecg(<?php echo $row1['question_number']; ?>) value="Edit"></td>  
              <td><input type="button" class="btn btn-outline-danger btn-sm" onclick=deleteRecg(<?php echo $row1['question_number']; ?>) value="Delete"></td>
            </tr>
           <?php
        }
     } else {
        //FALLBACK CONTENT
        echo "<tr> <td> No Inputs Yet</td> <td> No Inputs Yet</td> <td> No Inputs Yet</td> <td> No Inputs Yet</td> <td> No Inputs Yet</td> <td> No Inputs Yet</td> </tr>";
     }
      ?>
         
            
      
         
  
    </table>
  </div>
</div>
  <script src="jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type='text/javascript' src='process.js'></script>
</body>
</html>