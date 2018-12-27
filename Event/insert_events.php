<?php


$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

if (isset($_POST['ok']))
{
    $EVENT_DATE        = date('m.d.y', strtotime($_POST['EVE_D']));
    $PLACE              = $_POST['Place'];
    $COST               = $_POST['Cost'];
    $TYPE               = $_POST['Type'];
    $NO_OF_PEOPLE       = $_POST['No_P'];
    $SPONSORDED_BY      = $_POST['Sponsor'];


    if (isset($EVENT_DATE) OR isset($PLACE) OR isset($NO_OF_PEOPLE) )
    {
        ///table events
        $stmt = "INSERT INTO EVENTS (EVENT_DATE, PLACE, COST, TYPE, NO_OF_PEOPLE, SPONSORDED_BY) 
        VALUES (to_date('" . $EVENT_DATE . "','MM/DD/YYYY'),:PLACE_bv,:COST_bv
        ,:TYPE_bv,:NO_OF_PEOPLE_bv,:SPONSORDED_BY_bv)";
        $s    = oci_parse($c1, $stmt);


    
        oci_bind_by_name($s, ':PLACE_bv', $PLACE);
        oci_bind_by_name($s, ':COST_bv', $COST);
        oci_bind_by_name($s, ':TYPE_bv', $TYPE);
        oci_bind_by_name($s, ':NO_OF_PEOPLE_bv', $NO_OF_PEOPLE);
        oci_bind_by_name($s, ':SPONSORDED_BY_bv', $SPONSORDED_BY);


        oci_execute($s);
       
    }

    else{
        echo '<div style="color:red;font-weight: bold;">Please fillup  all the fields of the form</div>';
    }


}

echo ' <h1> Table of Events</h1>';
    $stid = oci_parse($c1, 'SELECT EVENT_DATE,PLACE,COST,TYPE,NO_OF_PEOPLE,SPONSORDED_BY FROM EVENTS');
                oci_execute($stid);


echo "<table border='1'>\n";
echo'<th>Event Date</th>';
echo'<th>Place</th>';
echo'<th>Cost</th>';
echo'<th>Type</th>';
echo'<th>NO_OF_PEOPLE</th>';
echo'<th>SPONSORDED_BY</th>';




while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>yuytrertyedf\n";
}
echo "</table>\n";



?>