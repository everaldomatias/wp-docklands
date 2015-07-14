<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php $terms = get_the_terms( $post->ID, 'color' ); ?>
	<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
	    <div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
		<span class="tagged_as">
			<?php _e('Colors:&nbsp;', 'odin');?>
			<?php foreach ( $terms as $term ) : ?>
				<?php if($color_img = get_field('color_img', $term)):?>
					<a href="<?php echo get_term_link( $term->term_id, 'color' );?>">
						<img class="color-img" src="<?php echo $color_img['sizes']['thumbnail'];?>">
					</a>
			    <?php endif;?>
			<?php endforeach; ?>
		</span>
	<?php endif;?>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
