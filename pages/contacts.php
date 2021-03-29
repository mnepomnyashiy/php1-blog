<?php
    $errors = [];
    $successMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = strip_tags($_POST['name']) ?? null; // пустая строка придет, если поле не заполнено
        $email = strip_tags($_POST['email']) ?? null;
        $message = strip_tags($_POST['message']) ?? null;
        
        if (strlen($name) === 0) {
            $errors[] = 'Имя должно быть задано';
        }
        if (strlen($email) === 0) {
            $errors[] = 'Почта должна быть задана';
        }

        if (count($errors) === 0) {
            $data = "Имя: $name, Email: $email, Сообщение: $message" . PHP_EOL;            
            file_put_contents('formdata.txt', $data, FILE_APPEND);
            $successMessage = 'Данные успешно отправлены!';
        }
    }
?>

<div class="main__center">
<div class="main__center-heading">
        <h1 class="align-center">Контакты</h1>
    </div>
    <section>
        <form method="POST">
            <div class="contacts__form-group">
                <input type="text" name="name" placeholder="Имя*">
            </div>
            <div class="contacts__form-group">
                <input type="email" name="email" placeholder="Email*">
            </div>
            <div class="contacts__form-group">
                <textarea name="message" placeholder="Сообщение"></textarea>
            </div>
                <?php foreach($errors as $error): ?>
                <div style="color: red">
                        <?= $error; ?>
                </div>  
            <?php endforeach; ?>

            <?php
                if (strlen($successMessage) > 0) {
                    echo "$successMessage";
                }
            ?>
            <input class="btn bcg-green font-white roboto" type="submit" value="Написать">
        </form>
    </section>
</div>