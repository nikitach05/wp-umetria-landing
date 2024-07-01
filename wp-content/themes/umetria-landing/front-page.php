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

<section class="braces p-indent">
	<div class="container">
		<div class="braces__title s-title s-title--center">
			<h2>Создаю красивые улыбки и&nbsp;исправляю любой прикус</h2>
		</div>
		<ul class="braces__head">
			<li class="braces__head-item">Улучшает эстетические параметры лица</li>
			<li class="braces__head-item">Выравнивает зубы по правильному смыканию</li>
			<li class="braces__head-item">Восстанавливает функциональный прикус</li>
		</ul>

		<div class="braces__items">
			<div class="braces__item">
				<div class="braces__img-box">
					<div class="braces__pl-1 pl-text">
						<img src="<?=PATH_THEME?>img/e-serp.webp" loading="lazy" alt="Heart" width="43" height="43">
						<span>Брекеты - это модно</span>
					</div>
					<img class="braces__img img1" src="<?=PATH_THEME?>img/photo1.webp" loading="lazy" alt="" width="466" height="578">
				</div>
			</div>
			<div class="braces__item">
				<div class="braces__img-box">
					<img class="braces__img img2" src="<?=PATH_THEME?>img/photo2.webp" loading="lazy" alt="" width="594" height="743">
				</div>
			</div>
			<div class="braces__item">
				<div class="braces__img-box">
					<div class="braces__pl-3 pl-text">
						<img src="<?=PATH_THEME?>img/e-bant.webp" loading="lazy" alt="Heart" width="44" height="43">
						<span>Брекеты - это красиво</span>
					</div>
					<img class="braces__img img3" src="<?=PATH_THEME?>img/photo3.webp" loading="lazy" alt="" width="466" height="556">
				</div>
			</div>
		</div>

		<div class="braces__pl-2 pl-text">
			<img src="<?=PATH_THEME?>img/e-heart.webp" loading="lazy" alt="Heart" width="41" height="41">
			<span>Брекеты - это здоровье</span>
		</div>
	</div>
</section>

<section class="our-works m-indent">
	<div class="our-works__inner">
		<div class="container">
			
			<div class="our-works__head">
				<div class="our-works__under-title under-title">
					<div class="under-title__icon">
						<img src="<?=PATH_THEME?>img/e-book.webp" loading="lazy" alt="" width="45" height="46">
					</div>
					<span>Мои результаты</span>
				</div>
				
				<div class="our-works__title s-title s-title--center">
					<h2>Примеры ортодонтического лечения на японских брекет-системах</h2>
				</div>
			</div>

			<div class="our-works__slider our-works-slider">
				<div class="swiper-arrows-prev">
					<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow"></use></svg>
				</div>
				<div class="swiper-arrows-next">
					<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#arrow"></use></svg>
				</div>
				<div class="swiper our-works-slider__items">
					<div class="swiper-wrapper">
						
						<div class="swiper-slide our-works-slider__item">
							
							<div class="our-works-slider__row">

								<div class="our-works-slider__column">
									<div class="our-works-slider__img-box">
										<div class="our-works-slider__term">
											<div class="our-works-slider__term-icon-box">
												<img class="our-works-slider__term-icon" src="<?=PATH_THEME?>img/e-note.webp" loading="lazy" alt="" width="46" height="46">
											</div>
											<div class="our-works-slider__term-txt">Срок лечения : 17 месяцев</div>
										</div>
										<img class="our-works-slider__img" src="<?=PATH_THEME?>img/photo4.webp" loading="lazy" alt="" width="661" height="577">
										<div class="swiper-lazy-preloader"></div>
									</div>

									<div class="our-works-slider__text">
										<div class="our-works-slider__title">Причины обращения</div>
										<div class="our-works-slider__desc">Пациентка хотела улучшить эстетическую функцию, но главное условия без обточки эмали и чтобы зубы были естественные,
										выглядили натурально.</div>
									</div>
									
								</div>

								<div class="our-works-slider__column">
									<div class="our-works-slider__compare">
										<div class="our-works-slider__compare-before">
											<div class="our-works-slider__compare-pl">До</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo5.webp" loading="lazy" alt="" width="676" height="334">
										</div>
										<div class="our-works-slider__compare-after">
											<div class="our-works-slider__compare-pl primary">После</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo6.webp" loading="lazy" alt="" width="676" height="334">
										</div>
									</div>

									<div class="our-works-slider__bottom">
										<div class="our-works-slider__btn btn btn--primary" data-modal="modal-work-1">Подробнее</div>

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
						
						<div class="swiper-slide our-works-slider__item">
							
							<div class="our-works-slider__row">

								<div class="our-works-slider__column">
									<div class="our-works-slider__img-box">
										<div class="our-works-slider__term">
											<div class="our-works-slider__term-icon-box">
												<img class="our-works-slider__term-icon" src="<?=PATH_THEME?>img/e-note.webp" loading="lazy" alt="" width="46" height="46">
											</div>
											<div class="our-works-slider__term-txt">Срок лечения : 17 месяцев</div>
										</div>
										<img class="our-works-slider__img" src="<?=PATH_THEME?>img/photo4.webp" loading="lazy" alt="" width="661" height="577">
										<div class="swiper-lazy-preloader"></div>
									</div>

									<div class="our-works-slider__text">
										<div class="our-works-slider__title">Причины обращения</div>
										<div class="our-works-slider__desc">Пациентка хотела улучшить эстетическую функцию, но главное условия без обточки эмали и чтобы зубы были естественные,
										выглядили натурально.</div>
									</div>
									
								</div>

								<div class="our-works-slider__column">
									<div class="our-works-slider__compare">
										<div class="our-works-slider__compare-before">
											<div class="our-works-slider__compare-pl">До</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo5.webp" loading="lazy" alt="" width="676" height="334">
										</div>
										<div class="our-works-slider__compare-after">
											<div class="our-works-slider__compare-pl primary">После</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo6.webp" loading="lazy" alt="" width="676" height="334">
										</div>
									</div>

									<div class="our-works-slider__bottom">
										<div class="our-works-slider__btn btn btn--primary" data-modal="modal-work-1">Подробнее</div>

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
						
						<div class="swiper-slide our-works-slider__item">
							
							<div class="our-works-slider__row">

								<div class="our-works-slider__column">
									<div class="our-works-slider__img-box">
										<div class="our-works-slider__term">
											<div class="our-works-slider__term-icon-box">
												<img class="our-works-slider__term-icon" src="<?=PATH_THEME?>img/e-note.webp" loading="lazy" alt="" width="46" height="46">
											</div>
											<div class="our-works-slider__term-txt">Срок лечения : 17 месяцев</div>
										</div>
										<img class="our-works-slider__img" src="<?=PATH_THEME?>img/photo4.webp" loading="lazy" alt="" width="661" height="577">
										<div class="swiper-lazy-preloader"></div>
									</div>

									<div class="our-works-slider__text">
										<div class="our-works-slider__title">Причины обращения</div>
										<div class="our-works-slider__desc">Пациентка хотела улучшить эстетическую функцию, но главное условия без обточки эмали и чтобы зубы были естественные,
										выглядили натурально.</div>
									</div>
									
								</div>

								<div class="our-works-slider__column">
									<div class="our-works-slider__compare">
										<div class="our-works-slider__compare-before">
											<div class="our-works-slider__compare-pl">До</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo5.webp" loading="lazy" alt="" width="676" height="334">
										</div>
										<div class="our-works-slider__compare-after">
											<div class="our-works-slider__compare-pl primary">После</div>
											<img class="our-works-slider__compare-img" src="<?=PATH_THEME?>img/photo6.webp" loading="lazy" alt="" width="676" height="334">
										</div>
									</div>

									<div class="our-works-slider__bottom">
										<div class="our-works-slider__btn btn btn--primary" data-modal="modal-work-1">Подробнее</div>

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
						
					</div>
				</div>

				<div class="our-works-slider__pagination">
					<div class="swiper-pagination"></div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="modal modal-work" id="modal-work-1">
		<div class="modal__wrapper">
			<div class="modal__close" data-modal-close="">
				<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#cross"></use></svg>
			</div>
			<div class="modal__content">

				<div class="modal-work__results">
					<div class="modal-work__results-column">
						<div class="modal-work__results-img-box">
							<div class="modal-work__pl primary">Результат</div>
							<img class="modal-work__results-img" src="<?=PATH_THEME?>img/photo7.webp" loading="lazy" alt="" width="566" height="636">
						</div>
						<div class="modal-work__termbox">
							<div class="modal-work__subtitle">Срок лечения:</div>
							<div class="modal-work__text">24 месяца 6 мини винтов и дуги МПД/MEAW (многопетлевая дуга) к брекет-системе</div>
						</div>
					</div>
					<div class="modal-work__results-column">
						<div class="modal-work__head" data-move-el="[{'bp-max': 768, 'index': 0, 'target': '#modal-work-1 .modal-work__results'}]">
							<div class="modal-work__under-title under-title">
								<div class="under-title__icon">
									<img src="<?=PATH_THEME?>img/e-book.webp" loading="lazy" alt="" width="45" height="46">
								</div>
								<span>Мои результаты</span>
							</div>
							
							<div class="modal-work__title s-title">
								<h2>Исправление перекрестного прикуса</h2>
							</div>
						</div>

						<div class="modal-work__infobox">
							<div class="modal-work__subtitle">Причины обращения</div>
							<div class="modal-work__text">Эстетическая жалоба, не ровные передние зубы и не правильный прикус. Ранее консультировалась в разных клиниках и у разных специалистов - рекомендация ТОЛЬКО ортогнатическая хирургия. Обошлись без операции, решила задачу японской брекет-системой</div>
						</div>

						<div class="modal-work__infobox">
							<div class="modal-work__subtitle">Что было сделано</div>
							<ul>
								<li>Гармонизация нижней трети лица за счет ротации нижней челюсти против часовой стрелки (авторотации нижней челюсти)</li>
								<li>Улучшение профиля лица за счет уменьшение нижней трети лица</li>
								<li>По прикусу устранено скучное положение зубов, правильное соотношения по клыкам и молярам и закрытие открытого прикуса (нормализация перекрытия во фронтальном отделе)</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="modal-work__process">
					<div class="modal-work__title s-title s-title--center">
						<h2>Процесс лечения</h2>
					</div>

					<div class="modal-work__process-head">
						<div class="modal-work__process-before">
							<div class="modal-work__pl">До</div>
							<img class="modal-work__process-before-img" src="<?=PATH_THEME?>img/photo8.webp" loading="lazy" alt="" width="423" height="580">
						</div>
						<div class="modal-work__process-compare">
							<div class="modal-work__subtitle">Cравнение z - угла</div>
							<img class="modal-work__process-compare-img modal-work__has-img-mob" src="<?=PATH_THEME?>img/photo9.webp" loading="lazy" alt="" width="1091" height="528">
							<img class="modal-work__process-compare-img modal-work__img-mob" src="<?=PATH_THEME?>img/photo9-mob.webp" loading="lazy" alt="" width="384" height="1020">
						</div>
					</div>

					<div class="modal-work__process-item">
						<div class="modal-work__subtitle">Внутриротовая фотография до и после лечения</div>
						<img class="modal-work__process-item-img" src="<?=PATH_THEME?>img/photo10.webp" loading="lazy" alt="" width="1592" height="775">
					</div>

					<div class="modal-work__process-item">
						<div class="modal-work__subtitle">Цефалометрический анализ ДО и ПОСЛЕ лечения</div>
						<img class="modal-work__process-item-img modal-work__has-img-mob" src="<?=PATH_THEME?>img/photo11.webp" loading="lazy" alt="" width="1592" height="728">
						<img class="modal-work__process-compare-img modal-work__img-mob" src="<?=PATH_THEME?>img/photo11-mob.webp" loading="lazy" alt="" width="384" height="960">
					</div>

					<div class="modal-work__process-item">
						<div class="modal-work__subtitle">Интразональные фото в середине процесса</div>
						<img class="modal-work__process-item-img modal-work__has-img-mob" src="<?=PATH_THEME?>img/photo12.webp" loading="lazy" alt="" width="1592" height="383">
						<img class="modal-work__process-compare-img modal-work__img-mob" src="<?=PATH_THEME?>img/photo12-mob.webp" loading="lazy" alt="" width="384" height="927">
					</div>

					<div class="modal-work__process-item">
						<div class="modal-work__subtitle">Наложение цеф</div>
						<img class="modal-work__process-item-img" src="<?=PATH_THEME?>img/photo13.webp" loading="lazy" alt="" width="1590" height="1016">
					</div>

					<div class="modal-work__process-item">
						<div class="modal-work__subtitle">Фото профиля лица до и после лечения</div>
						<img class="modal-work__process-item-img modal-work__has-img-mob" src="<?=PATH_THEME?>img/photo14.webp" loading="lazy" alt="" width="1564" height="979">
						<img class="modal-work__process-compare-img modal-work__img-mob" src="<?=PATH_THEME?>img/photo14-mob.webp" loading="lazy" alt="" width="384" height="989">
					</div>
				</div>

			</div>
		</div>
	</div>
	
</section>

<section class="quiz-section m-indent-2x">
	<div class="quiz-section__inner">
		<div class="container">

			<div class="quiz-section__head">
				<div class="quiz-section__under-title under-title">
					<div class="under-title__icon">
						<img src="<?=PATH_THEME?>img/e-book.webp" loading="lazy" alt="" width="45" height="46">
					</div>
					<span>Квиз</span>
				</div>
			
				<div class="quiz-section__title s-title s-title--center">
					<h2>Создаю красивые улыбки для пациентов с любым типом прикуса</h2>
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
										<div class="checkbox-field__label">Я соглашаюсь на обработку персональных данных согласно <a href="#" target="_blank">политике конфиденциальности</a></div>
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
						<div class="konsult-form__doctor">
							<img class="konsult-form__doctor-img" src="<?=PATH_THEME?>img/doctor.webp" loading="lazy" alt="" width="258" height="241">
							<div class="konsult-form__doctor-cnt">
								<div class="konsult-form__doctor-post">Врач - ортодонт</div>
								<div class="konsult-form__doctor-name">Евсеева Кристина Юрьевна</div>
								<div class="konsult-form__doctor-desc">Эксперт по работе с брекет-системами без&nbsp;прописи, без программирования (индивидуальная методика, без шаблонов)</div>
							</div>
						</div>

						<form class="konsult-form__form">
							<div class="konsult-form__title">Понадобилась консультация ?</div>
							<div class="konsult-form__subtitle">Введите номер телефона и мы перезвоним в течение 9 минут</div>

							<input type="tel" name="phone" class="input required" placeholder="+7 (___) ___-__-__">
							<button type="submit" class="konsult-form__submit btn send-form btn--black">Записаться на консультацию</button>

							<div class="konsult-form__policy">Нажимая на кнопку, вы соглашаетесь на обработку <a href="" target="_blank">персональных данных</a></div>
						</form>
					</div>

				</div>

			</div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>