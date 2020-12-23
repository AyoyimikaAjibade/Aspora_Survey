<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspora DataBase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
include "data.php";
include "create_table.php";
include "recognition.php";
//include "laced.php";
//include "experience.php";
//include "shoe_sizes.php";
//include "shoe_prices.php";
//include "product_interest.php";

?>
<?php
if (isset($_SESSION['message'])):
?>

<script>
$('#submit').on('click',function() {
  var alertMsg = '<?php echo $_SESSION['message']; ?>';
    Swal.fire('alertMsg');
})
  
</script>
<?php 
unset($_SESSION['message']);
?>
<?php endif ?>


<div class="container">

<?php

$header1 = array('Question Number','Survey Question', 'Agree', 'Disagree', 'Prefer not to say', 'Action', 'Action');
createTable($header1, $result1, 'Aspora Recognition');

//include "experience_form.php";
createTable($header1, $result2, 'Sports Experience');

$header2 = array('Question Number','Survey Question', 'Laced', 'Laceless', 'Both', 'Action', 'Action');
createTable($header2, $result3, 'Laces/Laceless');

$header4 = array('Question Number','Survey Question', '38-40', '41-43', '44-46', '47 and above', 'Action', 'Action');
createTable($header4, $result4, 'Shoe Sizes(UK Sizes)');


$header5 = array('Question Number','Survey Question', '2,000-5,000', '6,000-10,000', '11,000-15,000', '16,000-20,000', '21,000 or more', 'Action', 'Action');
createTable($header5, $result5, 'Shoe Prices(NGN)');


$header6 = array('Question Number','Survey Question', 'Very Likely', 'Likely', 'Neutral', 'Unlikely', 'Very Unlikely', 'Action', 'Action');
createTable($header6, $result6, 'Product Interest');


mysqli_close($conn);
?>
</div>


</body>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>