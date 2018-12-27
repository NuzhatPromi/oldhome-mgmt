<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $OR_id              = $_POST['RID'];
    $O_id             = $_POST['OID'];
    $O_relation         = $_POST['Relation'];
    

    if (isset($OR_id) OR isset($O_id) OR isset($O_relation) )
    {
        ///table relates
        $stmt = "INSERT INTO RELATES (OR_id,O_id,O_relation)
        VALUES (:OR_id_bv,:O_id_bv,:O_relation_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':OR_id_bv', $OR_id);
        oci_bind_by_name($s, ':O_id_bv', $O_id);
        oci_bind_by_name($s, ':O_relation_bv', $O_relation);
      
        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of RELATES</h1>';
    $stid = oci_parse($c1, 'SELECT OR_id,O_id,O_relation FROM RELATES');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Relative ID</th>';
echo'<th>Old people ID</th>';
echo'<th>Relation</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 