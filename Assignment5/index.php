<?php
// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate the form input
    $mentee_id = htmlspecialchars($_POST['mentee_id']);
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = htmlspecialchars($_POST['address']);
    $program = htmlspecialchars($_POST['program']);
    $academic_background = htmlspecialchars($_POST['academic_background']);
    $mentorship_experience = $_POST['mentorship_experience'];
    $goals = htmlspecialchars($_POST['goals']);
    $mentor_characteristics = htmlspecialchars($_POST['mentor_characteristics']);
    $resume = $_FILES['resume']['name'];  // File upload handling

   
    // Basic validation 
    if (empty($mentee_id) || empty($name) || empty($email) || empty($phone)) {
        $error_message = "Please fill all the required fields!";
    } else {
        // Here you can save the data to the database or send an email.
        // For now, we will display the input data.

        // Example of how to handle the file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["resume"]["name"]);
        move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
        
        $success_message = "Registration successful!";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System </title>
</head>
<body>

<h2>Student Management System </h2>

<?php
if (isset($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
if (isset($success_message)) {
    echo "<p style='color: green;'>$success_message</p>";
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="student_id">Student ID:</label><br>
    <input type="text" id="student_id" name="student_id" required><br><br>

    <label for="name">Full Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email Address:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone Number:</label><br>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br><br>

    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="Other">
    <label for="other">Other</label><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required></textarea><br><br>

    <label for="program">Program/Area of Interest:</label><br>
    <input type="text" id="program" name="program" required><br><br>

    <label for="academic_background">Academic Background:</label><br>
    <textarea id="academic_background" name="academic_background" required></textarea><br><br>

    <label>Previous Mentoring Experience:</label><br>
    <input type="radio" id="yes" name="mentorship_experience" value="Yes">
    <label for="yes">Yes</label><br>
    <input type="radio" id="no" name="mentorship_experience" value="No">
    <label for="no">No</label><br><br>

    <label for="goals">Goals for Mentorship:</label><br>
    <textarea id="goals" name="goals" required></textarea><br><br>

    <label for="mentor_characteristics">Preferred Mentor Characteristics:</label><br>
    <textarea id="mentor_characteristics" name="mentor_characteristics" required></textarea><br><br>

    <label for="resume">Upload Resume (Optional):</label><br>
    <input type="file" id="resume" name="resume"><br><br>

    <label>
        <input type="checkbox" name="consent" required>
        I consent to the processing of my personal data in accordance with the privacy policy.
    </label><br><br>




    <input type="submit" value="Register">
</form>

</body>
</html>