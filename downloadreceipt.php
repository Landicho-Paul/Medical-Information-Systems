<?php
// Establish connection to the database
$pdo = new PDO('mysql:host=localhost;dbname=mcis2', 'root', '');

// Prepare and execute the SQL query
$stmt = $pdo->prepare('SELECT cart_id, Name, Price, Quantity, Date FROM addtocart'); 
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert the fetched data to HTML table format
$html = '<table>';
$html .= '<thead><tr><th>ID</th><th>Product</th><th>Price</th><th>Quantity</th><th>Date</th></tr></thead>';
$html .= '<tbody>';
foreach ($data as $row) {
    $html .= '<tr>';
    foreach ($row as $value) {
        $html .= '<td>' . $value . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</tbody></table>';

// Send the HTML table back to JavaScript
echo $html;
?>
