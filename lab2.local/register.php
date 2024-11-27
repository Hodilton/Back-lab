<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $passwordHash = hash('sha256', $password);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (Login, Password, Email) VALUES (:username, :password, :email)");
        $stmt->execute([
            'username' => $username,
            'password' => $passwordHash,
            'email' => $email,
        ]);

        echo "Регистрация успешна!";
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>

<form method="POST">
    <label for="username">Логин:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <button type="submit">Зарегистрироваться</button>
</form>

