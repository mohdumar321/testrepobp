<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors',TRUE);

$conn = oci_connect("oracle123","oracle123","//umarora.cnwuurzv0sp4.us-west-2.rds.amazonaws.com:1521/bptest");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'select tablespace_name , table_name from all_table');
oci_execute($stid);

echo "<table border='1'>\n";
while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "   <td>" . ($item !==null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>/n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>

