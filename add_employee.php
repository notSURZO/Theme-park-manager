<?php
require_once ('dbconnect.php');


if (isset($_POST['park_id'], $_POST['salary'], $_POST['job_description'], $_POST['email'], $_POST['phone_number'], $_POST['employee_id'])) {
    
    $park_id = $_POST['park_id'];
    $salary = $_POST['salary'];
    $job_description = $_POST['job_description'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $employee_id = $_POST['employee_id'];

    
    $check_sql = "SELECT * FROM employees WHERE employee_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $employee_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "Error: This employee ID already exists.";
    } else {
      
        $sql = "INSERT INTO employees (park_id, salary, job_description, email, phone_number, employee_id) VALUES (?, ?, ?, ?, ?, ?)";

        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisssi", $park_id, $salary, $job_description, $email, $phone_number, $employee_id);

       
    if ($stmt->execute()) {
       
        $stmt->close();
        
       
        header("Location: employees.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
       
        $stmt->close();
    }


    $check_stmt->close();
} else {
    echo "All form fields are required.";
}