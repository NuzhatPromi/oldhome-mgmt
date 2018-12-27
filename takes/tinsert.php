
<?php

  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');


  

$O_id= $_POST['ID'];
$O_quantity= $_POST['medicine_quantity'];
 $med_name = $_POST['Name'];

 
$stmt= "INSERT INTO TAKES (O_id,O_quantity,med_name ) VALUES (:O_id_bv,:O_quantity_bv,:med_name_bv)";
 $s=oci_parse($c1, $stmt);


 
oci_bind_by_name($s, "O_id_bv", $O_id);
oci_bind_by_name($s, "O_quantity_bv", $O_quantity);
oci_bind_by_name($s, "med_name_bv", $med_name);



echo "inserted<br>\n";

        echo ' <h1> Table of Takes</h1>';
    $stid = oci_parse($c1, 'SELECT O_id,O_quantity,med_name FROM TAKES');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>O_id</th>';
echo'<th>Quantity</th>';
echo'<th>Medicine name</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

 


         oci_execute($s);
       // echo "inserted<br>\n";
?>



	

