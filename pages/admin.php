<?php
    $isAuth = isset($_COOKIE['PHPSESSID']) ? true : false;

    $errors = [];

    if (isset($_POST['login'])) {
        $users = file_get_contents('users.txt');

        $users = explode(PHP_EOL, $users);

        $isUserExists = false;

        foreach ($users as $user) {
            if (str_contains($user, $_POST['login'])) {
                $isUserExists = true;
                $currentUser = explode(',', $user);
            }
        }
        
        if (!$isUserExists) {
            $errors[] = 'Пользователя с таким именем не существует!';
        } else {
            $pass = $_POST['password'];
            if ($currentUser[1] === $pass) {
                session_start();
                $isAuth = true;
            } else {
                $errors[] = 'Введен неверный пароль';
            }
        }

    } elseif (isset($_POST['logout'])) {
        $isAuth = false;
        session_unset();
    }

?>

<?php if (!$isAuth): ?>
<div class="main__center">
    <div class="main__center-heading">
        <h1 class="align-center">Авторизация:</h1>
    </div>
    <section>
        <form method="POST">
            <div class="contacts__form-group">
                <input type="text" name="login" placeholder="Имя*" required>
            </div>
            <div class="contacts__form-group">
                <input type="password" name="password" placeholder="Пароль*" required>
            </div>

            <?php foreach($errors as $error): ?>
            <div style="color: red">
                    <?= $error; ?>
            </div>  
            <?php endforeach; ?>

            <button class="btn bcg-green font-white roboto">Войти</button>
        </form>
    </section>
</div>
<?php else: ?>
    <div class="main__center">
    <div class="main__center-smallbox">
        <h1>Добро пожаловать в админку!</h1>
        <form method="POST">
            <input name="logout" type="submit" value="Выйти" class="btn bcg-green font-white roboto">
        </form>
    </div>
</div>
<?php endif; ?>