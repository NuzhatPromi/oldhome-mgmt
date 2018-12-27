<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
   
    $gv_id         = $_POST['gv_id'];
    $gv_designation = $_POST['gv_designation'];
    $gv_name     = $_POST['gv_name'];
    $gv_date        = date('m.d.y', strtotime($_POST['gv_date']));
    $gv_amount        = $_POST['gv_amount'];
   
    
  



    if ( isset($gv_date) OR isset($gv_id) OR isset($gv_designation) OR isset($gv_name) 
        OR isset($gv_amount))
    {
        ///table governing boby
        $stmt = "INSERT INTO GOV_FUND
        (gv_date,gv_id,gv_designation,gv_name,gv_amount)
        VALUES (to_date('" . $gv_date . "','MM/DD/YYYY'),:gv_id_bv,:gv_designation_bv,:gv_name_bv,:gv_amount_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':gv_id_bv', $gv_id);
        oci_bind_by_name($s, ':gv_designation_bv', $gv_designation);
        oci_bind_by_name($s, ':gv_name_bv', $gv_name);
        oci_bind_by_name($s, ':gv_amount_bv', $gv_amount);
        
        
        
        

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1>Government fund</h1>';
    $stid = oci_parse($c1, 'SELECT gv_date,gv_id,gv_designation,gv_name,gv_amount FROM GOV_FUND');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Gv_date</th>';
echo'<th>Gv_id</th>';
echo'<th>Gv_designation</th>';
echo'<th>Gv_name</th>';
echo'<th>Gv_amount</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 