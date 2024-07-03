<?php get_header(); ?>

<?
    $data = get_field('ib1');
?>

<main class="main mb-indent">
	<div class="container">
		<div class="main__row">
			<div class="main__column">
				<div class="main__under-title under-title">
                    <? if (!empty($data['under-title-icon'])): ?>
					<div class="under-title__icon">
                        <?= wp_get_attachment_image($data['under-title-icon'], 'full', false, ['loading' => 'lazy']); ?>
					</div>
                    <? endif ?>
					<span><?= $data['under-title'] ?></span>
				</div>
				<h1 class="main__title"><?= $data['title'] ?></h1>
				<div class="main__text"><?= $data['text'] ?></div>

				<form class="main__form">
                    <input type="hidden" name="form" value="Получить расчет">
					<div class="main__form-title"><?= $data['form-title'] ?></div>
					<div class="form-field">
						<input type="text" class="input required" name="name" placeholder="Введите ваше имя">
					</div>
					<div class="form-field">
						<input type="tel" class="input required" name="phone" placeholder="Введите ваш телефон">
					</div>
					<button type="submit" class="main__form-btn send-form btn btn--primary">
						<img src="<?=PATH_THEME?>img/svg/document-icon.svg" loading="lazy" alt="" width="16" height="20">
						<span>Получить расчет</span>
					</button>
				</form>
			</div>
			<div class="main__column">
				<div class="main__img-box">
                    <? if (!empty($data['photo'])): ?>
                    <?= wp_get_attachment_image($data['photo'], 'large', false, ['class' => 'main__img', 'loading' => 'lazy']); ?>
                    <? endif ?>

					<div class="main__doctor-info doctor-info">
						<div class="doctor-info__post"><?= $data['doctor']['post'] ?></div>
						<div class="doctor-info__name"><?= $data['doctor']['name'] ?></div>

                        <? if (!empty($data['doctor']['list'])): ?>
						<div class="doctor-info__items">
                            <? foreach ($data['doctor']['list'] as $li): ?>
							<div class="doctor-info__item">
                                <?= wp_get_attachment_image($li['icon'], 'full', false, ['class' => 'doctor-info__item-icon', 'loading' => 'lazy']); ?>
								<span class="doctor-info__item-txt"><?= $li['text'] ?></span>
							</div>
                            <? endforeach ?>
						</div>
                        <? endif ?>
                        
					</div>
				</div>

				<div class="main__mobile-btn btn btn--primary" data-modal="modal-order">
					<img src="<?=PATH_THEME?>img/svg/document-icon.svg" loading="lazy" alt="" width="16" height="20">
					<span>Получить расчет</span>
				</div>
			</div>
		</div>
	</div>
</main>

<?
    $data = get_field('braces');
?>
<? if (!empty($data) && $data['show']): ?>
<section class="braces p-indent">
	<div class="container">
		<div class="braces__title s-title s-title--center">
			<h2><?= $data['title'] ?></h2>
		</div>

        <? if (!empty($data['list'])): ?>
		<ul class="braces__head">
            <? foreach ($data['list'] as $li): ?>
			<li class="braces__head-item"><?= $li['text'] ?></li>
            <? endforeach ?>
		</ul>
        <? endif ?>

		<div class="braces__items">
			<div class="braces__item">
				<div class="braces__img-box">
                    <? if (!empty($data['pl-1'])): ?>
					<div class="braces__pl-1 pl-text">
                        <?= wp_get_attachment_image($data['pl-1']['icon'], 'full', false, ['loading' => 'lazy']); ?>
						<span><?= $data['pl-1']['text'] ?></span>
					</div>
                    <? endif ?>
                    <?= wp_get_attachment_image($data['photo-1'], 'large', false, ['class' => 'braces__img img1', 'loading' => 'lazy']); ?>
				</div>
			</div>
			<div class="braces__item">
				<div class="braces__img-box">
					<?= wp_get_attachment_image($data['photo-2'], 'large', false, ['class' => 'braces__img img2', 'loading' => 'lazy']); ?>
				</div>
			</div>
			<div class="braces__item">
				<div class="braces__img-box">
                    <? if (!empty($data['pl-3'])): ?>
					<div class="braces__pl-3 pl-text">
                        <?= wp_get_attachment_image($data['pl-3']['icon'], 'full', false, ['loading' => 'lazy']); ?>
						<span><?= $data['pl-3']['text'] ?></span>
					</div>
                    <? endif ?>
					<?= wp_get_attachment_image($data['photo-3'], 'large', false, ['class' => 'braces__img img3', 'loading' => 'lazy']); ?>
				</div>
			</div>
		</div>
        
        <? if (!empty($data['pl-2'])): ?>
        <div class="braces__pl-2 pl-text">
            <?= wp_get_attachment_image($data['pl-2']['icon'], 'full', false, ['loading' => 'lazy']); ?>
            <span><?= $data['pl-2']['text'] ?></span>
        </div>
        <? endif ?>
	</div>
</section>
<? endif ?>

<?
    $data = get_field('works');
?>
<? if (!empty($data) && $data['show']): ?>
<section class="our-works m-indent">
	<div class="our-works__inner">
		<div class="container">
			
			<div class="our-works__head">

                <? if (!empty($data['under-title'])): ?>
				<div class="our-works__under-title under-title">
					<div class="under-title__icon">
                        <?= wp_get_attachment_image($data['under-title']['icon'], 'full', false, ['class' => 'small-img', 'loading' => 'lazy']); ?>
					</div>
					<span><?= $data['under-title']['text'] ?></span>
				</div>
                <? endif ?>
				
				<div class="our-works__title s-title s-title--center">
					<h2><?= $data['title'] ?></h2>
				</div>
			</div>

			<div class="our-works__slider our-works-slider">
                <? if (count($data['items']) > 1): ?>
				<div class="swiper-arrows-prev">
					<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow"></use></svg>
				</div>
				<div class="swiper-arrows-next">
					<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow"></use></svg>
				</div>
                <? endif ?>
                
				<div class="swiper our-works-slider__items">
					<div class="swiper-wrapper">
						
                        <? if (!empty($data['items'])): ?>
                        <? $i=0; ?>
                        <? foreach ($data['items'] as $item): ?>
						<div class="swiper-slide our-works-slider__item">
							
							<div class="our-works-slider__row">

								<div class="our-works-slider__column">
									<div class="our-works-slider__img-box">
										<div class="our-works-slider__term">
											<div class="our-works-slider__term-icon-box">
												<img class="our-works-slider__term-icon" src="<?=PATH_THEME?>img/e-note.webp" loading="lazy" alt="" width="46" height="46">
											</div>
											<div class="our-works-slider__term-txt">Срок лечения : <?= $item['term'] ?></div>
										</div>
                                        <?= wp_get_attachment_image($item['photo'], 'large', false, ['class' => 'our-works-slider__img', 'loading' => 'lazy']); ?>
										<div class="swiper-lazy-preloader"></div>
									</div>

									<div class="our-works-slider__text">
										<div class="our-works-slider__title"><?= $item['title'] ?></div>
										<div class="our-works-slider__desc"><?= $item['text'] ?></div>
									</div>
									
								</div>

								<div class="our-works-slider__column">
									<div class="our-works-slider__compare">
										<div class="our-works-slider__compare-before">
											<div class="our-works-slider__compare-pl">До</div>
                                            <?= wp_get_attachment_image($item['photo-before'], 'large', false, ['class' => 'our-works-slider__compare-img', 'loading' => 'lazy']); ?>
										</div>
										<div class="our-works-slider__compare-after">
											<div class="our-works-slider__compare-pl primary">После</div>
                                            <?= wp_get_attachment_image($item['photo-after'], 'large', false, ['class' => 'our-works-slider__compare-img', 'loading' => 'lazy']); ?>
										</div>
									</div>

									<div class="our-works-slider__bottom">

                                        <? if (!empty($item['modal']['show'])): ?>
										<div class="our-works-slider__btn btn btn--primary" data-modal="modal-work-<?= $i ?>">Подробнее</div>
                                        <? endif ?>

										<a class="our-works-slider__whatsapp" target="_blank" href="https://wa.me/+74952481815">
											<span class="our-works-slider__whatsapp-txt">Написать в WhatsApp</span>
											<span class="our-works-slider__whatsapp-icon">
												<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#whatsapp"></use></svg>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
                        <? $i++ ?>
                        <? endforeach ?>
                        <? endif ?>
						
					</div>
				</div>

				<div class="our-works-slider__pagination">
					<div class="swiper-pagination"></div>
				</div>
			</div>
			
		</div>
	</div>

    <? if (!empty($data['items'])): ?>
    <? $i=0; ?>
    <? foreach ($data['items'] as $item): ?>
    <? $modal = $item['modal'] ?>
	<div class="modal modal-work" id="modal-work-<?= $i ?>">
		<div class="modal__wrapper">
			<div class="modal__close" data-modal-close="">
				<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#cross"></use></svg>
			</div>
			<div class="modal__content">

				<div class="modal-work__results">
					<div class="modal-work__results-column">

                        <? if (!empty($modal['photo'])): ?>
						<div class="modal-work__results-img-box">
							<div class="modal-work__pl primary">Результат</div>
                            <?= wp_get_attachment_image($modal['photo'], 'large', false, ['class' => 'modal-work__results-img', 'loading' => 'lazy']); ?>
						</div>
                        <? endif ?>

						<div class="modal-work__termbox">
							<div class="modal-work__subtitle">Срок лечения:</div>
							<div class="modal-work__text"><?= $modal['term'] ?></div>
						</div>
					</div>
					<div class="modal-work__results-column">
						<div class="modal-work__head" data-move-el="[{'bp-max': 768, 'index': 0, 'target': '#modal-work-1 .modal-work__results'}]">

                            <? if (!empty($data['under-title'])): ?>
                            <div class="our-works__under-title under-title">
                                <div class="under-title__icon">
                                    <?= wp_get_attachment_image($data['under-title']['icon'], 'full', false, ['class' => 'small-img', 'loading' => 'lazy']); ?>
                                </div>
                                <span><?= $data['under-title']['text'] ?></span>
                            </div>
                            <? endif ?>
							
							<div class="modal-work__title s-title">
								<h2><?= $modal['title'] ?></h2>
							</div>
						</div>
                        
                        <? if (!empty($modal['infoblocks'])): ?>
                        <? foreach ($modal['infoblocks'] as $infoblock): ?>
						<div class="modal-work__infobox">
							<div class="modal-work__subtitle"><?= $infoblock['title'] ?></div>
							<div class="modal-work__text"><?= $infoblock['text'] ?></div>
						</div>
                        <? endforeach ?>
                        <? endif ?>
                        
					</div>
				</div>
                
                <? if (!empty($modal['process-show'])): ?>
				<div class="modal-work__process">
					<div class="modal-work__title s-title s-title--center">
						<h2>Процесс лечения</h2>
					</div>

					<div class="modal-work__process-head">
                        <? if (!empty($modal['photo-before'])): ?>
						<div class="modal-work__process-before">
							<div class="modal-work__pl">До</div>
                            <?= wp_get_attachment_image($modal['photo-before'], 'large', false, ['class' => 'modal-work__process-before-img', 'loading' => 'lazy']); ?>
						</div>
                        <? endif ?>

                        <? foreach ($modal['process'] as $el): ?>
                        <div class="modal-work__process-compare">
                            <div class="modal-work__subtitle"><?= $el['title'] ?></div>

                            <?
                                $has_mob_img = !empty($el['photo-mob']);
                                $has_mob_img_class = $has_mob_img ? 'modal-work__has-img-mob' : '';
                            ?>
                            
                            <?= wp_get_attachment_image($el['photo'], 'large', false, ['class' => 'modal-work__process-compare-img' . ' ' . $has_mob_img_class, 'loading' => 'lazy']); ?>
                            <? if ($has_mob_img): ?>
                                <?= wp_get_attachment_image($el['photo-mob'], 'large', false, ['class' => 'modal-work__process-compare-img modal-work__img-mob', 'loading' => 'lazy']); ?>
                            <? endif ?>
                        </div>
                        <? break ?>
                        <? endforeach ?>
                        
					</div>
                    
                    <? $i=0; ?>
                    <? foreach ($modal['process'] as $el): ?>
                    <? $i++ ?>
                    <? if ($i == 1) continue ?>
					<div class="modal-work__process-item">
						<div class="modal-work__subtitle"><?= $el['title'] ?></div>

                        <?
                            $has_mob_img = !empty($el['photo-mob']);
                            $has_mob_img_class = $has_mob_img ? 'modal-work__has-img-mob' : '';
                        ?>
                        
                        <?= wp_get_attachment_image($el['photo'], 'large', false, ['class' => 'modal-work__process-item-img' . ' ' . $has_mob_img_class, 'loading' => 'lazy']); ?>
                        <? if ($has_mob_img): ?>
                            <?= wp_get_attachment_image($el['photo-mob'], 'large', false, ['class' => 'modal-work__process-item-img modal-work__img-mob', 'loading' => 'lazy']); ?>
                        <? endif ?>
					</div>
                    <? endforeach ?>

				</div>
                <? endif ?>

			</div>
		</div>
	</div>
    <? $i++ ?>
    <? endforeach ?>
    <? endif ?>
	
</section>
<? endif ?>

<?
    $data = get_field('quiz');
?>
<? if (!empty($data) && $data['show']): ?>
<section class="quiz-section m-indent-2x">
	<div class="quiz-section__inner">
		<div class="container">

			<div class="quiz-section__head">
                <? if (!empty($data['under-title'])): ?>
				<div class="quiz-section__under-title under-title">
					<div class="under-title__icon">
                        <?= wp_get_attachment_image($data['under-title']['icon'], 'full', false, ['class' => 'small-img', 'loading' => 'lazy']); ?>
					</div>
					<span><?= $data['under-title']['text'] ?></span>
				</div>
                <? endif ?>
			
				<div class="quiz-section__title s-title s-title--center">
					<h2><?= $data['title'] ?></h2>
				</div>
			</div>

			<div class="quiz">
				<div class="quiz__progress">
					<div class="quiz__progress-item active">
						<div class="quiz__progress-step">1</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">2</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">3</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">4</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">5</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">6</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">7</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">8</div>
					</div>
					<div class="quiz__progress-item">
						<div class="quiz__progress-step">9</div>
					</div>
				</div>

				<div class="quiz__inner">

					<form class="quiz__form" enctype="multipart/form-data">

						<div class="quiz__form-item active" data-block="1">

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Для кого подбираете лечение ?</div>
								</div>

								<div class="quiz__options quiz__options--v1">
									<div class="quiz__option active">
										<div class="quiz__option-value">Ребенок от 6 до 13 лет</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Подросток с 14 до 17 лет</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Взрослый</div>
									</div>

									<input type="hidden" name="quiz-step-1" value="Ребенок от 6 до 13 лет">
								</div>
							</div>

							<div class="quiz__bottom  quiz__bottom--v1">
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="2">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> <span class="quiz__step-number">1</span> из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="2">

							<div class="quiz__step-nav"><strong>Шаг</strong> 2 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Какая у вас проблема с прикусом ?</div>
								</div>

								<div class="quiz__options">
									<div class="quiz__option quiz__option--v1 active">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus1.webp" loading="lazy" alt="" width="128" height="91">
										<div class="quiz__option-value">Открытый прикус, зубы плохо смыкаются спереди</div>
									</div>
									<div class="quiz__option quiz__option--v1">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus2.webp" loading="lazy" alt="" width="128" height="91">
										<div class="quiz__option-value">Перекрестный <br>прикус</div>
									</div>
									<div class="quiz__option quiz__option--v1">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus3.webp" loading="lazy" alt="" width="128" height="90">
										<div class="quiz__option-value">Скученность, зубы слишком плотно расположены</div>
									</div>
									<div class="quiz__option quiz__option--v1">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus4.webp" loading="lazy" alt="" width="128" height="90">
										<div class="quiz__option-value">Промежутки между зубами</div>
									</div>
									<div class="quiz__option quiz__option--v1">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus5.webp" loading="lazy" alt="" width="128" height="90">
										<div class="quiz__option-value">Глубокий, верхний ряд слишком выступает вперед</div>
									</div>
									<div class="quiz__option quiz__option--v1">
										<img class="quiz__option-img" src="<?=PATH_THEME?>img/pricus6.webp" loading="lazy" alt="" width="128" height="90">
										<div class="quiz__option-value">Обратный, нижний ряд впереди верхнего</div>
									</div>

									<input type="hidden" name="quiz-step-2" value="Открытый прикус, зубы плохо смыкаются спереди">
								</div>
							</div>

							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="1">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="3">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> <span class="quiz__step-number">2</span> из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="3">

							<div class="quiz__step-nav"><strong>Шаг</strong> 3 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Были ли вы ранее у врача-ортодонта?</div>
								</div>
							
								<div class="quiz__options quiz__options--v1">
									<div class="quiz__option active">
										<div class="quiz__option-value">Да, мне назначили брекеты</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Да, мне назначили элайнеры</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Нет, не был</div>
									</div>
							
									<input type="hidden" name="quiz-step-3" value="Да, мне назначили брекеты">
								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="2">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="4">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> <span class="quiz__step-number">3</span> из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="4">

							<div class="quiz__step-nav"><strong>Шаг</strong> 4 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Проходили ли ранее ортодонтическое лечение?</div>
								</div>
							
								<div class="quiz__options">
									<div class="quiz__option active">
										<div class="quiz__option-value">Да</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Нет</div>
									</div>
							
									<input type="hidden" name="quiz-step-4" value="Да">
								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="3">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="5">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> 4 из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="5">

							<div class="quiz__step-nav"><strong>Шаг</strong> 5 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Прорезались ли у вас зубы мудрости ?</div>
								</div>
							
								<div class="quiz__options quiz__options--v1">
									<div class="quiz__option active">
										<div class="quiz__option-value">Да</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Нет</div>
									</div>
									<div class="quiz__option">
										<div class="quiz__option-value">Не знаю</div>
									</div>
							
									<input type="hidden" name="quiz-step-5" value="Да">
								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="4">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="6">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> 5 из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="6">

							<div class="quiz__step-nav"><strong>Шаг</strong> 6 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Удаляли ли вы зубы мудрости?</div>
								</div>
							
								<div class="quiz__options quiz__options--v2">
									<div class="quiz__option quiz__option--v2 active">
										<div class="quiz__option-value">Нет</div>
									</div>
									<div class="quiz__option quiz__option--v2">
										<div class="quiz__option-value">1</div>
									</div>
									<div class="quiz__option quiz__option--v2">
										<div class="quiz__option-value">2</div>
									</div>
									<div class="quiz__option quiz__option--v2">
										<div class="quiz__option-value">3</div>
									</div>
									<div class="quiz__option quiz__option--v2">
										<div class="quiz__option-value">4</div>
									</div>
							
									<input type="hidden" name="quiz-step-6" value="Нет">
								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="5">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="7">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> 6 из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="7">

							<div class="quiz__step-nav"><strong>Шаг</strong> 7 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">По желанию, сделайте фотографию ваших зубов крупно в 3-х разных</div>
								</div>
							
								<div class="quiz__options quiz__options--v3">
									<div class="quiz__no-required">Необязательно</div>
									
									<label class="file-drop-zone" for="quiz-file">
										<input class="file-drop-zone__input" type="file" id="quiz-file" name="quiz-step-7[]" multiple="">
										<img class="file-drop-zone__img" src="<?=PATH_THEME?>img/svg/file.svg" loading="lazy" alt="File" width="25" height="31">
										<div class="file-drop-zone__title">Нажмите, чтобы загрузить файл</div>
										<div class="file-drop-zone__txt">Или перетяните его из папки в это поле</div>
									</label>

								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="6">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="8">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> 7 из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="8">

							<div class="quiz__step-nav"><strong>Шаг</strong> 8 из 9</div>

							<div class="quiz__wrapper">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Любые дополнительные комментарии</div>
								</div>
								
								<div class="quiz__options quiz__options--v3">
									<div class="quiz__no-required">Необязательно</div>
									<textarea class="textarea" name="quiz-step-8" placeholder="Напишите текст"></textarea>
								</div>
							</div>
						
							<div class="quiz__bottom">
								<div class="quiz__back quiz__tab" data-tab="7">
									<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow-back"></use></svg>
									<span>Назад</span>
								</div>
								<div class="quiz__next quiz__tab btn btn--primary" data-tab="9">Далее</div>
								<div class="quiz__step-nav"><strong>Шаг</strong> 8 из 9</div>
							</div>
						</div>

						<div class="quiz__form-item" data-block="9">

							<div class="quiz__wrapper quiz__finish-step">
								<div class="quiz__head">
									<div class="quiz__label">Узнайте за 1 минуту предварительное решение, подходит ли вам Star Smile?</div>
									<div class="quiz__title">Заполните форму и получите результат на&nbsp;мобильный</div>
								</div>
							
								<div class="quiz__options quiz__options--v4">
									<div class="form-field">
										<label for="quiz-step-9-name">Имя</label>
										<input class="input required" id="quiz-step-9-name" type="text" name="quiz-step-9-name" placeholder="Введите ваше имя">
									</div>
									<div class="form-field">
										<label for="quiz-step-9-phone">Телефон</label>
										<input class="input required" id="quiz-step-9-phone" type="tel" name="quiz-step-9-phone" placeholder="Введите ваш телефон">
									</div>
									
									<button type="submit" class="quiz__submit btn btn--primary">Отправить</button>

									<div class="quiz__policy checkbox-field">
										<input type="checkbox" name="policy" checked="" class="checkbox-field__input required">
										<div class="checkbox-field__box active"></div>
										<div class="checkbox-field__label">Я соглашаюсь на обработку персональных данных согласно <a href="https://policies.google.com/privacy" target="_blank">политике конфиденциальности</a></div>
									</div>
								</div>
							</div>
							
						</div>

						<div class="quiz__form-item" data-block="10">
							<div class="quiz__head quiz__success">
								<div class="quiz__title">Результаты почти у вас</div>
								<div class="quiz__label">В ближайшее время вам поступит сообщения с результатом на&nbsp;указанный номер</div>
							</div>
						</div>

					</form>

					<div class="quiz__konsult-form konsult-form">

                        <? if (!empty($data['doctor'])): ?>
						<div class="konsult-form__doctor">
                            <?= wp_get_attachment_image($data['doctor']['photo'], 'large', false, ['class' => 'konsult-form__doctor-img', 'loading' => 'lazy']); ?>
							<div class="konsult-form__doctor-cnt">
								<div class="konsult-form__doctor-post"><?= $data['doctor']['post'] ?></div>
								<div class="konsult-form__doctor-name"><?= $data['doctor']['name'] ?></div>
								<div class="konsult-form__doctor-desc"><?= $data['doctor']['desc'] ?></div>
							</div>
						</div>
                        <? endif ?>

						<form class="konsult-form__form">
							<div class="konsult-form__title">Понадобилась консультация ?</div>
							<div class="konsult-form__subtitle">Введите номер телефона и мы перезвоним в течение 9 минут</div>

                            <input type="hidden" name="form" value="Консультация">
							<input type="tel" name="phone" class="input required" placeholder="+7 (___) ___-__-__">
							<button type="submit" class="konsult-form__submit btn send-form btn--black">Записаться на консультацию</button>

							<div class="konsult-form__policy">Нажимая на кнопку, вы соглашаетесь на обработку <a href="https://policies.google.com/privacy" target="_blank">персональных данных</a></div>
						</form>
					</div>

				</div>

			</div>
			
		</div>
	</div>
</section>
<? endif ?>

<?php get_footer(); ?>