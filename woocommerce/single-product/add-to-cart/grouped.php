<?php
/**
 * Grouped product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/grouped.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     4.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $post;
$parent_product_post = $post;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart grouped_form" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
	<ul class="woocommerce-grouped-product-list group_table">
			<?php
			$quantites_required      = false;
			$previous_post           = $post;
			$grouped_product_columns = apply_filters( 'woocommerce_grouped_product_columns', array(
				'label',
				'price',
				'description',
				'quantity'
			), $product );

			foreach ( $grouped_products as $grouped_product_child ) {
				$post_object        = get_post( $grouped_product_child->get_id() );
				$quantites_required = $quantites_required || ( $grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options() );
				$post               = $post_object; // WPCS: override ok.
				setup_postdata( $post );

				echo '<li id="product-' . esc_attr( $grouped_product_child->get_id() ) . '" class="woocommerce-grouped-product-list-item ' . esc_attr( implode( ' ', wc_get_product_class( '', $grouped_product_child ) ) ) . '">';
				
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $grouped_product_child->get_id() ), 'panm360_square' );
				
				echo '<img class="abo-thumbnail" src="'.$image[0].'" width="500" height="500" alt=""/>';
				
				echo '<div class="abo-content">';
				//$image = get_image( $size = 'woocommerce_thumbnail', $attr = array(), $placeholder = true )
				
				// Output columns for each product.
				foreach ( $grouped_product_columns as $column_id ) {
					do_action( 'woocommerce_grouped_product_list_before_' . $column_id, $grouped_product_child );
					
					switch ( $column_id ) {
						case 'quantity':
							ob_start();

							//if ( !$grouped_product_child->is_purchasable() || $grouped_product_child->has_options() || ! $grouped_product_child->is_in_stock() ) {
							if ( $grouped_product_child->is_sold_individually() || ! $grouped_product_child->is_purchasable() ){
								woocommerce_template_loop_add_to_cart();
							} elseif ( $grouped_product_child->is_sold_individually() ) {
								echo '<input type="checkbox" name="' . esc_attr( 'quantity[' . $grouped_product_child->get_id() . ']' ) . '" value="1" class="wc-grouped-product-add-to-cart-checkbox" />';
							} else {
								do_action( 'woocommerce_before_add_to_cart_quantity' );

								woocommerce_quantity_input( array(
									'input_name'  => 'quantity[' . $grouped_product_child->get_id() . ']',
									'input_value' => isset( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ? wc_stock_amount( wc_clean( wp_unslash( $_POST['quantity'][ $grouped_product_child->get_id() ] ) ) ) : 0, // WPCS: CSRF ok, input var okay, sanitization ok.
									'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $grouped_product_child ),
									'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child ),
								) );

								do_action( 'woocommerce_after_add_to_cart_quantity' );
							}
							
							$value = ob_get_clean();
							break;
						case 'label':
							$value  = '<label for="product-' . esc_attr( $grouped_product_child->get_id() ) . '">';
							$value .= $grouped_product_child->is_visible() ? $grouped_product_child->get_name() : $grouped_product_child->get_name();
							$value .= '</label>';
							break;
						case 'price':
							$value = '';$grouped_product_child->get_price_html() . wc_get_stock_html( $grouped_product_child );
							break;
						case 'description':
							$product_details = $grouped_product_child->get_short_description();
							$product_get_short_description = '<span>'.$product_details.'</span>';	
							$value = '<div class="woocommerce-grouped-product-list-item__description">'.$product_get_short_description.'</div>';							
							break;
						default:
							$value = '';
							break;
					}

					echo '<div class="woocommerce-grouped-product-list-item__' . esc_attr( $column_id ) . '">' . apply_filters( 'woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child ) . '</div>'; // WPCS: XSS ok.
					
					do_action( 'woocommerce_grouped_product_list_after_' . $column_id, $grouped_product_child );
				}
				echo '</div> <!--abo-content-->';
				
				echo '</li>';
			}
			//$post = $previous_post; // WPCS: override ok.
			
			//setup_postdata( $post );
				// Reset to parent grouped product
				$post    = $parent_product_post;
				$product = wc_get_product( $parent_product_post->ID );
				setup_postdata( $parent_product_post );
			?>
	</ul>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

	<?php /*if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button id="bouton-je-mabonne" type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php  do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; */?>
</form>

<script>
	jQuery(document).ready(function($){
		
		$(".wc-grouped-product-add-to-cart-checkbox").each(function(index){
/*
			$(this).on("click", function(){
				$(".wc-grouped-product-add-to-cart-checkbox").prop("checked", false);
				$(this).prop("checked", true);
			});
*/
			
/*
			$(".woocommerce-grouped-product-list-item__label a")
			.attr("href","")
			.on("click", function(e){
				e.preventDefault();
			});
*/
		});
		
/*
		$(".woocommerce-grouped-product-list-item").each( function(index){
			$(this).on("click", function(){
				
				if( $(this).hasClass("active")){
					$(".woocommerce-grouped-product-list-item").removeClass("active").removeClass("inactive");
					return;
				}
				
				$(".wc-grouped-product-add-to-cart-checkbox").prop("checked", false);
				$(this).find(".wc-grouped-product-add-to-cart-checkbox").prop("checked", true);
				
				$(".woocommerce-grouped-product-list-item").removeClass("active").addClass("inactive");
				$(this).addClass("active").removeClass("inactive");
				
				return false;
			});
		});
*/
	});
</script>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
