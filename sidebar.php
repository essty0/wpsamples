<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage alexia
 * @since 1.0
 * @version 1.0
 */

?>

<div class="fitting">
	<header>
		<span class="h2"><i class="fas fa-calendar-alt"></i> Записаться на примерку</span>
	</header>
	<div class="fitting_result"></div>
	<form method="POST" class="fitting_form" id="fittingFormSide">
		<input type="text" name="name" class="fitting_form__name" id="name_side" placeholder="Имя*" required>
		<input type="number" class="fitting_form__phone" placeholder="Телефон*" id="phone_side" name="phone" required>
		<input type="text" placeholder="Комментарий" class="fitting_form__comment" name="comment" id="comment_side">
		<div class="field_block">
			<input type="checkbox" name="acceptTw" id="acceptTw">
			<label for="acceptTw" class="accept">Я согласна(ен) на обработку персональных данных</label>

		</div>
		<button class="fittingBtn" id="btn_side">Отправить</button>
	</form>
</div>

	<div class="filter-sidebar">
		<form action="/results/" method="GET">
			<div class="filter-field mobile">
				<header>
					<span class="h2"><i class="fas fa-feather"></i> Коллекции платьев</span>
				</header>
				<div class="collection-filter" id="202">Платья в стиле Гэтсби</div>
				<div class="collection-filter" id="241">Платья для выпускного</div>
				<div class="collection-filter" id="210">Утро невесты</div>
				<div class="collection-filter" id="83">Свадебные платья</div>
				
				<div class="collection-filter" id="230">Платья в стиле Оскар</div>
				<div class="collection-filter" id="66">Сверкающие платья</div>
				<div class="collection-filter" id="213">Платья для высоких</div>
				<div class="collection-filter" id="41">Пышные платья</div>
				<!--<div class="collection-filter" id="237">Платья для Хэллоуина</div>-->

			</div>
			<div class="filter-field">
				<header>
					<span class="h2"><i class="fas fa-signature"></i> Размеры платьев</span>
				</header>
				<div id="XXS" class="size-filter">XXS (38-40)</div>
				<div id="XS" class="size-filter">XS (40-42)</div>
				<div id="S" class="size-filter">S (42-44)</div>
				<div id="M" class="size-filter">M (44-46)</div>
				<div id="L" class="size-filter">L (46-48)</div>
				<div id="XL" class="size-filter">XL (48-50)</div>
				<div id="XXL" class="size-filter">XXL Plus size</div>

			</div>
			<div class="filter-field">
				<header>
					<span class="h2"><i class="fa fa-signal" aria-hidden="true"></i> Длина платьев</span>
				</header>
				<div class="length-filter" id="long">Длинные платья</div>
				<div class="length-filter" id="midi">Миди платья</div>
				<div class="length-filter" id="short">Короткие платья</div>
			</div>
			<div class="filter-field">
				<header>
					<span class="h2"><i class="fas fa-star-half-alt"></i> Цвета платьев</span>
				</header>
				<div id="188" class="color-filter">Бежевые платья</div>
				<div id="5" class="color-filter">Белые платья</div>
				<div id="45" class="color-filter">Бирюзовые платья</div>
				<div id="63" class="color-filter">Бордовые платья</div>
				<div id="27" class="color-filter">Голубые платья</div>
				<div id="31" class="color-filter">Жёлтые платья</div>
				<div id="52" class="color-filter">Зелёные платья</div>
				<div id="103" class="color-filter">Золотые платья</div>
				<div id="21" class="color-filter">Красные платья</div>
				<div id="99" class="color-filter">Платья мятного цвета</div>
				<div id="25" class="color-filter">Розовые платья</div>
				<div id="66" class="color-filter">Сверкающие платья</div>
				<div id="194" class="color-filter">Серые платья</div>
				<div id="49" class="color-filter">Синие платья</div>
				<div id="30" class="color-filter">Сиреневые платья</div>
				<div id="28" class="color-filter">Тёмно-синие платья</div>
				<div id="29" class="color-filter">Фиолетовые платья</div>
				<div id="16" class="color-filter">Чёрные платья</div>
			</div>
			<input name="size" type="hidden" id="size" value="">
			<input name="length" type="hidden" id="length" value="">
			<input name="color" type="hidden" id="color" value="">
			<input name="collection" type="hidden" id="collection" value="">
			<input type="submit" value="Фильтровать платья" id="filter-submit">
		</form>
		<div class="filter_result"></div>
	</div>
	<script>
		function checker(className, idName) {
			let sizes = jQuery('.' + className).map((_, el) => el.getAttribute('id')).get()
			sizes = sizes.join(':')
			jQuery('#' + idName).val(sizes)
		}

		jQuery('.size-filter').click(function() {
			jQuery(this).toggleClass('selected-size')
			checker("selected-size", "size")
		})
		jQuery('.length-filter').click(function() {
			jQuery(this).toggleClass('selected-length')
			checker("selected-length", "length")
		})
		jQuery('.color-filter').click(function() {
			jQuery(this).toggleClass('selected-color')
			checker("selected-color", "color")
		})
		jQuery('.collection-filter').click(function() {
		jQuery(this).toggleClass('selected-collection')
		checker("selected-collection", "collection")
	})
	</script>

