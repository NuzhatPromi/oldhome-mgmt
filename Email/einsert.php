
<?php

  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');



$G_ID= $_POST['G_ID'];
$email= $_POST['eno'];

 
$stmt= "INSERT INTO G_EMAIL_ADDRESS(G_ID,EMAIL) VALUES (:G_ID_bv,:EMAIL_bv)";
 $s=oci_parse($c1, $stmt);


 
oci_bind_by_name($s, "G_ID_bv", $G_ID);
oci_bind_by_name($s, "EMAIL_bv", $email);


     oci_execute($s);
     echo "Email Number<br>\n";


 
 $stid = oci_parse($c1, 'SELECT G_ID,EMAIL FROM G_EMAIL_ADDRESS');
        oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>Email Address</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
?>



	

