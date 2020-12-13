<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora Form</title>
</head>
<body>
<?php 
include 'process.php';
?>
    <form action="process.php" method="post">
    <input type="hidden" name="question_number" value="<?php echo $question_number; ?>">
        <label>Survey Question*</label><input type="text" name="survey_question" rows="4" cols="50" value="<?php echo $survey_question; ?>" placeholder="Enter Survey Question"><br>
        <label>Agree*</label><input type="number" name="agreee" value="<?php echo $agree; ?>" placeholder="Enter Number of Agree"><br>
        <label>Disagree*</label><input type="number" name="disagree" value="<?php echo $disagree; ?>" placeholder="Enter Number of Disagree"><br>
        <label>Indifference*</label><input type="number" name="prefer_not_to_say" value="<?php echo $prefer_not_to_say; ?>" placeholder="Enter Number of indifference"><br>
        <?php
        if ($update==true):
        ?>
        <button type="submit" name="update">Update</button> 
     
        <?php else: ?>
        <button type="submit" name="submit">Save</button>
        <?php endif; ?>
    </form>
</body>
</html>

