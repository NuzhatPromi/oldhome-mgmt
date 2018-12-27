<?php
 $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=xe)))" ;

 $c=OCI_connect("system", "a201514032", $db);

  if (!$c) 
  {
  	// $err = OCI_Error(); 
  	//echo "Connection failed." . $err[text];


  	$e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }
  else { 
    echo "Successfully connected to Oracle.\n"; 
    //OCI_Logoff($c);
   } 
 ?>