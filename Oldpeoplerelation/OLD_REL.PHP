<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $OR_id              = $_POST['OR_ID'];
    $OR_NID             = $_POST['OR_NID'];
    $OR_name            = $_POST['Name'];
    $O_rel_add         = $_POST['Address'];
    $O_rel_email       = $_POST['Email'];
    $OR_blood_grp   = $_POST['blood_group'];
    $O_relation     = $_POST['Relation'];
    $Ammount       = $_POST['Ammount'];
    

    if (isset($OR_id) OR isset($OR_NID) OR isset($OR_name) OR isset($O_rel_add) OR isset($O_rel_email)
        OR isset($OR_blood_grp) OR isset($O_relation) OR isset($Ammount)
    )
    {
      
        $stmt = "INSERT INTO OldPeopleRelative (OR_id,OR_NID,OR_name,O_rel_add,O_rel_email,OR_blood_grp,O_relation,Ammount)  
        VALUES (:OR_id_bv,:OR_NID_bv,:OR_name_bv,:O_rel_add_bv,:O_rel_email_bv,
        :OR_blood_grp_bv,:O_relation_bv,:Ammount_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':OR_id_bv', $OR_id);
        oci_bind_by_name($s, ':OR_NID_bv', $OR_NID);
        oci_bind_by_name($s, ':OR_name_bv', $OR_name);
        oci_bind_by_name($s, ':O_rel_add_bv', $O_rel_add);
        oci_bind_by_name($s, ':O_rel_email_bv', $O_rel_email);
        oci_bind_by_name($s, ':OR_blood_grp_bv', $OR_blood_grp);
        oci_bind_by_name($s, ':O_relation_bv', $O_relation);
        oci_bind_by_name($s, ':Ammount_bv', $Ammount);
        


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of OldPeopleRelative<h1>';
    $stid = oci_parse($c1, 'SELECT OR_id,OR_NID,OR_name,O_rel_add,O_rel_email,OR_blood_grp,O_relation,Ammount FROM OldPeopleRelative');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>OR_ID</th>';
echo'<th>OR_NID</th>';
echo'<th>Name</th>';
echo'<th>Address</th>';
echo'<th>Email</th>';
echo'<th>blood_group</th>';
echo'<th>Relation</th>';
echo'<th>Ammount</th>';


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 