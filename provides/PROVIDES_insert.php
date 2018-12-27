<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
   
    $TRANSACTION_ID = $_POST['TRANSACTION_ID'];
    $gv_id     = $_POST['gv_id'];

    if ( isset($TRANSACTION_ID) OR isset($gv_id))
    {
        ///table governing boby
        $stmt = "INSERT INTO  PROVIDES
        (TRANSACTION_ID,gv_id)
        VALUES (:TRANSACTION_ID_bv,:gv_id_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':TRANSACTION_ID_bv', $TRANSACTION_ID);
        oci_bind_by_name($s, ':gv_id_bv', $gv_id);
        
        

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1>Table For  PROVIDES</h1>';
    $stid = oci_parse($c1, 'SELECT TRANSACTION_ID,gv_id FROM  PROVIDES');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>TRANSACTION_ID</th>';
echo'<th>gv_id</th>';


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 