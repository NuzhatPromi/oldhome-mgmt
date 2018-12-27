<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $EMP_ID              = $_POST['ID'];
    $EVENT_DATE          = date('m.d.y', strtotime($_POST['EVE_D']));
    
    if (isset($EMP_ID ) OR isset($EVENT_DATE) )
    {
        ///table organizes
        $stmt = "INSERT INTO ORGANIZES (EMP_ID ,EVENT_DATE ) 
        VALUES (:EMP_ID_bv,to_date('" . $EVENT_DATE . "','MM/DD/YYYY'))";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':EMP_ID_bv', $EMP_ID );
        


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Organizes</h1>';
    $stid = oci_parse($c1, 'SELECT EMP_ID ,EVENT_DATE  FROM ORGANIZES');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>EMP_ID</th>';
echo'<th>Event Date</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>yuytrertyedf\n";
}
echo "</table>\n";



?>
            