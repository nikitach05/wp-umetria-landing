<!DOCTYPE html><html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php wp_head(); ?>

    <?php wp_site_icon(); ?>
    
    <link rel="stylesheet" href="<?= PATH_THEME . 'styles/main.min.css' ?>">
    <style>html{margin-top: 0 !important}</style>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();
	for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
	k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(97788233, "init", {
		clickmap:true,
		trackLinks:true,
		accurateTrackBounce:true,
		webvisor:true
	});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/97788233" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

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

			<?
				$contacts = get_field('contacts', 10);
			?>
			<div class="header__center">
				<div class="header__contacts" data-move-el="[{'bp-max': 992, 'index': 1, 'target': '.header__mobile-menu'}]">
					<div class="header__contacts-item">
						<div class="header__contacts-icon" data-move-el="[{'bp-max': 992, 'index': 0, 'target': '[data-contacts-text-1]'}]">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#loc"></use></svg>
						</div>
						<div class="header__contacts-text">
							<div class="header__contacts-text-large" data-contacts-text-1=""><span><?= $contacts['address']['text-1'] ?></span></div>
							<div class="header__contacts-text-small"><?= $contacts['address']['text-2'] ?></div>
						</div>
					</div>
					<div class="header__contacts-item">
						<div class="header__contacts-icon" data-move-el="[{'bp-max': 992, 'index': 0, 'target': '[data-contacts-text-2]'}]">
							<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#phone"></use></svg>
						</div>
						<div class="header__contacts-text">
							<a class="header__contacts-text-large" data-contacts-text-2="" href="tel:<?= $contacts['phone'] ?>"><span><?= $contacts['phone'] ?></span></a>
							<div class="header__contacts-text-small"><?= $contacts['time-work'] ?></div>
						</div>
					</div>
				</div>
			</div>

			<div class="header__right">
				<div class="header__circles">

					<? if (!empty($contacts['telegram'])): ?>
					<a class="header__circles-item" target="_blank" href="<?= $contacts['telegram'] ?>">
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#telegram"></use></svg>
					</a>
					<? endif ?>

					<? if (!empty($contacts['whatsapp'])): ?>
					<a class="header__circles-item" target="_blank" href="<?= $contacts['whatsapp'] ?>">
						<svg class="whatsapp"><use href="<?=PATH_THEME?>img/sprites/sprite.svg#whatsapp"></use></svg>
					</a>
					<? endif ?>
				</div>
				<div class="header__btn btn btn--primary" data-modal="modal-order" data-move-el="[{'bp-max': 992, 'index': 2, 'target': '.header__mobile-menu'}]">Записаться</div>
			</div>

			<div class="header__mobile-menu">
				<div class="header__messangers" data-move-el="[{'bp-max': 992, 'index': 3, 'target': '.header__mobile-menu'}]">
					<? if (!empty($contacts['whatsapp'])): ?>
					<a href="<?= $contacts['whatsapp'] ?>" target="_blank" class="header__messangers-item">
						<span class="header__messangers-txt">Написать в WhatsApp</span>
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#whatsapp"></use></svg>
					</a>
					<? endif ?>

					<? if (!empty($contacts['telegram'])): ?>
					<a href="<?= $contacts['telegram'] ?>" target="_blank" class="header__messangers-item">
						<span class="header__messangers-txt">Написать в Telegram</span>
						<svg><use href="<?=PATH_THEME?>img/sprites/sprite.svg#telegram"></use></svg>
					</a>
					<? endif ?>

				</div>
			</div>
		</div>
	</div>
</header>