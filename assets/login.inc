<h1>Введите логин и пароль</h1>
<form action="login.php" method="post">
    <div class="mb-3">
        <label for="userEmail" class="form-label">E-mail: </label>
        <input type="email" id="userEmail" name="userEmail" class="form-control" aria-describedby="textHelp" />
        <div id="textHelp" class="form-text">Ваша почта никому не передаётся</div>
    </div>
    <div class="mb-3">
        <label for="userPass" class="form-label">Пароль: </label>
        <input type="password" id="userPass" name="userPass" class="form-control" />
    </div>
<input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>