// 1. Переменные
let str = "Основные цвета";

// 2. Массивы
let colors = ["Red", "Green", "Blue"]; // colors.length - длина массива

// 3. Функции
function sayHello(name) {
    document.write('Вас зовут: ' + name);
}

// 4. Объекты
let product = {
    id: 1,
    name: 'Часы',
    price: 12200,
    arr: [
        1, 2, 3
    ],
}

// 5. События
//const popup = document.getElementById('popup');
//const temp = popup.children;
//console.log(popup.parentElement);
//console.log(popup.previousElementSibling);
//console.log(popup.nextElementSibling);
const popup = document.querySelector(".popup");
const buy = document.querySelector("#getPopup");
const close = document.querySelector(".close");

function popup_close() {
    popup.style.display = 'none';
}

buy.onclick = function() {
    popup.style.display = 'block';
    setTimeout(popup_close, 10000);
}

close.onclick = function() {
    popup.style.display = 'none';
}

window.onclick = function(event) {
    if(event.target == popup) {
        popup.style.display = 'none';
    }
}

/*product.arr.push('Привет');
product.name = 'Watch';
console.log(product.name);*/

// 6. DOM - Document Object Model
// console.log(document.documentElement); // Full html
// console.log(document.head); // DOM head
// console.log(document.body); // DOM body

// var elem = document.body; // iterable object or DOM-collection

// console.log(elem.childNodes); // перечень узлов DOM-коллекции

// А теперь переберём всю DOM-коллекцию
/*for (let node of elem.childNodes) {
    console.log(node);
}*/



/*let name = prompt("Ваше имя: ", 'по умолчанию')
sayHello(name);
document.write("<h1>" + str + "</h1><ul>");
for(let i = 0; i < colors.length; i++) {
    document.write("<li>" + colors[i] + "</li>");
}
document.write("</ul>");*/
