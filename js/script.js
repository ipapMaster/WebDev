let basketkey = "shopBasket";

const popup = document.querySelector(".popup");
//const buy = document.querySelector("#getPopup");
const close_btn = document.querySelector(".close");
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
        if (items[i]['ID'] == elem.id) {
            items[i]['COUNT'] = Number(elem.value);
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
        if (items[i]['ID'] == elem.id) {
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
    let newTable = document.createElement("table");
    newTable.classList.add("table", "table-striped", "table-secondary", "table-bordered");
    let newBasketTr = document.createElement("tr");
    newBasketTr.innerHTML = "<thead>" +
        "<tr class=\"text-center\">" +
            "<th scope=\"col\">#</th>" +
            "<th scope=\"col\">Продукт</th>" +
            "<th scope=\"col\">Описание</th>" +
            "<th scope=\"col\">&nbsp;</th>" +
            "<th scope=\"col\">Цена за ед., руб.</th>" +
            "<th scope=\"col\">Кол-во, ед.</th>" +
            "<th scope=\"col\">Всего, руб.</th>" +
            "<th scope=\"col\">&nbsp;</th>" +
            "</tr>" +
        "</thead>";
    newTable.append(newBasketTr);
    for (let item of items) {
        count++;
        let newBasketTr = document.createElement("tr");
        newBasketTr.innerHTML = "<td>" + count + "</td>" +
            "<td>" + item['NAME'] + "</td>" +
            "<td>" + item['SDESCR'] + "</td>" +
            "<td><img src=images/" + item['PICT'] + " width=\"50\"></td>" +
            "<td>" + item['PRICE'] + "</td>" +
            "<td><input type=\"number\" class=\"qty\" min=\"1\" id=\"" + item['ID'] + "\" value=\"" + item['COUNT'] + "\" onChange=\"changeQty(this);\" /></td>" +
            "<td>" + item['PRICE'] * item['COUNT'] + "</td>" +
            "<td><a style=\"text-decoration: none;\" href=\"#\" onclick=\"deleteItem(this);\" id=\"" + item['ID'] + "\">&#128465;</a></td>";
            newTable.append(newBasketTr);
        total += item['PRICE'] * item['COUNT'];
    }
    //let newBasketTr = document.createElement("tr");
    newBasketTr.innerHTML = "<td colspan=\"6\"><b>Итого: </b></td>" +
        "<td colspan=\"2\"><b>" + total + "</b></td>";
        newTable.append(newBasketTr);
    basketTable.innerHTML = newTable.outerHTML;
}


close_btn.onclick = function () {
    popup.style.display = 'none';
    // items = getBasket();
    // showBasket(items);
}

function getCount() {
    let count = 0;
    for (let index = 0; index < items.length; index++) {
        count++;
    }
    return count;
}

function inBasket(id, items) {
    for (let index = 0; index < items.length; index++) {
        if (items[index]['ID'] === id)
            return index;
    }
    return -1;
}

if (document.location.pathname == "/getbasket.php") {
    items = getBasket();
    basketBadge.innerHTML = getCount(items);
    showBasket(items);
}

function buy(elem_data) {
    let pr_id = elem_data.getAttribute('product_id');
    let url = "product_data.php?id=" + pr_id;
    let xmlhr = new XMLHttpRequest();
    xmlhr.open('GET', url, false);
    xmlhr.send(null);
    let item = xmlhr.response;
    let res = JSON.parse(item);
    let items = getBasket();
    if (!items) {
        res['COUNT'] = 1;
        items = [];
        items.push(res);
        saveBasket(items);
    } else {
        let temp = inBasket(pr_id, items);
        if (temp == -1) {
            res['COUNT'] = 1;
            items.push(res);
            saveBasket(items);
        }
        else {
            items[temp]['COUNT']++;
            saveBasket(items);
        }
    }
    popup.style.display = 'block';
}

//console.log('Наш ID:', pr_id);


// buy.onclick = function () {
//     popup.style.display = 'block';
//     //setTimeout(popup_close, 10000);
// }

// window.onclick = function (event) {
//     if (event.target == popup) {
//         popup.style.display = 'none';
//     }
// }
