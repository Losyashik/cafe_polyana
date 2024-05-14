let productList;
window.onload = () => {
    productList = [{
        id: 1,
        image: "./assets/images/best1.png",
        name: "Креветки в чесночном соусе с рисом",
        count: 1,
        price: 2500

    },
    {
        id: 2,
        image: "./assets/images/best1.png",
        name: "Креветки в чесночном соусе с рисом",
        count: 1,
        price: 2500

    }
    ];
    renderList();
}
async function addProduct(e) {
    productList.push(await fetch("./backend/dataProductBasket.php?id=" + e.currentTarget.dataset.id).then(text => { return text.json() }))
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
    let sum_block = document.querySelector(".basket_total-summ span");
    let sum = 0;
    if (productList.length) {
        body.innerHTML = "";
    }
    else {
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
    })
    sum_block.innerHTML = sum;
    addListeners()
}


