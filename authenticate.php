<?php
session_start();
include 'conn.php';
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['username'], $_POST['password']) ) {
    exit('Please fill both the username and password fields!');
}

if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "c";
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if ($_POST['password'] == $password) {
            echo "d";
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: beheer.php');
        } else {
            echo "e";
            echo "<script>alert('De ingevulde gegevens waren onjuist!')</script>";
            header('Location: login.php');
        }
    } else {
        echo "<script>alert('De ingevulde gegevens waren onjuist!')</script>";
        header('Location: login.php');
    }

    $stmt->close();
}
?>