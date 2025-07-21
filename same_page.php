<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        UserName: <br>
        <input type="text" name="user" size="20"><br>
        Books in Collection: <br>
        <select name="books[]" size="5" multiple>
            <option value="Web">web</option>
            <option value="Networking">Networking</option>
            <option value="Machine Learning">Machine Learning</option>
        </select><br>
        comment: <br>
        <textarea name="comment" cols="50" rows="2"></textarea><br>
        <input type="submit" name="submit" value="Send">
    </form>
</body>
</html>

<?php
if ($_POST) {
    echo "Welcome " . $_POST['user'] . "<br>";
    echo "Comment: " . $_POST['comment'] . "<br>";
    echo "<ol>";
    foreach ($_POST['books'] as $book) {
        echo "<li>$book</li>";
    }
    echo "</ol>";
}
?>
