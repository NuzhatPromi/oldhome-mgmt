<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $d_id           = $_POST['ID'];
    $d_phone        = $_POST['Phone No'];
 
    if (isset($d_id) OR isset($d_phone) )
    {
      
        $stmt = "INSERT INTO donarphonenum (d_id,d_phone)
        VALUES (:d_id_bv,:d_phone_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':d_id_bv', $d_id);
        oci_bind_by_name($s, ':d_phone_bv', $d_phone);
      

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of donar phone number</h1>';
    $stid = oci_parse($c1, 'SELECT d_id,d_phone FROM donarphonenum');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>Phone Number</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 