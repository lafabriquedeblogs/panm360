<?php
/**
 * Variable subscription product add to cart
 *
 * @author  Prospress
 * @package WooCommerce-Subscriptions/Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys = array_keys( $attributes );
$user_id        = get_current_user_id();

$action = esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) );
$data_product_id = $product->get_id();

do_action( 'woocommerce_before_add_to_cart_form' ); ?>


	<?php do_action( 'woocommerce_before_variations_form' ); ?>
	
			<div id="yo">
				<ul class="woocommerce-grouped-product-list group_table">
					<?php foreach($available_variations as $variation ):
						
						$product = wc_get_product( $variation['variation_id'] );
					?>
					
					<li  id="product-<?php echo $product->get_id();?>" class="woocommerce-grouped-product-list-item">
						<form class="_variations_form cart" action="<?php echo $action; ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo $data_product_id; ?>">

						<?php
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'panm360_square' );
							echo '<img class="abo-thumbnail" src="'.$image[0].'" width="500" height="500" alt=""/>';
							
							echo '<div class="abo-content">';
								echo '<h4 class="woocommerce-grouped-product-list-item__label">'.$variation['attributes']['attribute_abonnements'].'</h4>';
								echo '<div class="bold abo_price_html">'.$variation['price_html'].'</div>';
								echo '<div class="woocommerce-grouped-product-list-item__description">'.$variation['variation_description'].'</div>';
						
						?>
							<?php echo '</div>';?>
	
								<div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
									<div class="quantity hidden" style="display: none;">
										<input type="hidden" id="quantity_5e62a21cb4462" class="qty" name="quantity" value="1" min="1" max="">
									</div>
									<button type="submit" class="single_add_to_cart_button button alt "><?php _e('Je m\'abonne','panm360'); ?></button>
									<input type="hidden" name="add-to-cart" value="<?php echo $product->get_id();?>">
									<input type="hidden" name="product_id" value="<?php echo $product->get_id();?>">
									<input type="hidden" name="variation_id" class="variation_id" value="<?php echo $variation['variation_id'];?>">
								</div>
	
						</form>
						</li>
					<?php
						endforeach;
					?>
				
				

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
	</ul>

</div>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
