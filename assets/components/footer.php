<footer id="footer" class="footer">
    <section class="footer_map">
        <!-- <div class="footer_map-block" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/47/nizhny-novgorod/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Нижний Новгород</a><a href="https://yandex.ru/maps/47/nizhny-novgorod/?ll=44.012387%2C56.310529&mode=whatshere&utm_medium=mapframe&utm_source=maps&whatshere%5Bpoint%5D=44.007744%2C56.312978&whatshere%5Bzoom%5D=16.18&z=16.18" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Белинского, 41 —
                Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=44.012387%2C56.310529&mode=whatshere&whatshere%5Bpoint%5D=44.007744%2C56.312978&whatshere%5Bzoom%5D=16.18&z=16.18" frameborder="" allowfullscreen="true" style="position:relative;"></iframe>
        </div> -->
        <div class="footer_map-shadow"></div>
    </section>
    <section class="footer_contacts contacts">
        <div class="contacts_item contacts_number">тел. <a href="tel:+78001001010" class="contacts_number-link">8
                (800) 100-10-10</a></div>
        <div class="contacts_item contacts_adress">г. Нижний Новгород,<br class="contacts_br" /> ул. Белинского, д.
            41</div>
        <div class="contacts_item contacts_soc">
            <a href="https://vk.com" class="caontacts_link">
                <img src="./assets/images/vk.png" alt="" class="contacts_image">
            </a>
            <a href="https://telegram.org/" class="caontacts_link">
                <img src="./assets/images/tg.png" alt="" class="contacts_image">
            </a>
            <a href="https://instagram.com" class="caontacts_link">
                <img src="./assets/images/insta.png" alt="" class="contacts_image">
            </a>
        </div>
    </section>
    <section class="footer_navigation">
        <img src="./assets/images/logo.png" alt="" class="footer_navigation-logo">
        <ul class="footer_navigation-ul navigation">
            <li class="navigation_block"><a href="./" class="navigation_link">Главная</a>
                <div class="navigation_line"></div>
            </li>
            <li class="navigation_block"><a href="./catalog.html" class="navigation_link">Каталог</a>
                <div class="navigation_line"></div>
            </li>
            <li class="navigation_block"><a href="#footer" class="navigation_link">Контакты</a>
                <div class="navigation_line"></div>
            </li>
        </ul>
    </section>
</footer>
<form class="basket">
    <h2 class="basket_heading">Корзина</h2>
    <button type="button" class="basket_close"></button>
    <fieldset class="basket_list basket_list--active">
        <div class="basket_list-body">
        </div>
        <footer class="basket_footer">

            <h2 class="basket_total">Итого:
                <div class="basket_total-summ"><span>0</span> ₽</div>
            </h2>
            <div class="basket_list-buttons">
                <button type="button" class="button basket_list-clear">Очистить корзину</button>
                <button type="button" class="button basket_list-next">Оформить заказ</button>
            </div>
        </footer>

    </fieldset>
    <fieldset class="basket_data">
        <div class="basket_form">
            <input required name="name" class="basket_form-input" placeholder="Ваше имя" type="text">
            <input required name="number" class="basket_form-input" placeholder="Ваш номер" type="text">

            <div class="basket_form-radio radio-button">
                <h4 class="radio-button_heading">Способ оплаты</h4>
                <div class="radio-button_block">

                    <label  class="radio-button_label radio-button_label--checked">
                        Наличными
                        <input required type="radio" class="radio-button_input" checked value="1" name="payment">
                    </label>
                    <label  class="radio-button_label ">
                        Банковской картой
                        <input required type="radio" class="radio-button_input" value="2" name="payment">
                    </label>
                    <label  class="radio-button_label ">
                        Системой быстрых платежей
                        <input required type="radio" class="radio-button_input" value="3" name="payment">
                    </label>
                </div>
            </div>

            <textarea required name="addres" class="basket_form-textarea" placeholder="Ваш адрес"></textarea>
            <button type="submit" class="button basket_list-submit">Оформить заказ</button>
        </div>
        <footer class="basket_footer">

            <h2 class="basket_total">Итого:
                <div class="basket_total-summ"><span>0</span> ₽</div>
            </h2>
            <div class="basket_list-buttons">
                <button type="button" class="button basket_list-prev">Назад</button>
            </div>
        </footer>
    </fieldset>
</form>

<script src="./assets/scripts/basket.js"></script>
<script src="./assets/scripts/main.js"></script>