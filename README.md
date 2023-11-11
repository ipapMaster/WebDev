1. Файл настроек VS Code (**settings.json**), как правило, находится тут: c:\Users\имя пользователя\AppData\Roaming\Code\User
2. Содержимое файла **settings.json** следующее:
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
