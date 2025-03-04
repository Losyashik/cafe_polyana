<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        // if (!localStorage.getItem("user-cake") || !JSON.parse(localStorage.getItem("user-cake")).admin) {
        //     window.location = "./../";
        // }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Панель администратора</title>
</head>

<body>
    <!-- https://colorscheme.ru/#3z124----Ocep -->
    <nav class="leftbar">
        <ul class="leftbar__ul">
            <li class="leftbar__li"><a href="#category" class="leftbar__link">Категории</a></li>
            <li class="leftbar__li"><a href="#products" class="leftbar__link">Товары</a></li>
            <li class="leftbar__li"><a href="#tables" class="leftbar__link">Столы</a></li>
            <li class="leftbar__li"><a href="#applications" class="leftbar__link">Заказы</a></li>
            <li class="leftbar__li"><a href="#reserves" class="leftbar__link">Резерв</a></li>
            <li class="leftbar__li"><a href="./../" class="leftbar__link">Назад</a></li>
        </ul>
    </nav>
    <main class="main">
        <section class="section" id="category">
            <h1 class="section__heading">Категории</h1>
            <main class="section__body">
                <form class="section__form admin-form">
                    <h2 class="admin-form__heading">Добавить</h2>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <input type="text" name="name" id="category_name" class="admin-form__input" required>
                        <label for="category_name" class="admin-form__label-input">Название категории</label>
                    </div>
                    <button class="admin-form__button-submit" type="submit" name="category" value="add">Добавить</button>
                </form>
                <article class="section__list section__with-table">
                    <table id="category-table" class="section__table table"></table>
                </article>
            </main>
        </section>
        <section class="section" id="products">
            <h1 class="section__heading">Товары</h1>
            <main class="section__body">
                <form class="section__form admin-form" method="post">
                    <h2 class="admin-form__heading">Добавить</h2>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <select name="category" id="product_category" class="admin-form__input" required></select>
                        <label for="producrt_price" class="admin-form__label-input">Категория</label>
                    </div>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <input type="text" name="name" id="product_name" class="admin-form__input" required>
                        <label for="product_name" class="admin-form__label-input">Название товара</label>
                    </div>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <input type="number" name="price" id="producrt_price" class="admin-form__input" min="1" required>
                        <label for="producrt_price" class="admin-form__label-input">Цена</label>
                    </div>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <textarea type="text" name="description" id="product_description" class="admin-form__input" required></textarea>
                        <label for="product_description" class="admin-form__label-input">Описание</label>
                    </div>
                    <label for="product_image" class="admin-form__label-file">
                        <div class="admin-form__label-content"></div>
                        <input class="admin-form__input-file" type="file" name="image" id="product_image" accept="image/*">
                    </label>

                    <button class="admin-form__button-submit" type="submit" name="product" value="add">Добавить</button>
                </form>
                <article class="section__list section__with-table">
                    <table id="product-table" class="section__table table"></table>
                </article>
            </main>
        </section>
        <section class="section" id="tables">
            <h1 class="section__heading">Столы</h1>
            <main class="section__body">
                <form class="section__form admin-form">
                    <h2 class="admin-form__heading">Добавить</h2>
                    <div class="admin-form__block-input">
                        <div class="admin-form__border-block"></div>
                        <input type="text" name="name" id="tables_name" class="admin-form__input" required>
                        <label for="tables_name" class="admin-form__label-input">Номер стола</label>
                    </div>
                   
                    <button class="admin-form__button-submit" type="submit" name="table" value="add">Добавить</button>
                </form>
                <article class="section__list section__with-table">
                    <table class="section__table table" id="tables-table">
                    </table>
                </article>
            </main>
        </section>
        <section class="section" id="applications">
            <h1 class="section__heading">Заказы</h1>
            <main class="section__body">
                <article class="section__with-table" id="application">
                    <table id="application-table" class="section__table table"></table>
                </article>
            </main>
        </section>
        <section class="section" id="reserves">
            <h1 class="section__heading">Резерв столов</h1>
            <main class="section__body">
                <article class="section__with-table" id="reserve">
                    <table id="reserve-table" class="section__table table"></table>
                </article>
            </main>
        </section>
    </main>
    <div class="bg"></div>
    <script src="./assets/scripts/main.js"></script>
</body>

</html>