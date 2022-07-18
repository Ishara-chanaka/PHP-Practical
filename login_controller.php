<?php
    session_start();
    include('dbConnection/connection.php');
    if (isset($_POST['login'])) {
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        $query = $connection->prepare("SELECT * FROM users WHERE email=:username");
        $query->bindParam("email", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>