<?php

$c1 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');
//$c2 = oci_connect("MOHOSHINA", "Helloworld32", 'localhost/XE');

// Both $c1 and $c2 show the same PHP resource id meaning they use the
// same underlying database connection
echo "c1 is $c1<br>\n";
//echo "c2 is $c2<br>\n";

function create_table($conn)
{
    $stmt = oci_parse($conn, "create table hallo (test varchar2(64)),(test2 varchar2(30))" );
    //oci_execute($stmt);
    echo "Created table<br>\n";
}

function drop_table($conn)
{
    $stmt = oci_parse($conn, "drop table hallo");
    oci_execute($stmt);
    echo "Dropped table<br>\n";
}

function insert_data($connname, $conn)
{
    $stmt = oci_parse($conn, "insert into hallo
              values(to_char(sysdate,'DD-MON-YY HH24:MI:SS'))");
    oci_execute($stmt, OCI_DEFAULT);
    echo "$connname inserted row without committing<br>\n";
}

function rollback($connname, $conn)
{
    oci_rollback($conn);
    echo "$connname rollback<br>\n";
}

function select_data($connname, $conn)
{
    $stmt = oci_parse($conn, "select * from hallo");
    oci_execute($stmt, OCI_DEFAULT);
    echo "$connname ----selecting<br>\n";
    while (oci_fetch($stmt)) {
        echo "    " . oci_result($stmt, "TEST") . "<br>\n";
    }
    echo "$connname ----done<br>\n";
}

create_table($c1);

insert_data('c1', $c1);   // Insert a row using c1
//sleep(2);                 // sleep to show a different timestamp for the 2nd row
//insert_data('c2', $c2);   // Insert a row using c2

select_data('c1', $c1);   // Results of both inserts are returned
//select_data('c2', $c2);   // Results of both inserts are returned

rollback('c1', $c1);      // Rollback using c1

//select_data('c1', $c1);   // Both inserts have been rolled back
//select_data('c2', $c2);

//drop_table($c1);

// Closing one of the connections makes the PHP variable unusable, but
// the other could be used
oci_close($c1);
echo "c1 is $c1<br>\n";
//echo "c2 is $c2<br>\n";