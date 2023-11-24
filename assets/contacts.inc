<h1>Заполните форму</h1>
<form action="feedback.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Ваше имя: </label>
        <input type="text" id="username" name="username" class="form-control" aria-describedby="textHelp" />
        <div id="textHelp" class="form-text">Введите Ваше настоящее имя</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Ваш E-mail: </label>
        <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" />
        <div id="emailHelp" class="form-text">Мы никому не передадим Ваш E-mail</div>
    </div>
    <div class="mb-3">
        <label for="textMess" class="form-label">Ваше сообщение: </label>
        <textarea id="textMess" name="textMess" class="form-control" aria-describedby="messHelp"></textarea>
        <div id="messHelp" class="form-text">Введите здесь Ваше мнение</div>
    </div>
    <div class="mb-3">
        <label for="fileUpload" class="form-label">Вложение: </label>
        <input type="file" id="fileUpload" name="fileUpload" class="form-control" aria-describedby="fileHelp" />
        <div id="fileHelp" class="form-text">Скриншот</div>
    </div>
<input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>