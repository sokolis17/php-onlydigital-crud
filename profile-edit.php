<?php

require_once __DIR__. '/helpers/functions.php';

if (!isset($_SESSION['user']['id'])) {
    header('Location: /php-onlydigital-crud/login.php');
}
require_once __DIR__. '/views/layouts/header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                
                <h4 class="mb-4 text-center">Редактирование профиля</h4>

                <form action="src/actions/update.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Имя</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($_SESSION['user']['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" 
                               value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input type="tel" name="phone" class="form-control" 
                               value="<?= htmlspecialchars($_SESSION['user']['tel'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Новый пароль</label>
                        <input type="password" name="password" class="form-control" placeholder="******">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        <a href="home.php" class="btn btn-light text-muted">Отмена</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<? require_once __DIR__. '/views/layouts/footer.php';?>