<?php

  /*$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

  function drop_table($conn)
{
    $stmt = oci_parse($conn, "drop table GOVERNING_BODY");
    oci_execute($stmt);
    echo "Dropped table<br>\n";
}

drop_table($c1);*/


 $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

 


/*$governing="CREATE TABLE GB(
G_ID VARCHAR2(12),
G_NID VARCHAR2(12),
G_NAME VARCHAR2(25),
ADDRESS VARCHAR2(30),''
PRIMARY KEY (G_ID)
)";

//create_table($governing_boby);
$stmt = oci_parse($c1,$governing);
oci_execute($stmt);
echo "Created table<br>\n";?*/


 $stmt= "INSERT INTO GB(G_ID,G_NID,G_NAME,ADDRESS) VALUES (:G_ID_bv,:G_NID_bv,:G_NAME_bv,:ADDRESS_bv)";
 $s=oci_parse($c1, $stmt);

$G_ID="3559";
$G_NID="e2345";
$G_NAME="bnm";
$ADDRESS="hnjkl";
oci_bind_by_name($s, "G_ID_bv", $G_ID);
oci_bind_by_name($s, "G_NID_bv", $G_NID);
oci_bind_by_name($s, "G_NAME_bv", $G_NAME);
oci_bind_by_name($s, "ADDRESS_bv", $ADDRESS);






        oci_execute($s);
       echo "inserted<br>\n";



?>



