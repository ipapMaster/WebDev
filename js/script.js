// 1. Переменные
let str = "Основные цвета";

// 2. Массивы
let colors = ["Red", "Green", "Blue"]; // colors.length - длина массива

// 3. Функции
function sayHello(name) {
    document.write('Вас зовут: ' + name);
}

// 4. Объекты
let product1 = {
    id: 1,
    name: 'Часы',
    price: 12200,
    count: 2,
}

let product2 = {
    id: 2,
    name: 'Наушники',
    price: 2350,
    count: 1,
}

//let items = [product1, product2];
let basketkey = "shopBasket";
//localStorage.setItem(basketkey, JSON.stringify(items));
//localStorage.removeItem(basketkey);

// 5. События
//const popup = document.getElementById('popup');
//const temp = popup.children;
//console.log(popup.parentElement);
//console.log(popup.previousElementSibling);
//console.log(popup.nextElementSibling);
const popup = document.querySelector(".popup");
const buy = document.querySelector("#getPopup");
const close = document.querySelector(".close");
const basketTable = document.getElementById('basket');
const basketBadge = document.getElementById('basketBadge');



function popup_close() {
    popup.style.display = 'none';
}

function saveBasket(items) {
    localStorage.setItem(basketkey, JSON.stringify(items));
}

function getBasket() {
    let basket = localStorage.getItem(basketkey);
    let items = JSON.parse(basket);
    return items;
}

function changeQty(elem) {
    let id = document.getElementById(elem.id);
    let items = getBasket();
    for (let i of items.keys()) {
        if (items[i].id == elem.id) {
            items[i].count = Number(elem.value);
        }
    }
    saveBasket(items);
    items = getBasket();
    showBasket(items);
}

function deleteItem(elem) {
    let id = document.getElementById(elem.id);
    let items = getBasket();
    for (let i of items.keys()) {
        if (items[i].id == elem.id) {
            items.splice(i, 1); // удалить, начиная с i и один элемент
        }
    }
    saveBasket(items);
    items = getBasket();
    showBasket(items);
}

function showBasket(items) {
    let count = 0;
    let total = 0;
    let newBasket = document.createElement("table");
    newBasket.classList.add("table", "table-striped", "table-secondary", "table-bordered", "w-50");
    for (let item of items) {
        let newBasketTr = document.createElement("tr");
        newBasketTr.innerHTML = "<td>" + item.name + "</td>" +
            "<td>" + item.price + "</td>" +
            "<td><input type=\"number\" class=\"qty\" min=\"1\" id=\"" + item.id + "\" value=\"" + item.count + "\" onChange=\"changeQty(this);\" /></td>" +
            "<td>" + item.price * item.count + "</td>" +
            "<td><a href=\"#\" onclick=\"deleteItem(this);\" id=\"" + item.id + "\">&#128465;</a></td>";
        newBasket.append(newBasketTr);
        count++;
        total += item.price * item.count;
    }
    let newBasketTr = document.createElement("tr");
    newBasketTr.innerHTML = "<td colspan=\"3\"><b>Итого</b></td>" +
        "<td colspan=\"2\"><b>" + total + "</b></td>";
    newBasket.append(newBasketTr);
    basketTable.innerHTML = newBasket.outerHTML;
    basketBadge.innerHTML = count;
}

buy.onclick = function () {
    popup.style.display = 'block';
    //setTimeout(popup_close, 10000);
}

close.onclick = function () {
    popup.style.display = 'none';
    items = getBasket();
    showBasket(items);
}

window.onclick = function (event) {
    if (event.target == popup) {
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
