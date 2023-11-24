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
            <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">";
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
    $result .= "</ul>
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
?>