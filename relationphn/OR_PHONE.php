<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $OR_id              = $_POST['ORID'];
    $O_rel_phn             = $_POST['Phone'];
    

    if (isset($OR_id) OR isset($O_rel_phn) 
    )
    {
        ///table or_phn
        $stmt = "INSERT INTO OR_PHONE (OR_id,O_rel_phn)
        VALUES (:OR_id_bv,:O_rel_phn_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':OR_id_bv', $OR_id);
        oci_bind_by_name($s, ':O_rel_phn_bv', $O_rel_phn);
        
        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of OR_PHONE</h1>';
    $stid = oci_parse($c1, 'SELECT OR_id,O_rel_phn FROM OR_PHONE');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ORID</th>';
echo'<th>O_rel_phn</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 