<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $EMP_ID           = $_POST['ID'];
    $PHONE_NO         = $_POST['Phn'];


    if (isset($EMP_ID)  or isset($PHONE_NO) )
    {
        ///table EMP_PHONE
        $stmt = "INSERT INTO EMP_PHONE (EMP_ID, PHONE_NO) 
        VALUES (:EMP_ID_bv,:PHONE_NO_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':EMP_ID_bv', $EMP_ID);
        oci_bind_by_name($s, ':PHONE_NO_bv', $PHONE_NO);
        


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Employee Phone No</h1>';
    $stid = oci_parse($c1, 'SELECT EMP_ID,PHONE_NO FROM EMP_PHONE');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>Phone No</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>yuytrertyedf\n";
}
echo "</table>\n";



?>