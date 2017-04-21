<?php
function csv(){
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Id', 'First Name', 'Last Name','Sex', 'Country of Birth', 'Contact Number', 'Email', 'Year Graduated', 'Degree','Class of Degree', 'Occupation', 'Company', 'Country Employed', 'Company Email', 'Interest', 'Scoail Media'));

// fetch the data
$db = new mysqli('localhost', 'uwialumni', 'uwialumni', 'uwialumni');
$rows = $db->query('SELECT * FROM graduates');

// loop over the rows, outputting them
while ($row = $rows->fetch_assoc()) fputcsv($output, $row);
}
 if (isset($_GET['download'])) {
    csv();
  }
?>