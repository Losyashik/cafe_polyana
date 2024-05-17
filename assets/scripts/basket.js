var basketProductList;
if (localStorage.getItem("polBasket"))
    basketProductList = JSON.parse(localStorage.getItem("polBasket"));
else basketProductList = [];
window.onload = () => {
    document.querySelectorAll(".card_button").forEach(item => {
        item.addEventListener("click", addProduct);
    })
    document.querySelector(".basket_list-clear").addEventListener('click', () => {
        basketProductList = [];
        renderList();
    })
}


async function addProduct(e) {
    let id = e.currentTarget.dataset.id;
    let testArr = basketProductList.filter(i => i.id == id)
    if (testArr.length)
        basketProductList[basketProductList.indexOf(testArr[0])].count++;
    else
        basketProductList.push(await fetch("./backend/dataProductBasket.php?id=" + id).then(text => text.json()).then(data => { return data }))
    renderList();
}

function addListeners() {
    document.querySelectorAll(".basket_item-delete").forEach(item => {
        item.addEventListener("click", () => {
            basketProductList = basketProductList.filter(i => item.dataset.id != i.id);
            renderList();
        })
    })
    document.querySelectorAll(".counter_plus").forEach(item => {
        item.addEventListener("click", () => {
            basketProductList[item.dataset.index].count++
            renderList();
        })
    })
    document.querySelectorAll(".counter_minus").forEach(item => {
        item.addEventListener("click", () => {
            if (basketProductList[item.dataset.index].count == 1)
                return false
            basketProductList[item.dataset.index].count--
            renderList();
        })
    })
}
function renderList() {
    let body = document.querySelector(".basket_list-body");
    let sumBlocks = document.querySelectorAll(".basket_total-summ span");
    let basketIcon = document.querySelector(".topbar_basket");
    let countBlock = document.querySelector(".topbar_basket-counter");
    let count = 0;
    let sum = 0;
    localStorage.setItem("polBasket", JSON.stringify(basketProductList));
    if (basketProductList.length) {
        body.innerHTML = "";
        if (!basketIcon.classList.contains("topbar_basket--fill"))
            basketIcon.classList.add("topbar_basket--fill");
    }
    else {
        if (basketIcon.classList.contains("topbar_basket--fill"))
            basketIcon.classList.remove("topbar_basket--fill");
        body.innerHTML = `
        <div class="basket_list-item basket_item basket_item--empty">
            <h3 class="basket_item-name">Ваша корзина пуста</h3>
        </div>
        `;
    }
    basketProductList.forEach((item, index) => {
        body.insertAdjacentHTML("beforeend", `
        <div class="basket_list-item basket_item">
            <img src="${item.image}" class="basket_item-image" />
            <h3 class="basket_item-name">${item.name}</h3>
            <div class="basket_item-counter counter">
                <button type="button" data-index="${index}" class="counter_button counter_minus button">-</button>
                <div class="counter_button counter_number">${item.count}</div>
                <div>*</div>
                <div class="price">${item.price} ₽</div>
                <button type="button" data-index="${index}" class="counter_button counter_plus button">+</button>
            </div>
            <div class="basket_item-sum">${item.price * item.count} ₽</div>
            <button type="button" class="basket_item-delete" data-id="${item.id}"></button>
        </div>
    `);
        sum += item.count * item.price;
        count += item.count;
    })
    countBlock.innerHTML = count;
    sumBlocks.forEach(item => {
        item.innerHTML = sum;
    })
    addListeners();
}

document.querySelector(".basket_list-next").addEventListener("click", () => {
    if (!basketProductList.length)
        return false;
    document.querySelector(".basket_list").classList.remove("basket_list--active")
    document.querySelector(".basket_data").classList.add("basket_data--active")
})
document.querySelector(".basket_list-prev").addEventListener("click", () => {
    document.querySelector(".basket_list").classList.add("basket_list--active")
    document.querySelector(".basket_data").classList.remove("basket_data--active")
})
document.querySelectorAll(".radio-button_input").forEach(item => {
    item.addEventListener("change", () => {
        document.querySelector(".radio-button_label--checked").classList.remove("radio-button_label--checked")
        item.parentElement.classList.add("radio-button_label--checked");
    })
})

document.querySelector(".basket").addEventListener("submit", async e => {
    e.preventDefault();
    let body = new FormData(e.currentTarget);
    body.append("productList", JSON.stringify(basketProductList));
    let resp = await fetch("./backend/addApp.php", {
        method: 'post',
        body
    })
    document.querySelector(".basket_list").classList.add("basket_list--active")
    document.querySelector(".basket_data").classList.remove("basket_data--active")
    document.querySelector(".basket").classList.toggle("basket--active");
    basketProductList = [];
    renderList();
    alert("Спасибо за заказ!\nС вами свяжется менеджер для подтверждения заказа")

})