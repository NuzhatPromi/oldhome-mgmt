
<?php


  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

  ///table governing boby 


$G_ID= $_POST['ID'];
$G_NID= $_POST['NID'];
$G_NAME= $_POST['Name'];
$ADDRESS= $_POST['Address'];

$stmt= "INSERT INTO GB(G_ID,G_NID,G_NAME,ADDRESS) VALUES ($G_ID,$G_NID,$G_NAME,$ADDRESS)";
 $s=oci_parse($c1, $stmt);



/*oci_bind_by_name($s, "G_ID_bv", $G_ID);
oci_bind_by_name($s, "G_NID_bv", $G_NID);
oci_bind_by_name($s, "G_NAME_bv", $G_NAME);
oci_bind_by_name($s, "ADDRESS_bv", $ADDRESS);*/


        oci_execute($s);
       echo "inserted<br>\n";
?>