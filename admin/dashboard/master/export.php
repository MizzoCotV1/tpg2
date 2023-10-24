<?php
// Include PhpSpreadsheet classes
require __DIR__ . '/../../../vendor/autoload.php';

// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'terput2web';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Determine which table to export based on a parameter in the URL
if (isset($_GET['table'])) {
    $table = $_GET['table'];
} else {
    die("Table parameter is missing.");
}

// Create a new PhpSpreadsheet spreadsheet
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Fetch data from the specified database table
$query = "SELECT * FROM $table";
$result = $conn->query($query);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

// Create a worksheet and set its title
$worksheet = $spreadsheet->getActiveSheet();
$worksheet->setTitle('Exported Data');

// Add headers based on the columns in the result set
$columnCount = $result->field_count;
$columns = array();

$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'fill' => [
        'fillType' => PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'EBF1DE', // Replace with your desired hex color code
        ],
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

for ($i = 0; $i < $columnCount; $i++) {
    $columnInfo = $result->fetch_field();
    // Modify the header label as needed (e.g., replace underscores with spaces and capitalize the first letter of each word)
    $headerLabel = ucwords(str_replace('_', ' ', $columnInfo->name));
    $columns[] = $columnInfo->name; // Store the original column name
    $worksheet->setCellValueByColumnAndRow($i + 1, 1, $headerLabel);

    // Apply the defined style to the header row
    $worksheet->getStyleByColumnAndRow($i + 1, 1)->applyFromArray($styleArray);

    // Automatically adjust the column width to fit the content
    $worksheet->getColumnDimensionByColumn($i + 1)->setAutoSize(true);
}

// Add data from the database to the spreadsheet
$row = 2;
while ($row_data = $result->fetch_assoc()) {
    for ($i = 0; $i < $columnCount; $i++) {
        $originalColumnName = $columns[$i]; // Get the original column name
        $worksheet->setCellValueByColumnAndRow($i + 1, $row, $row_data[$originalColumnName]);
    }

    // Apply borders to data rows
    $worksheet->getStyle('A' . $row . ':' . $worksheet->getHighestColumn() . $row)
        ->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

    $row++;
}

// Set the content type and file name for the download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=\"$table.xlsx\"");

// Create an Excel writer and output the spreadsheet in XLSX format
$writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// Close the database connection
$conn->close();
?>