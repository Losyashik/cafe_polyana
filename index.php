<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кафе "Поляна"</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/main.css">
</head>
<?php
require_once("./assets/components/header.php");
?>

<header class="header">
    <div class="header_content slider">
        <div class="slider_item">
            <div class="slider_block">
                <img src="./assets/images/logo.png" alt="" class="slider_logo">
                <p class="slider_description">Жизнь слишком коротка, чтобы есть нездоровую еду!</p>
            </div>
            <img src="./assets/images/slider1.png" alt="" class="slider_image">
        </div>
    </div>
</header>

<main class="main">
    <section class="best-dishes">
        <h1 class="best-dishes_heading">Наши лучшие блюда</h1>
        <main class="best-dishes_body">
            <div class="best-dishes_item card">
                <img src="./assets/images/best1.png" alt="" class="best-dishes_item-image card_image">
                <h4 class="best-dishes_item-heading card_heading">Креветки в чесночном соусе с рисом</h4>
                <div class="best-dishes_item-description card_description">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!</div>
                <button class="card_button button" data-id="1">В корзину</button>
            </div>
            <div class="best-dishes_item card">
                <img src="./assets/images/best2.png" alt="" class="best-dishes_item-image card_image">
                <h4 class="best-dishes_item-heading card_heading">Лосось с овощами на пару</h4>
                <div class="best-dishes_item-description card_description">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!</div>
                <button class="card_button button" data-id="2">В корзину</button>
            </div>
            <div class="best-dishes_item card">
                <img src="./assets/images/best3.png" alt="" class="best-dishes_item-image card_image">
                <h4 class="best-dishes_item-heading card_heading">Греческий салат</h4>
                <div class="best-dishes_item-description card_description">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!</div>
                <button class="card_button button">В корзину</button>

            </div>
            <div class="best-dishes_item card">
                <img src="./assets/images/best4.png" alt="" class="best-dishes_item-image card_image">
                <h4 class="best-dishes_item-heading card_heading">Говяжий стейк с овощами на гриле</h4>
                <div class="best-dishes_item-description card_description">Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!</div>
                <button class="card_button button">В корзину</button>
            </div>
        </main>
        <a href="./catalog.php" class="best-dishes_button button">Смотреть все</a>
    </section>
    <section class="description">
        <article class="description_item description_item--left">
            <img src="./assets/images/interior.png" alt="" class="description_image">
            <div class="description_block">
                <p class="description_text">В нашем кафе вы можете насладиться уютной атмосферой и дружелюбным
                    обслуживанием, если решите посетить нас лично. Мы стремимся создать идеальное место, где вы
                    сможете расслабиться и насладиться вкусной едой в приятной компании.</p>
            </div>
        </article>
        <article class="description_item description_item--right">
            <img src="./assets/images/kitchen.png" alt="" class="description_image">
            <div class="description_block">
                <p class="description_text">Наше кафе специализируется на приготовлении питательных и вкусных блюд,
                    которые подходят для различных диетических потребностей. Мы тщательно выбираем только
                    высококачественные продукты и следим за тем, чтобы они были свежими и полезными.</p>
            </div>
        </article>
    </section>
    <section class="reserve">
        <form action="" class="reserve_form">
            <h1>Зарезервировать стол</h1>
            <fieldset class="reserve_input-block">
                <select required name="table" id="" class="reserve_select">
                    <option selected>Выберете стол</option>
                </select>
                <input required type="text" name="name" placeholder="Ваше имя" class="reserve_input">
                <input required type="text" name="number" placeholder="Ваш номер телефона" class="reserve_input">
                <input required type="date" name="date" min="<?= date("Y-m-d")?>" placeholder="Дата визита" class="reserve_input">
                <input required type="time" name="time" placeholder="Время визита" class="reserve_input">
            </fieldset>
            <fieldset class="reserve_submit-block">
                <button class="reserve_button button" name="add_reserve" type="submit">Зарезервировать</button>
            </fieldset>
        </form>
    </section>
</main>
<?php
require_once("./assets/components/footer.php");
?>
</body>

</html>