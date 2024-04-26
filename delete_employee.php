<?php
require_once('dbconnect.php');


if (isset($_POST['employee_id'])) {
 
    $employee_id = $_POST['employee_id'];

    // Prepare SQL statement
    $sql = "DELETE FROM employees WHERE employee_id = ?";

   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Close statement
        $stmt->close();

       
        header("Location: employees.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Employee ID (employee_id) is required.";
}
?>