<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white p-3">
                <h4 class="card-title text-center mb-0">Авторизация</h4>
            </div>
            <div class="card-body p-4">

                <?php if (isset($_SESSION['error']['login'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']['login'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php unset($_SESSION['error']['login']); ?>
                <?php endif; ?>

                <form action="src/actions/log.php" method="POST">

                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="+7999... или gmail@ru" required>
                        <?php if (isset($_SESSION['error']['find'])): ?>
                            <div class="text-danger small mt-1"><?= $_SESSION['error']['find'] ?></div>
                            <?php unset($_SESSION['error']['find']); ?>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="*******" required>
                    </div>
                    <div
                        id="captcha-container"
                        class="smart-captcha mb-3"
                        data-sitekey="ysc1_WS1TmRn2vPQSAnqPuP6KPWLfIfHObzVpi9pIolkae61e2915"
                        style="height: 100px"></div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>