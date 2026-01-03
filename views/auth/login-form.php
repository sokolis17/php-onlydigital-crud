<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white p-3">
                <h4 class="card-title text-center mb-0">Авторизация</h4>
            </div>
            <div class="card-body p-4">
                
                <form action="/src/actions/reg.php" method="POST">

                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="+7999... или gmail@ru" required>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="*******" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>