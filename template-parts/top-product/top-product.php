<?php
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => - 1,
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => '_sale_price',
			'value'   => 0,
			'compare' => '>',
			'type'    => 'NUMERIC',
		),
	),
);

$query    = new WP_Query( $args );
$products = wc_get_products( $query->posts );

if ( empty( $products ) ) {
	return;
}
?>

<div class="top-product">
	<?php foreach ( $products as $product ) :
		$image_url     = $product->get_image( 'full' );
		$regular_price = $product->get_regular_price();
		$sale_price    = $product->get_sale_price();
		$product_title = $product->get_title();
  		$discount_percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 );

		get_template_part( 'template-parts/top-product/top-product-item', '', array(
			'image_url'     => $image_url,
			'regular_price' => $regular_price,
			'sale_price'    => $sale_price,
			'product_title' => $product_title,
 			'discount_percentage' => $discount_percentage,
  		) );
	endforeach; ?>
</div>
