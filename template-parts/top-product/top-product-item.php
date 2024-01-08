<?php
/**
 * @var array $args template part args, you can pass anything you want
 */
$image_url           = $args['image_url'] ?? null;
$regular_price       = $args['regular_price'] ?? null;
$sale_price          = $args['sale_price'] ?? null;
$product_title       = $args['product_title'] ?? null;
$discount_percentage = $args['discount_percentage'] ?? null;
?>

<div class="product-card">
	<?php if ( $image_url ) : ?>
		<div class="product-card__img">
			<?php echo $image_url; ?>
			<div class="product-card__discount-percentage"><?php echo '-' . $discount_percentage . '%'; ?></div>
		</div>
	<?php endif ?>
	<div class="product-card__info">
		<div class="product-card__price">
			<?php if ( $regular_price ) : ?>
				<p class="product-card__price-regular"><?php echo '$' . $regular_price; ?></p>
			<?php endif ?>

			<?php if ( $sale_price ) : ?>
				<p class="product-card__price-sale"> <?php echo '$' . $sale_price; ?></p>
			<?php endif ?>
		</div>
		<?php if ( $product_title ) : ?>
			<p class="product-card__product-title"><?php echo esc_html( $product_title ); ?></p>
		<?php endif ?>
	</div>
</div>
