<?php



$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
   
    $f_day         = $_POST['f_day'];
    $food_type     = $_POST['food_type'];
    $food_cost     = $_POST['food_cost'];
    $food_menu     = $_POST['food_menu'];
    $f_date        = date('m.d.y', strtotime($_POST['f_date']));
    $period        = $_POST['period'];
    $serial_id     = $_POST['serial_id'];
    
  



    if ( isset($f_day) OR isset($food_type) OR isset($food_cost) OR isset( $food_menu) 
        OR isset($f_date) OR isset($period) OR isset($serial_id))
    {
        ///table governing boby
        $stmt = "INSERT INTO FOOD
        (f_day,food_type,food_cost,food_menu,f_date,period,serial_id)
        VALUES (:f_day_bv,:food_type_bv,:food_cost_bv,:food_menu_bv,to_date('" . $f_date . "','MM/DD/YYYY'),:period_bv,:serial_id_bv)";
        $s    = oci_parse($c1, $stmt);


        oci_bind_by_name($s, ':f_day_bv', $f_day);
        oci_bind_by_name($s, ':food_type_bv', $food_type);
        oci_bind_by_name($s, ':food_cost_bv', $food_cost);
        oci_bind_by_name($s, ':food_menu_bv', $food_menu);
        oci_bind_by_name($s, ':period_bv', $period);
        oci_bind_by_name($s, ':serial_id_bv', $serial_id);
        
        
        

        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1>Table For Food Information</h1>';
    $stid = oci_parse($c1, 'SELECT f_day,food_type,food_cost,food_menu,f_date,period,serial_id FROM FOOD');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>F_Day</th>';
echo'<th>Food_type</th>';
echo'<th>Food_cost</th>';
echo'<th>Food_Menu</th>';
echo'<th>F_Date</th>';
echo'<th>Period</th>';
echo'<th>Serial_id</th>';



while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



?>
            



 