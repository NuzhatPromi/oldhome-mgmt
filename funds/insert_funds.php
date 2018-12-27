<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $G_ID              = $_POST['ID'];
    $TRANSACTION_ID    = $_POST['TR_ID'];

    if (isset($G_ID) OR isset($TRANSACTION_ID )  )
    {
        ///table funds
        $stmt = "INSERT INTO FUNDS (G_ID,TRANSACTION_ID) 
        VALUES (:G_ID_bv,:TRANSACTION_ID_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':G_ID_bv', $G_ID);
        oci_bind_by_name($s, ':TRANSACTION_ID_bv', $TRANSACTION_ID );


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Funds</h1>';
    $stid = oci_parse($c1, 'SELECT G_ID,TRANSACTION_ID  FROM FUNDS');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>TRANSACTION_ID</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>yuytrertyedf\n";
}
echo "</table>\n";



?>
            



 