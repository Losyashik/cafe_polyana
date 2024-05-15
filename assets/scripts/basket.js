let productList = [];
async function addProduct(e) {
    let id = e.currentTarget.dataset.id;
    let testArr = productList.filter(i => i.id == id)
    if (testArr.length)
        productList[productList.indexOf(testArr[0])].count++;
    else
        productList.push(await fetch("./backend/dataProductBasket.php?id=" + id).then(text => text.json()).then(data => { return data }))
    renderList();
}
document.querySelectorAll(".card_button").forEach(item => {
    item.addEventListener("click", addProduct);
})
document.querySelector(".basket_list-clear").addEventListener('click', () => {
    productList = [];
    renderList();
})
function addListeners() {
    document.querySelectorAll(".basket_item-delete").forEach(item => {
        item.addEventListener("click", () => {
            productList = productList.filter(i => item.dataset.id != i.id);
            renderList();
        })
    })
    document.querySelectorAll(".counter_plus").forEach(item => {
        item.addEventListener("click", () => {
            productList[item.dataset.index].count++
            renderList();
        })
    })
    document.querySelectorAll(".counter_minus").forEach(item => {
        item.addEventListener("click", () => {
            if (productList[item.dataset.index].count == 1)
                return false
            productList[item.dataset.index].count--
            renderList();
        })
    })
}
function renderList() {
    let body = document.querySelector(".basket-list-body");
    let sumBlock = document.querySelector(".basket_total-summ span");
    let basketIcon = document.querySelector(".topbar_basket");
    let countBlock = document.querySelector(".topbar_basket-counter");
    let count = 0;
    let sum = 0;
    if (productList.length) {
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
    productList.forEach((item, index) => {
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
            <button type="button" class="basket_item-delete" data-id="${item.id}"></button>
        </div>
    `);
        sum += item.count * item.price;
        count += item.count;
    })
    countBlock.innerHTML = count;
    sumBlock.innerHTML = sum;
    addListeners();
}


