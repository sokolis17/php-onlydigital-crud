<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Auth Project' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light"> 
    <nav class="navbar navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">PHP Auth</a>
            
            <ul class="nav">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/home.php">
                            <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="/src/actions/logout.php">Выход</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/php-onlydigital-crud/login.php">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/php-onlydigital-crud/register.php">Регистрация</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <div class="container">