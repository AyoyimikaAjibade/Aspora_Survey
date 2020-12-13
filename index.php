<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora DataBase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "data_form.php";
include "data.php";
include "create_table.php";
?>

    <?php
        $header1 = array('Question Number','Survey Question', 'Agree', 'Disagree', 'Prefer not to say', 'Action', 'Action');
        createTable($header1, $result1, 'Aspora Recognition');
    
        $header2 = array('Question Number','Survey Question', 'Laced', 'Laceless', 'Both', 'Action', 'Action');
        createTable($header2, $result3, 'Laces/Laceless');

        $header6 = array('Question Number','Survey Question', 'Very Likely', 'Likely', 'Neutral', 'Unlikely', 'Very Unlikely', 'Action', 'Action');
        createTable($header6, $result6, 'Product Interest');

        $header5 = array('Question Number','Survey Question', '2,000-5,000', '6,000-10,000', '11,000-15,000', '16,000-20,000', '21,000 or more', 'Action', 'Action');
        createTable($header5, $result5, 'Shoe Prices(NGN)');

        $header4 = array('Question Number','Survey Question', '38-40', '41-43', '44-46', '47 and above', 'Action', 'Action');
        createTable($header5, $result4, 'Shoe Sizes(UK Sizes)');

        createTable($header1, $result2, 'Sports Experience');

        mysqli_close($conn);
    ?>


<!--     <table align="center" border="1px">
        <thead>
            <th colspan="7"><h2>Aspora Recognition</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>Agree</th>
          <th>Disagree</th>
          <th>Prefer Not To Say</th>
          <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        include "create_table.php";

        while($row = mysqli_fetch_array($result1)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['yes'];?></td>
                <td><?=$row['negative'];?></td>
                <td><?=$row['prefer_not_to_say'];?></td>
                <td><a href="index.php?edit=<?=$row['question_number'];?>">Edit</a></td>
                <td><a href="process.php?delete=<?=$row['question_number'];?>">Delete</a></td>
            </tr>
            <?php
             } 
            //close connection database
       
       
            ?>
         </tbody>
    </table>
    <br>
    <br>
    <table align="center" border="1px">
        <thead>
            <th colspan="5"><h2>Sports Experience</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>Yes</th>
          <th>Negative</th>
          <th>Prefer Not To Say</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        while($row = mysqli_fetch_array($result2)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['yes'];?></td>
                <td><?=$row['negative'];?></td>
                <td><?=$row['prefer_not_to_say'];?></td>
            </tr>
            <?php
             } 
            //close connection database
            mysqli_close($conn);
       
            ?>
         </tbody>
    </table>
    <br>
    <br>
    <table align="center" border="1px">
        <thead>
            <th colspan="5"><h2>laces/laceless</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>Laced</th>
          <th>Laceless</th>
          <th>Both</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        while($row = mysqli_fetch_array($result3)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['laced'];?></td>
                <td><?=$row['laceless'];?></td>
                <td><?=$row['both'];?></td>
            </tr>
            <?php
             } 
            //close connection database
            mysqli_close($conn);
       
            ?>
         </tbody>
    </table>
    <br>
    <br>
    <table align="center" border="1px">
        <thead>
            <th colspan="6"><h2>Shoe Sizes(UK Sizes)</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>38-40</th>
          <th>41-43</th>
          <th>44-46</th>
          <th>47 and above</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        while($row = mysqli_fetch_array($result4)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['38-40'];?></td>
                <td><?=$row['41-43'];?></td>
                <td><?=$row['44-46'];?></td>
                <td><?=$row['47_and_above'];?></td>
            </tr>
            <?php
             } 
            //close connection database
            mysqli_close($conn);
       
            ?>
         </tbody>
    </table>
    <br>
    <br>
    <table align="center" border="1px">
        <thead>
            <th colspan="7"><h2>Shoe Prices (NGN)</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>2,000-5,000</th>
          <th>6,000-10,000</th>
          <th>11,000-15,000</th>
          <th>16,000-20,000</th>
          <th>21,000 or more</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        while($row = mysqli_fetch_array($result5)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['2,000_5,000'];?></td>
                <td><?=$row['6,000_10,000'];?></td>
                <td><?=$row['11,000_15,000'];?></td>
                <td><?=$row['16,000_20,000'];?></td>
                <td><?=$row['21,000_or_more'];?></td>
            </tr>
            <?php
             } 
            //close connection database
            mysqli_close($conn);
       
            ?>
         </tbody>
    </table>
    <br>
    <br>
    <table align="center" border="1px">
        <thead>
            <th colspan="7"><h2>Product Interest</h2></th>
        <tr>
          <th>Question Number</th>
          <th>Survey Question</th>
          <th>Very Likely</th>
          <th>Likely</th>
          <th>Neutral</th>
          <th>Unlikely</th>
          <th>Very Unlikely</th>
        </tr>
        </thead>
        <tbody>
            <?php
        include "data.php";
        while($row = mysqli_fetch_array($result6)) {
            ?>
            <tr>
                <td><?=$row['question_number'];?></td>
                <td><?=$row['survey_question'];?></td>
                <td><?=$row['very_likely'];?></td>
                <td><?=$row['likely'];?></td>
                <td><?=$row['neutral'];?></td>
                <td><?=$row['unlikely'];?></td>
                <td><?=$row['very_unlikely'];?></td>
            </tr>
            <?php
             } 
            //close connection database
            mysqli_close($conn);
       
            ?>
         </tbody>
    </table> -->
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>