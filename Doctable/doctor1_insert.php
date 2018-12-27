<?php


$c1 = oci_connect("shailabaek", "shaila", 'localhost/XE');

if (isset($_POST['ok']))
{
    $doc_name          = $_POST['doc_name'];
    $doc_id            = $_POST['doc_id'];
    $doc_blood_grp     = $_POST['doc_blood_grp'];
    $doc_dob           = date('m.d.y', strtotime($_POST['doc_dob']));
    $doc_email         = $_POST['doc_email'];
    $doc_nid           = $_POST['doc_nid'];
    $hospital_address  = $_POST['hospital_address'];
    $hospital_name  = $_POST['hospital_name'];
    $doc_address       = $_POST['doc_address'];
    $specialist        = $_POST['specialist'];
    $doc_joining_date  = date('m.d.y', strtotime($_POST['doc_joining_date']));
    $hospital_emergencynum = $_POST['hospital_emergencynum'];


    if (isset($doc_name) OR isset($doc_id) OR isset($doc_blood_grp) OR isset($doc_dob) OR isset($doc_email)
        OR isset($doc_nid) OR isset($hospital_address) OR isset($hospital_name) OR isset($doc_address)
         OR isset($specialist)  OR isset($doc_joining_date)  OR isset($hospital_emergencynum) 
    )
    {
        ///table governing boby
        $stmt = "INSERT INTO DOCTOR
(doc_name,doc_id,doc_dob,doc_nid,doc_email,doc_blood_grp,doc_joining_date,doc_address,specialist,hospital_name,hospital_address,hospital_emergencynum)
        VALUES (:doc_name_bv,:doc_id_bv,to_date('" . $doc_dob . "','MM/DD/YYYY')
        ,:doc_nid_bv,:doc_email_bv,:doc_blood_grp_bv,to_date('" . $doc_joining_date . "','MM/DD/YYYY'),
        :doc_address_bv,:specialist_bv,:hospital_name_bv,:hospital_address_bv,:hospital_emergencynum_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':doc_name_bv', $doc_name);
        oci_bind_by_name($s, ':doc_id_bv', $doc_id);
        oci_bind_by_name($s, ':doc_nid_bv', $doc_nid);
        oci_bind_by_name($s, ':doc_email_bv', $doc_email);
        oci_bind_by_name($s, ':doc_blood_grp_bv', $doc_blood_grp);
        oci_bind_by_name($s, ':doc_address_bv', $doc_address);
        oci_bind_by_name($s, ':specialist_bv', $specialist);
        oci_bind_by_name($s, ':hospital_name_bv', $hospital_name);
        oci_bind_by_name($s, ':hospital_address_bv', $hospital_address);
        oci_bind_by_name($s, ':hospital_emergencynum_bv', $hospital_emergencynum);


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1>Information Table For DOCTOR</h1>';
    $stid = oci_parse($c1, 'SELECT doc_name,doc_id,doc_dob,doc_nid,doc_email,doc_blood_grp,doc_joining_date,doc_address,specialist,hospital_name,hospital_address,hospital_emergencynum FROM DOCTOR');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Doc_name</th>';
echo'<th>Doc_id</th>';
echo'<th>Doc_dob</th>';
echo'<th>Doc_nid</th>';
echo'<th>Doc_email</th>';
echo'<th>Doc_blood_grp</th>';
echo'<th>Doc_joining_date</th>';
echo'<th>Doc_address</th>';
echo'<th>Specialist</th>';
echo'<th>Hospital_name</th>';
echo'<th>Hospital_emergencynum</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 