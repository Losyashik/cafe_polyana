<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/catalog.css">
    <script src="./assets/scripts/basket.js"></script>
</head>

<body>
    <?php
    require_once("./assets/components/header.php");
    ?>
    <main class="catalog">
        <nav class="catalog_categories">
            <button class="catalog_categories-burger"></button>
            <h3 class="catalog_categories-heading">Наше меню</h3>
            <ul class="catalog_categories-list">
            </ul>
        </nav>
        <section class="catalog_body">

        </section>
        <nav class="catalog_pages">
            <ul class="catalog_pages-list">
            </ul>
        </nav>
    </main>

    <?php
    require_once("./assets/components/footer.php");
    ?>
    <script>
        let catalog_body = document.querySelector(".catalog_body");
        let catalog_categories = document.querySelector(".catalog_categories-list");
        let pages_body = document.querySelector(".catalog_pages");
        let pages_list = document.querySelector(".catalog_pages-list");
        let categories = JSON.parse('<?= json_encode(getArrayData("SELECT * FROM category")); ?>');
        async function renderCatalogList(page) {
            catalog_body.innerHTML = "";
            let id = localStorage.getItem("PolCategory");
            let data = await fetch(`./backend/getProducts.php?id=${id}&page=${page}`).then(text => text.json()).then(data => {
                return data
            });
            if (data.pages > 1) {
                if (!pages_body.classList.contains("catalog_pages--active"))
                    pages_body.classList.add("catalog_pages--active")
                pages_list.innerHTML = "";
                while (data.pages > 0) {
                    data.pages--;
                    pages_list.insertAdjacentHTML("afterbegin", `
                        <li class="catalog_pages-item">
                            <a href="" data-page="${data.pages}" class="catalog_pages-button ${page==data.pages?"catalog_pages-button--selected":""}">${data.pages+1}</a>
                        </li>
                    `);

                }
                document.querySelectorAll(".catalog_pages-button").forEach(item => {
                    item.addEventListener("click", (e) => {
                        e.preventDefault();
                        localStorage.setItem("polPage", e.currentTarget.dataset.page);
                        renderCatalogList(localStorage.getItem("polPage"));
                    })
                })
            } else {
                if (pages_body.classList.contains("catalog_pages--active"))
                    pages_body.classList.remove("catalog_pages--active")
            }
            data.products.forEach(item => {
                catalog_body.insertAdjacentHTML("beforeend", `
                    <div class="card catalog_body-item">
                        <img src="${item.image}" alt="" class="catalog_body-item-image card_image">
                        <h4 class="catalog_body-item-heading card_heading">${item.name}</h4>
                        <div class="catalog_body-item-description card_description">
                            <div class="card_description-price">${item.price} ₽</div>${item.description}
                        </div>
                        <button class="card_button button" data-id="${item.id}">В корзину</button>
                    </div>
                `)
            });
            document.querySelectorAll(".card_button").forEach(item => {
                item.addEventListener("click", addProduct);
            })
        }
        categories.forEach(item => {
            if (!localStorage.getItem("PolCategory")) {
                localStorage.setItem("PolCategory", 1);
            }
            catalog_categories.insertAdjacentHTML("beforeend", `
                    <li class="catalog_categories-item">
                        <a class="catalog_categories-button ${item.id == localStorage.getItem("PolCategory")?"catalog_categories-button--selected":""}" data-id = "${item.id}">${item.name}</a>
                    </li>
                `);


        });
        if (!localStorage.getItem("polPage"))
            localStorage.setItem("polPage", 0)
        renderCatalogList(localStorage.getItem("polPage"));
    </script>
</body>

</html>