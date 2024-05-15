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
                <li class="catalog_pages-item">
                    <a href="" class="catalog_pages-button catalog_pages-button--selected">1</a>
                </li>
                <li class="catalog_pages-item">
                    <a href="" class="catalog_pages-button">2</a>
                </li>
                <li class="catalog_pages-item">
                    <a href="" class="catalog_pages-button">3</a>
                </li>
                <li class="catalog_pages-item">
                    <a href="" class="catalog_pages-button">4</a>
                </li>
                <li class="catalog_pages-item">
                    <a href="" class="catalog_pages-button">5</a>
                </li>
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
            } else {
                if (pages_body.classList.contains("catalog_pages--active"))
                    pages_body.classList.remove("catalog_pages--active")
            }
            data.products.forEach(item => {
                catalog_body.insertAdjacentHTML("beforeend", `
                    <div class="card catalog_body-item">
                        <img src="${item.image}" alt="" class="catalog_body-item-image card_image">
                        <h4 class="catalog_body-item-heading card_heading">${item.name}</h4>
                        <div class="catalog_body-item-description card_description">${item.description}</div>
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
            if (item.id != localStorage.getItem("PolCategory"))
                catalog_categories.insertAdjacentHTML("beforeend", `
                    <li class="catalog_categories-item">
                        <a class="catalog_categories-button" data-id = "${item.id}">${item.name}</a>
                    </li>
                `);
            else
                catalog_categories.insertAdjacentHTML("beforeend", `
                    <li class="catalog_categories-item">
                        <a class="catalog_categories-button catalog_categories-button--selected"  data-id = "${item.id}">${item.name}</a>
                    </li>
                `);

        });
        
        renderCatalogList(localStorage.getItem("polPage"));
    </script>
</body>

</html>