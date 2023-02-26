<?php
/**
 * Plugin Name:       block
 * Description:       A Gutenberg block to show your pride! This block enables you to type text and style it with the color font Gilbert from Type with Pride.
 * Version:           0.1.0
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenpride
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
// function create_block_gutenpride_block_init() {
// 	register_block_type( __DIR__ . '/build' );
// }
// add_action( 'init', 'create_block_gutenpride_block_init' );

function create_block_my_blocks_block_init() {
  foreach ( glob( plugin_dir_path( __FILE__ ) . 'build/blocks/*' ) as $block ) {
      if ( file_exists( $block . '/index.php' ) ) {
          // Dynamic block
          require_once( $block . '/index.php' );

          register_block_type(
              $block,
              array(
                  'render_callback' => 'my_blocks_render_callback_' . str_replace( '-', '_', basename( $block ) ),
              )
          );

      } else {
          // Static block
          register_block_type( $block );
      }
  }
}
add_action( 'init', 'create_block_my_blocks_block_init' );
