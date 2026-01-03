<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white p-3">
                <h4 class="card-title text-center mb-0">Регистрация</h4>
            </div>
            <div class="card-body p-4">
                
                <form action="/src/actions/reg.php" method="POST">
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="user_name" placeholder="Иван Иванов" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+7 (999) 000-00-00" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>

                    <div class="mb-3">
                        <label for="pass2" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control" id="pass2" name="second_pass" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primaryсд">Создать аккаунт</button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>