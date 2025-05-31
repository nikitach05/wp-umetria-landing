<?php
$home_page_id = 10;
?>

<div class="modal modal-success" id="modal-success">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close="">
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
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
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="modal-order__content">
                <div class="modal-order__title">Получите ответы на все свои вопросы <strong>за 3 минуты</strong></div>
                <div class="modal-order__subtitle">Закажите звонок, и мы перезвоним Вам!</div>

                <form class="modal-order__form order-form">
                    <input type="hidden" name="recaptchaResponse" class="recaptcha-response">
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

                    <div class="form-agreement checkbox-field">
                        <input type="checkbox" name="policy" checked class="checkbox-field__input required">
                        <div class="checkbox-field__box active"></div>
                        <div class="checkbox-field__label"><?= get_field('form-agreement', 10) ?></div>
                    </div>

                </form>
            </div>

            <img class="modal-order__img" src="<?= PATH_THEME ?>img/hero.webp" loading="lazy" alt="" width="568" height="744">
        </div>
    </div>
</div>

<div class="modal modal-order" id="modal-order-2">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close="">
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="modal-order__title" style="position: relative; z-index: 100; max-width: 69rem;">Оставьте свои данные, чтобы рассчитать стоимость <strong>брекет-системы</strong></div>
            <div class="modal-order__content">
                <div class="modal-order__subtitle">Закажите звонок, и мы перезвоним Вам!</div>

                <form class="modal-order__form order-form">
                    <input type="hidden" name="recaptchaResponse" class="recaptcha-response">
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

                    <div class="form-agreement checkbox-field">
                        <input type="checkbox" name="policy" checked class="checkbox-field__input required">
                        <div class="checkbox-field__box active"></div>
                        <div class="checkbox-field__label"><?= get_field('form-agreement', 10) ?></div>
                    </div>
                </form>
            </div>

            <img class="modal-order__img" src="<?= PATH_THEME ?>img/hero.webp" loading="lazy" alt="" width="568" height="744">
        </div>
    </div>
</div>

<?php
$modals = get_field('modals', 10);
$policy = $modals['policy'];
?>
<div class="modal personal-modal" id="policy-modal">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close>
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="personal-modal__title"><?= $policy['title'] ?></div>
            <div class="personal-modal__content">
                <?= $policy['text'] ?>
            </div>
        </div>
    </div>
</div>

<?php
$personal = $modals['personal'];
?>
<div class="modal personal-modal" id="personal-modal">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close>
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="personal-modal__title"><?= $personal['title'] ?></div>
            <div class="personal-modal__content">
                <?= $personal['text'] ?>
            </div>
        </div>
    </div>
</div>

<?php
$cookies = $modals['cookies'];
?>
<div class="modal personal-modal" id="cookies-modal">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close>
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="personal-modal__title"><?= $cookies['title'] ?></div>
            <div class="personal-modal__content">
                <?= $cookies['text'] ?>
            </div>
        </div>
    </div>
</div>

<?php
$agreement = $modals['agreement'];
?>
<div class="modal personal-modal" id="agreement-modal">
    <div class="modal__wrapper">
        <div class="modal__close" data-modal-close>
            <svg>
                <use href="<?= PATH_THEME ?>img/sprites/sprite.svg#cross"></use>
            </svg>
        </div>
        <div class="modal__content">
            <div class="personal-modal__title"><?= $agreement['title'] ?></div>
            <div class="personal-modal__content">
                <?= $agreement['text'] ?>
            </div>
        </div>
    </div>
</div>