<?php include "includes/modals.php" ?>

<?php
$cookies = get_field('cookies', 10);
$menu = get_field('bottom-menu', 10);
?>
<?php if (!empty($cookies)): ?>
	<div class="cookie-agreement">
		<div class="cookie-agreement__title"><?= $cookies['text'] ?></div>

		<div class="cookie-agreement__buttons">
			<div class="cookie-agreement__button"><?= $cookies['button'] ?></div>
			<a class="cookie-agreement__link" href="" data-modal="<?= $cookies['modal'] ?>" target="_blank"><?= $cookies['link-text'] ?></a>
		</div>
	</div>
<?php endif ?>

<footer class="footer">
	<div class="container">
		<div class="footer__inner">
			<div class="footer__strong-text">ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ, НЕОБХОДИМА КОНСУЛЬТАЦИЯ СПЕЦИАЛИСТА</div>
			<div class="footer__privacy">Все права защищены. Обращаем ваше внимание на то, что данный Интернет-сайт носит исключительно информационный характер и
				ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 Гражданского кодекса РФ.
			</div>

			<?php if (!empty($menu)): ?>
				<ul class="footer__menu">
					<?php foreach ($menu as $item): ?>
						<li class="footer__menu-item"><span class="footer__menu-link" data-modal="<?= $item['modal'] ?>"><?= $item['text'] ?></span></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>

			<div class="footer__copyright">© <?= date('Y') ?>, Цифровая стоматология «Umetria». Все права защищены</div>
		</div>
	</div>
</footer>

<script src="<?= PATH_THEME ?>js/vendor.min.js"></script>
<script src="<?= PATH_THEME ?>js/main.min.js"></script>
<script src="<?= PATH_THEME ?>js/forms.js"></script>

</body>

</html>