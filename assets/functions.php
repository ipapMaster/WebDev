<?php
include("vars.inc");
/***** Набор пользовательских полезных функций *****/

/**
 * Сложение двух чисел
 * @var $a int - первое слагаемое
 * @var $b int - второе слагаемое
 * @return int - сумма двух чисел
 */
function summ(int $a, int $b): int
{
    return $a + $b;
}

/**
 * Функция, генерирующая меню
 * @var $menu array - ассоциативный массив с заголовками и ссылками
 * @return string - html-код меню
 */
function get_menu(array $menu): string
{
    $page = basename($_SERVER["PHP_SELF"]);
    $result = "<nav class=\"navbar navbar-expand-lg bg-body-tertiary\">
    <div class=\"container-fluid\">
        <a class=\"navbar-brand\" href=\"index.html\">Наш сайт</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\"
            data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\"
            aria-label=\"Переключатель навигации\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav me-2 ms-auto mb-2 mb-lg-0\">";
    foreach ($menu as $item => $link) {
        if ($link == $page) {
            $result .= "<li class=\"nav-item\">
            <a class=\"nav-link text-danger bg-warning bg-opacity-25\" href=\"$link\">$item</a>
        </li>";
        } else {
            $result .= "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"$link\">$item</a>
        </li>";
        }
    }
    if (isset($_SESSION["USER"]) && $_SESSION["USER"]["LOGGED"]) {
        $result .= "<li class=\"nav-item dropdown\">
        <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
          " . $_SESSION["USER"]["NAME"] . "
        </a>
        <ul class=\"dropdown-menu\">
          <li><a class=\"dropdown-item\" href=\"#\">Личный кабинет</a></li>
          <li><hr class=\"dropdown-divider\"></li>
          <li><a class=\"dropdown-item\" href=\"logout.html\">Выход</a></li>
        </ul>
      </li>";
    } else {
        $result .= "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"loginform.html\">Войти</a>
        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"register.html\">Регистрация</a>
        </li>";
    }
    $result .= "<a href=\"getbasket.php\" type=\"button\" class=\"btn btn-outline-secondary btn-sm position-relative\">Корзина
    <span id=\"basketBadge\" class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success\">";
    if(isset($_SESSION["BASKET"]))
        $result .= count($_SESSION["BASKET"]);
    $result .= "</span>
  </a>
    </ul>
        </div>
    </div>
</nav>";

    return $result;
}

/**
 * Функция, возвращающая текстовый фрагмент из файла
 * @var $content_file string - путь к файлу с контентом
 * @return string - содержимое файла
 */
function get_content(string $content_file): string
{
    return file_get_contents($content_file);
}

/**
 * @return - результат отправки формы (с файлом)
 */
function fbForm(): string
{
    $uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/upload/";
    $fields = [
        "username" => "<b>Имя: </b>",
        "email" => "<b>E-mail: </b>",
        "textMess" => "<b>Сообщение: </b>",
    ];
    $result = "";
    if ($_POST["sent"]) {
        foreach ($_POST as $key => $value) {
            if ($value && $value != "Отправить") {
                $result .= $fields[$key] . htmlspecialchars($value) . "<br />\n";
            }
        }
    }
    if ($_FILES["fileUpload"]["name"]) {
        $uploadFile = $uploadPath . $_FILES["fileUpload"]["name"];
        if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $uploadFile)) {
            $result .= "Не удалось загрузить, возможно это атака";
        }
    } else {
        $result .= "Вложений нет!";
    }
    return $result;
}

/**
 *  @return Вернёт строку с числом посещений страницы
 */
function cookies_test(string $cookie_name): string
{
    $visit_count = 1;

    if (isset($_COOKIE[$cookie_name])) {
        $visit_count += $_COOKIE[$cookie_name];
    }
    setcookie($cookie_name, $visit_count, strtotime("+ 1 minutes"));
    return "<p>Вы проголосовали раз: " . $visit_count . "</p>";
}

/**
 *  @return Вернёт строку с числом посещений страницы (за счёт сессии)
 */
function session_test(string $session_name): string
{
    $visit_count = 1;

    if (isset($_SESSION[$session_name])) {
        $visit_count = $_SESSION[$session_name] + 1;
    }
    
    $_SESSION[$session_name] = $visit_count;
    return "<p>Вы проголосовали (сессия): " . $visit_count . "</p>";
}

function send_mail($to, $from, $subject, $message, $headers) {
    $headers = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: От кого письмо <{$from}>\r\n";
    $headers .= "Reply-To: {$from}\r\n";
    $result = mail($to, $subject, $message, $headers);
    return $result;
}
?>