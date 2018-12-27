<?php

  $c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

  ///table governing boby 


$governing_boby="CREATE TABLE GOVERNING_BODY(
G_ID VARCHAR2(12),
G_NID VARCHAR2(12),
G_NAME VARCHAR2(25),
G_DOB DATE,
OCUPATION VARCHAR2(20),
PERSENT_ADDRESS VARCHAR2(30),
PERMANENT_ADDRESS VARCHAR2(30),
PHONE_NUMBER NUMBER(11,0),
EMAIL VARCHAR2(20),
PRIMARY KEY (G_ID)
)";

//create_table($governing_boby);
$stmt = oci_parse($c1,$governing_boby);
oci_execute($stmt);
echo "Created table<br>\n";



?>