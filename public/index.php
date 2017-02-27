<?php
date_default_timezone_set('GMT'); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors',TRUE);

$conn = oci_connect("oracle123","oracle123","//umarora.cnwuurzv0sp4.us-west-2.rds.amazonaws.com:1521/bptest");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$sql = 'select * from ORACLE123."umartable"';
$stid = oci_parse($conn, $sql);
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

