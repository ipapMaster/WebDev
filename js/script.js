let basketkey = "shopBasket";

const popup = document.querySelector(".popup");
const close_btn = document.querySelector(".close");
const basketTable = document.getElementById('basket');
const basketBadge = document.getElementById('basketBadge');
const messAbout = document.getElementById('addToBasket');
const sendbasket = document.querySelector(".sendbasket");

function setBadge() {
    let temp = getBasket();
    if (temp) {
        basketBadge.innerHTML = getCount();
    }
    else {
        if (sendbasket)
            sendbasket.remove();
        basketBadge.remove();
    }
}

function popup_close() {
    popup.style.display = 'none';
    setBadge();
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
    if (!items) {
        basketTable.innerHTML = "<h2>Тут пока пусто!!!</h2>";
        return;
    }
    let count = 0;
    let total = 0;
    let newTable = document.createElement("table");
    newTable.classList.add("table", "table-striped", "table-secondary", "table-bordered");
    let headBasketTr = document.createElement("tr");
    headBasketTr.innerHTML = "<thead>" +
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
    newTable.append(headBasketTr);
    for (let item of items) {
        count++;
        let innerBasketTr = document.createElement("tr");
        innerBasketTr.innerHTML = "<td>" + count + "</td>" +
            "<td>" + item['NAME'] + "</td>" +
            "<td>" + item['SDESCR'] + "</td>" +
            "<td><img src=images/" + item['PICT'] + " width=\"50\"></td>" +
            "<td>" + item['PRICE'] + "</td>" +
            "<td><input type=\"number\" class=\"qty\" min=\"1\" id=\"" + item['ID'] + "\" value=\"" + item['COUNT'] + "\" onChange=\"changeQty(this);\" /></td>" +
            "<td>" + item['PRICE'] * item['COUNT'] + "</td>" +
            "<td><a style=\"text-decoration: none;\" href=\"#\" onclick=\"deleteItem(this);\" id=\"" + item['ID'] + "\">&#128465;</a></td>";
        newTable.append(innerBasketTr);
        total += item['PRICE'] * item['COUNT'];
    }
    let newBasketTr = document.createElement("tr");
    newBasketTr.innerHTML = "<td colspan=\"6\"><b>Итого: </b></td>" +
        "<td colspan=\"2\"><b>" + total + "</b></td>";
    newTable.append(newBasketTr);
    basketTable.innerHTML = newTable.outerHTML;
    setBadge();
}


close_btn.onclick = function () {
    popup.style.display = 'none';
    basketBadge.innerHTML = getCount();
}

function getCount() {
    items = getBasket();
    let count = 0;
    if (items) {
        for (let index = 0; index < items.length; index++) {
            count++;
        }
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

if (document.location.pathname.slice(1) == "getbasket.php") {
    basketBadge.innerHTML = getCount();
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
    } else {
        let temp = inBasket(pr_id, items);
        if (temp == -1) {
            res['COUNT'] = 1;
            items.push(res);
        }
        else {
            items[temp]['COUNT']++;
        }
    }
    saveBasket(items);
    messageInfo = "Товар \"<b>" + res['NAME'] + "</b>\" добавлен в корзину!<br />";
    messageInfo += "Позиций в корзине: <b>" + getCount(getBasket()) + "</b>";
    messAbout.innerHTML = messageInfo;
    popup.style.display = 'block';
}

function gatherInfo(info_id) {
    send_id = info_id.getAttribute("snd_id");
    if (send_id == "sendBasket") {
        let data = localStorage.getItem(basketkey);
        my_form = document.createElement("form");
        my_form.name = "order";
        my_form.method = "POST";
        my_form.action = "order.php";
        my_tb = document.createElement("input");
        my_tb.type = "hidden";
        my_tb.name = "basket";
        my_tb.value = data;
        my_form.appendChild(my_tb);
        sendForm.appendChild(my_form);
        my_form.submit();
    }
    localStorage.clear();
}

// Выполняется при каждой загрузке любой страницы
setBadge();

//console.log('Наш ID:', pr_id);

// window.onclick = function (event) {
//     if (event.target == popup) {
//         popup.style.display = 'none';
//     }
// }
