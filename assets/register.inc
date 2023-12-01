<h1>Заполните форму</h1>
<form action="reg.php" method="post">
    <div class="mb-3">
        <label for="userName" class="form-label">Введите имя: </label>
        <input type="text" id="userName" name="userName" class="form-control" aria-describedby="textHelp" />
        <div id="textHelp" class="form-text">Просьба вводить настоящее имя</div>
    </div>
    <div class="mb-3">
        <label for="userEmail" class="form-label">Введите E-mail: </label>
        <input type="email" id="userEmail" name="userEmail" class="form-control" aria-describedby="mailHelp" />
        <div id="mailHelp" class="form-text">Ваша почта никому не передаётся</div>
    </div>
    <div class="mb-3">
        <label for="userPass1" class="form-label">Пароль: </label>
        <input type="password" id="userPass1" name="userPass1" class="form-control" />
    </div>
    <div class="mb-3">
        <label for="userPass2" class="form-label">Повторите пароль: </label>
        <input type="password" id="userPass2" name="userPass2" class="form-control" />
    </div>
    <input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>