<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
   
    $doc_id            = $_POST['doc_id'];
    $doc_mobile     = $_POST['doc_mobile'];

    if ( isset($doc_id) OR isset($doc_mobile))
    {
        ///table governing boby
        $stmt = "INSERT INTO DOCONTACT
        (doc_id,doc_mobile)
        VALUES (:doc_id_bv,:doc_mobile_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':doc_id_bv', $doc_id);
        oci_bind_by_name($s, ':doc_mobile_bv', $doc_mobile);
        
        

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1>Table For DOCTOR_Contact</h1>';
    $stid = oci_parse($c1, 'SELECT doc_id,doc_mobile FROM DOCONTACT');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Doc_id</th>';
echo'<th>Doc_mobile</th>';


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 