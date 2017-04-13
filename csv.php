<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

// fetch the data
$db = new mysqli('localhost', 'username', 'password', 'database');
$rows = $db->query('SELECT field1,field2,field3 FROM table');

// loop over the rows, outputting them
while ($row = $rows->fetch_assoc()) fputcsv($output, $row);