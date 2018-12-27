<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{   
      $med_name            = $_POST['Name'];
     $transaction_id      = $_POST['ID'];
    
 
    if ( isset($med_name) OR isset($transaction_id)  )
    {
      
        $stmt = "INSERT INTO  spends (med_name,transaction_id)
        VALUES (:med_name_bv,:transaction_id_bv)";
        $s    = oci_parse($c1, $stmt);


       
         oci_bind_by_name($s, ':med_name_bv', $med_name);
        oci_bind_by_name($s, ':transaction_id_bv', $transaction_id);
        
      

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of spends</h1>';
    $stid = oci_parse($c1, 'SELECT med_name,transaction_id FROM spends');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Medicine name</th>';
echo'<th>Transaction ID</th>';





while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 