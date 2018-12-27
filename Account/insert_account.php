<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $TRANSACTION_ID         = $_POST['TR_ID'];
    $TRANSACTION_TYPE       = $_POST['TR_TYPE'];
    $ACC_AMOUNT             = $_POST['ACC_AM'];
    $ACC_DATE              = date('m.d.y', strtotime($_POST['ACC_D']));


    if (isset($TRANSACTION_ID) OR isset($TRANSACTION_TYPE) OR isset($ACC_AMOUNT) OR isset($ACC_DATE) )
    {
        ///table account
        $stmt = "INSERT INTO ACCOUNT (TRANSACTION_ID, TRANSACTION_TYPE, ACC_AMOUNT, ACC_DATE)
        VALUES (:TRANSACTION_ID_bv,:TRANSACTION_TYPE_bv,:ACC_AMOUNT_bv,to_date('" . $ACC_DATE . "','MM/DD/YYYY'))";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':TRANSACTION_ID_bv', $TRANSACTION_ID);
        oci_bind_by_name($s, ':TRANSACTION_TYPE_bv', $TRANSACTION_TYPE);
        oci_bind_by_name($s, ':ACC_AMOUNT_bv', $ACC_AMOUNT);


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Account</h1>';
    $stid = oci_parse($c1, 'SELECT TRANSACTION_ID,TRANSACTION_TYPE,ACC_AMOUNT,ACC_DATE FROM ACCOUNT');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>TRANSACTION_ID</th>';
echo'<th>TRANSACTION_TYPE</th>';
echo'<th>ACC_AMOUNT</th>';
echo'<th>ACC_DATE</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>yuytrertyedf\n";
}
echo "</table>\n";



?>
            