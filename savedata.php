<?php
// Prevent direct access without form submission
if (!isset($_POST['submit'])) {
    die("Access denied.");
}

// Collect form input
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];

// Connect to the correct database
$conn = mysqli_connect("localhost", "root", "", "blood_bank_database") or die("Connection failed: " . mysqli_connect_error());

// Insert data into donor_details table
$sql = "INSERT INTO donor_details (donor_name, donor_contact, donor_email, donor_age, donor_gender, donor_blood, donor_address)
        VALUES ('$name', '$number', '$email', '$age', '$gender', '$blood_group', '$address')";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Redirect to home page or a thank-you page
    header("Location: home.php");
} else {
    // Display error message
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>