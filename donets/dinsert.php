<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{   
     $transaction_id  = $_POST['Transaction_ID'];
     $d_id            = $_POST['Donar_ID'];
 
    if ( isset($transaction_id) OR isset($d_id)  )
    {
      
        $stmt = "INSERT INTO donates (transaction_id,d_id)
        VALUES (:transaction_id_bv,:d_id_bv)";
        $s    = oci_parse($c1, $stmt);


       
        oci_bind_by_name($s, ':transaction_id_bv', $transaction_id);
         oci_bind_by_name($s, ':d_id_bv', $d_id);
      

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of donates</h1>';
    $stid = oci_parse($c1, 'SELECT transaction_id,d_id FROM donates');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Transaction ID</th>';
echo'<th>Donar ID</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 