<?php
/*
Plugin Name: Always up
Version: 1
Plugin URI: 
Description: Keep all posts always up to date
Author: Jaime R Portmann
Author URI: http://www.jaimerossello.com
*/

add_Action('init', 'du_init');
function du_init(){

$time = current_time('mysql');

global $post;
$args = array( 'posts_per_page' => 1, 'order' => 'ASC', 'orderby' => 'date' );
$postslist = get_posts( $args );
foreach ( $postslist as $post ) :
setup_postdata( $post );

wp_update_post( array ( 'ID' => get_the_ID(), 'post_date' => $time, 'post_date_gmt' => get_gmt_from_date( $time ) ) );

endforeach; 
wp_reset_postdata();

}