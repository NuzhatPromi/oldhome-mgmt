<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $G_ID              = $_POST['ID'];
    $G_NID             = $_POST['NID'];
    $G_NAME            = $_POST['Name'];
    $G_DOB             = date('m.d.y', strtotime($_POST['BD']));
    $OCUPATION         = $_POST['OCUPATION'];
    $EDUCATION         = $_POST['EDUCATION'];
    $PERSENT_ADDRESS   = $_POST['PAddress'];
    $PERMANENT_ADDRESS = $_POST['Address'];
    $BLOOD_GROUP       = $_POST['Blood_group'];
    $JOINING_DATE      = date('m.d.y', strtotime($_POST['Day']));
    $EXPERIENCE        = $_POST['EXPERIENCE'];

    if (isset($G_ID) OR isset($G_NID) OR isset($G_NAME) OR isset($G_DOB) OR isset($OCUPATION)
        OR isset($EDUCATION) OR
        isset($PERSENT_ADDRESS) OR isset($PERMANENT)
    )
    {
        ///table governing boby
        $stmt = "INSERT INTO GOVERNING_BODY
        (G_ID,G_NID,G_NAME,G_DOB,OCUPATION,EDUCATION,PERSENT_ADDRESS,PERMANENT_ADDRESS
        ,BLOOD_GROUP,JOINING_DATE ,EXPERIENCE) 
        VALUES (:G_ID_bv,:G_NID_bv,:G_NAME_bv,to_date('" . $G_DOB . "','MM/DD/YYYY')
        ,:OCUPATION_bv,:EDUCATION_bv,
        :PERSENT_ADDRESS_bv,:PERMANENT_ADDRESS_bv,:BLOOD_GROUP_bv
        ,to_date('" . $JOINING_DATE . "','MM/DD/YYYY'),:EXPERIENCE_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':G_ID_bv', $G_ID);
        oci_bind_by_name($s, ':G_NID_bv', $G_NID);
        oci_bind_by_name($s, ':G_NAME_bv', $G_NAME);
        oci_bind_by_name($s, ':OCUPATION_bv', $OCUPATION);
        oci_bind_by_name($s, ':EDUCATION_bv', $EDUCATION);
        oci_bind_by_name($s, ':PERSENT_ADDRESS_bv', $PERSENT_ADDRESS);
        oci_bind_by_name($s, ':PERMANENT_ADDRESS_bv', $PERMANENT_ADDRESS);
        oci_bind_by_name($s, ':BLOOD_GROUP_bv', $BLOOD_GROUP);
        oci_bind_by_name($s, ':EXPERIENCE_bv', $EXPERIENCE);


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Governing boby</h1>';
    $stid = oci_parse($c1, 'SELECT G_ID,G_NID,G_NAME,G_DOB,OCUPATION,EDUCATION,PERSENT_ADDRESS,PERMANENT_ADDRESS
        ,BLOOD_GROUP,JOINING_DATE ,EXPERIENCE FROM GOVERNING_BODY');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>ID</th>';
echo'<th>National ID</th>';
echo'<th>Date of birth</th>';
echo'<th>Name</th>';
echo'<th>OCUPATION</th>';
echo'<th>EDUCATION</th>';
echo'<th>PERSENT_ADDRESS</th>';
echo'<th>PERMANENT_ADDRESS</th>';
echo'<th>BLOOD_GROUP</th>';
echo'<th>JOINING_DATE</th>';
echo'<th>EXPERIENCE </th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 