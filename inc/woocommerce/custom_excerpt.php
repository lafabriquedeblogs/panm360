<?php 
/**
 * Plugin Name: WooCommerce membership custom post excerpt
 * Description: Instead of using the excerpt this will display the begining of a post for non members.
 * Version: 0.1
 * Author: Sébastien Méric <sebastien.meric@gmail.com>
 * Author URI: http://www.sebastien-meric.com/
 **/

defined( 'ABSPATH' ) OR exit;

/**
 * Classe principale
 */
class WCM_Custom_Functionalities {
	public function __construct() {
		add_filter( 'get_the_excerpt', array( &$this, 'custom_excerpt' ) );
	}

	/**
	 * Display the begining of posts for non members on single post page
	 */
	public function custom_excerpt( $excerpt ) {    
		global $post;

		if( is_single() ) {
			$excerpt = $post->post_content;
			$excerpt = balanceTags( $this->wp_trim_words_retain_formatting( $excerpt, 150 ), true );
		}

		return $excerpt;
	}

	/**
	 * Default wp_trim_words() function altered to not strip tags.
	 * @see http://stackoverflow.com/questions/20801715/retain-formatting-while-using-excerpt-wp-trim-words#answer-26512251
	 */
	public function wp_trim_words_retain_formatting( $text, $num_words = 55, $more = null ) {
		if ( null === $more )
			$more = __( '&hellip;' );
		$original_text = $text;
		/* translators: If your word count is based on single characters (East Asian characters),
		   enter 'characters'. Otherwise, enter 'words'. Do not translate into your own language. */
		if ( 'characters' == _x( 'words', 'word count: words or characters?' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
			preg_match_all( '/./u', $text, $words_array );
			$words_array = array_slice( $words_array[0], 0, $num_words + 1 );
			$sep = '';
		}
		else {
			$words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
			$sep = ' ';
		}
		if ( count( $words_array ) > $num_words ) {
			array_pop( $words_array );
			$text = implode( $sep, $words_array );
			$text = $text . $more;
		}
		else {
			$text = implode( $sep, $words_array );
		}
		/**
		 * Filter the text content after words have been trimmed.
		 *
		 * @since 3.3.0
		 *
		 * @param string $text          The trimmed text.
		 * @param int    $num_words     The number of words to trim the text to. Default 5.
		 * @param string $more          An optional string to append to the end of the trimmed text, e.g. &hellip;.
		 * @param string $original_text The text before it was trimmed.
		 */
		return apply_filters( 'wp_trim_words', $text, $num_words, $more, $original_text );
	}

}


$wcm_custom_functionalities = new WCM_Custom_Functionalities();

