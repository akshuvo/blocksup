<?php
/**
 * Plugin Name:       Blocksup
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blocksup
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_blocksup_block_init() {
	register_block_type( __DIR__ . '/build/block-a' );
	register_block_type( __DIR__ . '/build/block-b' );
}
add_action( 'init', 'create_block_blocksup_block_init', 999 );


// Block categories
function wpdocs_filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'blocksup',
                'title' => __( 'Blocksup', 'blocksup' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}

add_filter( 'block_categories_all', 'wpdocs_filter_block_categories_when_post_provided', 10, 2 );