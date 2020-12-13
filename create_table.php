<?php
function createTable($headers, $result, $table_name) {
    echo"<table>";
    echo "<thead>
    <th><h2>".$table_name."</h2></th>
<tr> ";
    foreach($headers as $value){
        echo"<th>".$value."</th>";
    }
echo "</tr>
</thead>";
    while($row = mysqli_fetch_assoc($result)) {
        echo"<tbody>";
           echo" <tr>";
                foreach($row as $value){
    
                    echo"<td>".$value."</td>";
                }
                echo"<td><a href='index.php?edit=".$row['question_number']."'>Edit</a></td>";
                echo"<td><a href='process.php?delete=".$row['question_number']."'>Delete</a></td>";
          echo "</tr>";
          echo "</tbody>";

    } 
    
echo "</table>";

}
?>