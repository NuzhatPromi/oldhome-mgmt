<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $med_name            = $_POST['Name'];
    $med_quantity        = $_POST['Quantity'];
    $med_cost         = $_POST['Cost'];
    $med_date            = date('m.d.y', strtotime($_POST['BD']));
    
   

    if (isset($med_name ) OR isset($med_quantity ) OR isset($med_cost ) )
    {
      
        $stmt = "INSERT INTO medicine (med_name,med_quantity ,med_cost,med_date)
        VALUES (:med_name_bv,:med_quantity_bv,:med_cost_bv,to_date('" . $med_date  . "','MM/DD/YYYY'))";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':med_name_bv',  $med_name );
        oci_bind_by_name($s, ':med_quantity_bv', $med_quantity );
        oci_bind_by_name($s, ':med_cost_bv', $med_cost );
       


        oci_execute($s);
       
    }

     else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Medicine</h1>';
    $stid = oci_parse($c1, 'SELECT med_name,med_quantity ,med_cost,med_date FROM medicine');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Medicine Name</th>';
echo'<th>Quantity</th>';
echo'<th>cost</th>';
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
            



 