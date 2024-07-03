<div class="modal modal-success" id="modal-success">
   <div class="modal__wrapper">
       <div class="modal__close" data-modal-close="">
        <svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#cross"></use></svg>
       </div>
       <div class="modal__content">
        <div class="modal-success__title">Заявка отправлена</div>
        <div class="modal-success__text">В ближайшее время вам поступит звонок от нашего специалиста</div>
       </div>
   </div>
</div>

<div class="modal modal-order" id="modal-order">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close="">
            <svg>
                <use href="<?=PATH_THEME?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="modal-order__content">
                <div class="modal-order__title">Получите ответы на все свои вопросы <strong>за 3 минуты</strong></div>
                <div class="modal-order__subtitle">Закажите звонок, и мы перезвоним вам через 9 секунд!</div>

                <form class="modal-order__form order-form">
                    <input type="hidden" name="form" value="Обратный звонок">
                    
                    <div class="order-form__title">Звонок бесплатный</div>
                    <div class="form-field">
                        <label for="order-form__name">Имя</label>
                        <input type="text" name="name" class="input required" id="order-form__name" placeholder="Введите ваше имя">
                    </div>
                    <div class="form-field">
                        <label for="order-form__phone">Телефон</label>
                        <input type="tel" name="phone" class="input required" id="order-form__phone" placeholder="Введите ваш телефон">
                    </div>
                    <button class="order-form__submit send-form btn btn--primary">Жду звонка</button>
                    <div class="order-form__policy">Нажимая на кнопку, вы соглашаетесь на обработку <a href="https://policies.google.com/privacy" target="_blank">персональных&nbsp;данных</a></div>
                </form>
            </div>

            <img class="modal-order__img" src="<?=PATH_THEME?>img/hero.webp" loading="lazy" alt="" width="568" height="744">
        </div>
    </div>
</div>