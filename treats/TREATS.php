<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $O_id              = $_POST['OID'];
    $doc_id             = $_POST['DOCID'];
    $T_date             = date('m.d.y', strtotime($_POST['BD']));
    $T_fee         = $_POST['FEE'];
    

    if (isset($O_id) OR isset($doc_id) OR isset($T_date) OR isset($T_fee) 
    )
    {
        ///table TREATS
        $stmt = "INSERT INTO TREATS (O_id,doc_id,T_date,T_fee) 
        VALUES (:O_id_bv,:doc_id_bv,to_date('" . $T_date . "','MM/DD/YYYY')
        ,:T_fee_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':O_id_bv', $O_id);
        oci_bind_by_name($s, ':doc_id_bv', $doc_id);
        oci_bind_by_name($s, ':T_fee_bv', $T_fee);
        
        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of TREATS</h1>';
    $stid = oci_parse($c1, 'SELECT O_id,doc_id,T_date,T_fee FROM TREATS');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>O ID</th>';
echo'<th>DOC ID</th>';
echo'<th>TREATMENT DATE</th>';
echo'<th>TREATMENT FEE</th>';


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 