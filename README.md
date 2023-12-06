1. Типограф: https://www.artlebedev.ru/typograf/
2. Спецсимволы: https://htmlweb.ru/html/symbols.php
3. Про Reset и Normalize: https://webcademy.ru/blog/739/ (там также есть про JScript и PHP)
4. Справочник по HTML + CSS: https://htmlbook.ru/
5. Текстовый блок со стрелкой: https://cssarrowplease.com/
6. Генератор CSS, HTML и шпаргалки: https://html-css-js.com/html/generator/
7. Забираем все цвета с сайта: https://www.colorcombos.com/
8. Готовые палитры цветов и немного теории цвета: https://palettes.shecodes.io/
9. Про вендорные префиксы: https://doka.guide/css/vendor-prefixes/
10. Обзор CSS-генераторов: https://tproger.ru/digest/css-code-generators
11. Документация по LESS (плагин для VS Code - EasyLess): https://lesscss.org/
12. Документация по Sass (плагин VS Code - Live Sass Compile): https://sass-lang.com/
13. Справочник Emmet: https://sitkodenis.ru/wp-content/uploads/2017/03/Emmet.pdf
14. [Самоучитель по Figma](https://assets.super.so/83bfff20-a177-485b-a5ba-afe3fc16ebf6/files/8cf1c829-3edf-4e15-9d4c-af0868c6055b.pdf) от А. Окунева
15. BootStrap: https://getbootstrap.ru/docs/5.3/getting-started/introduction/
16. Официальная документация по PHP: https://www.php.net/manual/ru/
17. Файл .htaccess: https://www.htaccess.su/ - индивидуальная настройка сервера, описание и примеры
18. Современный учебник Java Script: https://learn.javascript.ru/
19. Справочник по JavaScript и JQuery: https://html5book.ru/javascript-jquery/
20. Файл настроек VS Code (**settings.json**), как правило, находится тут: c:\Users\имя пользователя\AppData\Roaming\Code\User
21. Содержимое файла **settings.json** следующее:
```
{
    "editor.mouseWheelZoom": true,
    "files.autoSave": "afterDelay",
    "files.autoSaveDelay": 3000,
    "liveServer.settings.donotShowInfoMsg": true,
    "git.autofetch": true,
    "workbench.startupEditor": "none",
    "emmet.syntaxProfiles": {
        "html": "xhtml"
    },
    "editor.formatOnSave": true,
    "editor.fontLigatures": false,
    "liveSassCompile.settings.showOutputWindowOn": "None",
    // .css и min.css файлы в отдельную директорию
    "liveSassCompile.settings.formats": [
        {
            "format": "expanded",
            "extensionName": ".css",
            "savePath": "~/../css/"
        },
        {
            "extensionName": ".min.css",
            "format": "compressed",
            "savePath": "~/../css/"
        }
    ],
    // исключения
    "liveSassCompile.settings.excludeList": [
        "**/node_modules/**",
        ".vscode/**"
    ],
    // отключение .map файлов
    "liveSassCompile.settings.generateMap": false,
    //автопрефиксы, -webkit- -moz-..
    "liveSassCompile.settings.autoprefix": [
        "> 1%",
        "last 2 versions"
    ],
    // для less
    "less.compile": {
        "compress": false,
        "sourceMap": false,
        "out": "${workspaceRoot}\\css\\style",
        "outExt": ".css"
    }
}
```
