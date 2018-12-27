
<?php

  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');



$G_ID= $_POST['G_ID'];
$phoneno= $_POST['phnno'];

 
$stmt= "INSERT INTO G_PHONE_NUMBER(G_ID,PHONE_NUMBER) VALUES (:G_ID_bv,:PHONE_NUMBER_bv)";
 $s=oci_parse($c1, $stmt);


 
oci_bind_by_name($s, "G_ID_bv", $G_ID);
oci_bind_by_name($s, "PHONE_NUMBER_bv", $phoneno);


     oci_execute($s);
     echo "Phone Number<br>\n";


 
 $stid = oci_parse($c1, 'SELECT G_ID,PHONE_NUMBER FROM G_PHONE_NUMBER');
        oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>Phone number</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
?>



	

