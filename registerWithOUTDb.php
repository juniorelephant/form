<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Validation</title>
</head>
<body>

<?php
$errors = [];
$fname = $lname = $address = $email = $pass = $gender = "";
$hashedPass = "";

if (isset($_POST["submit"])) {
    // Validate each field
    if (empty($_POST['fname'])) {
        $errors['fname'] = "⚠️ First Name is required.";
    } else {
        $fname = $_POST['fname'];
    }

    if (empty($_POST['lname'])) {
        $errors['lname'] = "⚠️ Last Name is required.";
    } else {
        $lname = $_POST['lname'];
    }

    if (empty($_POST['address'])) {
        $errors['address'] = "⚠️ Address is required.";
    } else {
        $address = $_POST['address'];
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "⚠️ Email is required.";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['pass'])) {
        $errors['pass'] = "⚠️ Password is required.";
    } else {
        $pass = $_POST['pass'];
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT); // 💥 Password hashed here
    }

    if (empty($_POST['gender'])) {
        $errors['gender'] = "⚠️ Gender is required.";
    } else {
        $gender = $_POST['gender'];
    }
}
?>

<!-- HTML FORM -->
<form action="" method="POST">
    First Name: <br>
    <input type="text" name="fname" value="<?= htmlspecialchars($fname) ?>"><br>
    <?php if (isset($errors['fname'])) echo "<span style='color:red;'>{$errors['fname']}</span><br>"; ?>

    Last Name: <br>
    <input type="text" name="lname" value="<?= htmlspecialchars($lname) ?>"><br>
    <?php if (isset($errors['lname'])) echo "<span style='color:red;'>{$errors['lname']}</span><br>"; ?>

    Address: <br>
    <input type="text" name="address" value="<?= htmlspecialchars($address) ?>"><br>
    <?php if (isset($errors['address'])) echo "<span style='color:red;'>{$errors['address']}</span><br>"; ?>

    Email: <br>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <?php if (isset($errors['email'])) echo "<span style='color:red;'>{$errors['email']}</span><br>"; ?>

    Password: <br>
    <input type="password" name="pass"><br>
    <?php if (isset($errors['pass'])) echo "<span style='color:red;'>{$errors['pass']}</span><br>"; ?>

    Gender: <br>
    <input type="radio" name="gender" value="Male" <?= ($gender == "Male") ? "checked" : "" ?>> Male
    <input type="radio" name="gender" value="Female" <?= ($gender == "Female") ? "checked" : "" ?>> Female<br>
    <?php if (isset($errors['gender'])) echo "<span style='color:red;'>{$errors['gender']}</span><br>"; ?>

    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- ✅ Show Output Below Form -->
<?php
if (isset($_POST["submit"]) && count($errors) === 0) {
    echo "<h3>✅ Submitted Data:</h3>";
    echo "<table border='1' cellpadding='10'>
            <tr><th>Field</th><th>Value</th></tr>
            <tr><td>First Name</td><td>$fname</td></tr>
            <tr><td>Last Name</td><td>$lname</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>Email</td><td>$email</td></tr>
            <tr><td>Password (Hashed)</td><td>$hashedPass</td></tr>
            <tr><td>Gender</td><td>$gender</td></tr>
        </table>";
}
?>

</body>
</html>
