<?php
/*
Plugin Name: Network REST Site List
Plugin URI: https://github.com/davidsword/network-rest-site-list
Description: Adds a rest endpoint for Wordpress multisite network installations to list all sites. Similar to wpcli `wp site list`
Version: 1.0.0
Author: davidsword
Author URI: https://davidsword.ca/
License: GPLv3
License URI: https://github.com/davidsword/network-rest-site-list/blob/master/LICENSE

See README.txt or README.md
See https://github.com/davidsword/network-rest-site-list
*/

defined("ABSPATH") || exit;

add_action( 'rest_api_init', function () {
  register_rest_route( 'ntwrkrst/v1', '/wpsitelist', array(
    'methods'  => WP_REST_Server::READABLE,
    'callback' => function($request){
        global $wpdb;

        // only on the main site, it doesnt make sense to be on others
        if ( get_current_blog_id() != 1 ) return;

        // cache for 24 h to prevent unnessisary query
        $trankey = "_network_rest_site_list";
        if (false === ( $data = get_transient( $trankey ) ) ) {
            $sites = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}blogs` ORDER BY `blog_id`");
            $data = [];
            foreach ($sites as $site) {
                $data[$site->blog_id] = [
                    'blog_id' => $site->blog_id,
                    'domain' => $site->domain,
                    'path' => $site->path,
                ];
            }
            set_transient( $trankey, $data, 60*60*24 );
        }

        // if we're searching, filter with php (instead of mysql) to preserve cache
        if (isset($_GET['q']) || isset($_GET['query'])) {
            foreach ($data as $k => $site) {
                if (!strstr($site['path'],$_GET['q'])) {
                    unset($data[$k]);
                }
            }
        }

        // return an error in the form of a result if nothing found
        if (count($data) < 1) {
            $noresults = 'no results found';
            $data = ['blog_id' => 0, 'domain' => $noresults, 'path' => $noresults];
        }

        // that's all folks
        return $data;
    },
  ) );
} );
