<!DOCTYPE html><html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php wp_head(); ?>

    <?php wp_site_icon(); ?>
    
    <link rel="stylesheet" href="<?= PATH_THEME . 'styles/main.min.css' ?>">
    <style>html{margin-top: 0 !important}</style>

</head>
<body>

<header class="header">
	<div class="header__container container">
		<div class="header__content">

			<div class="header__left">
				<a href="/" class="header__logo logo">
					<img src="<?=PATH_THEME?>img/svg/logo.svg" alt="Logo" width="241" height="40">
				</a>

				<div class="header__mobile-items">
					<div class="header__circles">
						<a href="tel:" class="header__circles-item">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#phone"></use></svg>
						</a>
						<div class="header__circles-item menu-toggle">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#gmb"></use></svg>
							<svg class="menu-toggle__close"><use href="<?=PATH_THEME?>img/sprites/sprite.svg#close"></use></svg>
						</div>
					</div>
				</div>
			</div>

			<div class="header__center">
				<div class="header__contacts" data-move-el="[{'bp-max': 992, 'index': 1, 'target': '.header__mobile-menu'}]">
					<div class="header__contacts-item">
						<div class="header__contacts-icon" data-move-el="[{'bp-max': 992, 'index': 0, 'target': '[data-contacts-text-1]'}]">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#loc"></use></svg>
						</div>
						<div class="header__contacts-text">
							<div class="header__contacts-text-large" data-contacts-text-1=""><span>БЦ “Станколит”</span></div>
							<div class="header__contacts-text-small">Складочная ул., 1, стр. 1, подъезд&nbsp;11</div>
						</div>
					</div>
					<div class="header__contacts-item">
						<div class="header__contacts-icon" data-move-el="[{'bp-max': 992, 'index': 0, 'target': '[data-contacts-text-2]'}]">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#phone"></use></svg>
						</div>
						<div class="header__contacts-text">
							<a class="header__contacts-text-large" data-contacts-text-2="" href="tel:+74952481815"><span>+7 (495) 248 18 15</span></a>
							<div class="header__contacts-text-small">Ежедневно с 10:00 до 21:00</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header__right">
				<div class="header__circles">
					<a class="header__circles-item" target="_blank" href="">
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#telegram"></use></svg>
					</a>
					<a class="header__circles-item" target="_blank" href="">
						<svg class="whatsapp"><use href="<?=PATH_THEME?>img/sprites/sprite.svg#whatsapp"></use></svg>
					</a>
				</div>
				<div class="header__btn btn btn--primary" data-modal="modal-order" data-move-el="[{'bp-max': 992, 'index': 2, 'target': '.header__mobile-menu'}]">Записаться</div>
			</div>

			<div class="header__mobile-menu">
				<div class="header__messangers" data-move-el="[{'bp-max': 992, 'index': 3, 'target': '.header__mobile-menu'}]">
					<a href="" target="_blank" class="header__messangers-item">
						<span class="header__messangers-txt">Написать в WhatsApp</span>
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#whatsapp"></use></svg>
					</a>
					<a href="" target="_blank" class="header__messangers-item">
						<span class="header__messangers-txt">Написать в Telegram</span>
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#telegram"></use></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>