
<?php

  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');


$TYPE1= $_POST['Type'];
$COST1= $_POST['Cost'];
 $MDATE1 = date('m.d.y', strtotime($_POST['BD']));

 
$stmt= "INSERT INTO MAINTAINCE(TYPE,COST,MDATE) VALUES (:TYPE_bv,:COST_bv,to_date('" . $MDATE1 . "','MM/DD/YYYY'))";
 $s=oci_parse($c1, $stmt);


 
oci_bind_by_name($s, "TYPE_bv", $TYPE1);
oci_bind_by_name($s, "COST_bv", $COST1);

 oci_execute($s);
 echo "inserted<br>\n";

        echo ' <h1> Table of Maintaince</h1>';
    $stid = oci_parse($c1, 'SELECT TYPE,COST,MDATE FROM MAINTAINCE');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Type</th>';
echo'<th>Cost</th>';
echo'<th>Date</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>



	

