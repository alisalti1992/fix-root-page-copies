<?php
/**
 * Plugin Name: Move Ahead Media Fix Root Page Copies
 * Plugin URI: https://github.com/moveaheadmedia/fix-root-page-copies/
 * Description: WordPress plugin to fix root page copies (redirect root pages to the correct permalink)
 * Version: 1.0
 * Author: Move Ahead Media
 * Author URI: https://github.com/moveaheadmedia/
 *
 */


add_action('template_redirect', 'mam_fix_root_page_copies');

function mam_fix_root_page_copies()
{
    if(is_single() || is_page()){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($actual_link, get_permalink()) == false && get_permalink() != $actual_link) {
            wp_redirect( get_permalink() );
            exit;
        }
    }
}

