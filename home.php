<?php

require_once __DIR__ . '/helpers/functions.php';

if (!isset($_SESSION['user']['id'])) {
    header('Location: /php-onlydigital-crud/login.php');
}

require_once __DIR__ . '/views/layouts/header.php';
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body p-4 text-center">

                    <h2 class="mb-4">Привет, <?= htmlspecialchars($_SESSION['user']['name']) ?></h2>

                    <p class="text-muted mb-4">
                        Вы успешно авторизовались в системе.
                    </p>

                    <a href="profile-edit.php" class="btn btn-primary w-100 mb-2">
                        Редактировать профиль
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<? require_once __DIR__ . '/views/layouts/footer.php';
