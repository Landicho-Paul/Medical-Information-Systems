<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'reduce_stock_btn') {
    $medicineNames = $_POST['titles'];
    $response = '';

    function reduceStock($medicineName, $connection) {
        $query = "UPDATE medicine SET stock = stock - 1 WHERE medicine_name = '$medicineName' AND stock > 0";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            $error_message = "Error updating stock for $medicineName: " . mysqli_error($connection);
            echo "<script>console.error('{$error_message}');</script>";
            return false;
        } elseif (mysqli_affected_rows($connection) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getStockQuantity($medicineName, $connection) {
        $query = "SELECT stock FROM medicine WHERE medicine_name = '$medicineName'";
        $result = mysqli_query($connection, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['stock'];
        } else {
            $error_message = "Error fetching stock for $medicineName: " . mysqli_error($connection);
            echo "<script>console.error('{$error_message}');</script>";
            return 0;
        }
    }

    foreach ($medicineNames as $medicineName) {
        $medicineName = mysqli_real_escape_string($connection, $medicineName);

        $stockReduced = reduceStock($medicineName, $connection);

        if ($stockReduced) {
            $stock = getStockQuantity($medicineName, $connection);
            $response .= '<h3 class="stock-count">' . $medicineName . ' - In Stock: ' . $stock . '</h3>';
        } else {
            $error_message = "$medicineName stock could not be updated or is already zero.";
            echo "<script>console.error('{$error_message}');</script>";
            $response .= '<h3 class="stock-count">' . $error_message . '</h3>';
        }
    }

    echo $response;
    exit();
}
?>
