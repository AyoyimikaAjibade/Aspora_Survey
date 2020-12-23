<?php

function createTable($headers, $result, $table_name) {
    
?> <table class="table table-hover table-dark table-sm table-striped table-bordered" style="margin-top:20px">
    <thead>
    <th colspan = "9">
        <h2  style="text-align:center"><?php echo $table_name ?>
        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Insert</button>
    </h2>
        
    </th>
<tr>
    
    <?php foreach($headers as $value){?>
        <th style="text-align:center"><?php echo $value ?> </th>
    <?php } ?>
</tr>
</thead>
    <?php while($row = mysqli_fetch_assoc($result)) {
        ?> <tbody>
           <tr>
                <?php foreach($row as $key => $value){ ?>
                    <td style="text-align:center"><?php echo $value ?></td>
             <?php   } ?>
                <td style="text-align:center"><a href='index.php?edit=<?php echo $row['question_number']; ?> ' ><button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</button></a></td>
                <td style="text-align:center"><a href='delete.php?delete=<?php echo $row['question_number']; ?> '><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a></td>
          </tr>
          </tbody>

   <?php } ?>
    
</table>


<?php }
?>