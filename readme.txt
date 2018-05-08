=== Network Rest Site List ===
Contributors: davidsword
Tags: REST, API, WP JSON, NETWORK, MULTISITE, RESTFUL
Requires at least: 4.9
Tested up to: 4.9.5
Requires PHP: 5.6
Stable tag: trunk
License: GPLv3
License URI: https://github.com/davidsword/network-rest-site-list/blob/master/LICENSE

Simple small Wordpress plugin that creates a REST endpoint to list all sites and their IDs in a Wordpress Multisite Network. Similar to wp-cli's `wp site list` command.

== Description ==

🚀 Access the endpoint with `/wp-json/ntwrkrst/v1/wpsitelist` - which returns:

```
{
    "123": {
        "blog_id" : "123",
        "domain":"example.com",
        "path":"\/main\/"
    }
    // etc
}
```

🔬 Query sites path with a search, similar to `/wp-json/ntwrkrst/v1/wpsitelist?q=keyword`

📦 Cache's for 24h

⚙️ Built primarily for [this Alfred workflow](https://github.com/davidsword/alfred-workflow-wpsitelist) to quickly find a sites `blog_id`

== Installation ==

= From the WordPress plugin directory (recommended): =

1. Navigate to Plugins > Add New in your WordPress Dashboard
1. Search for "Network Rest Site List"
1. Click Install on the "Network Rest Site List" plugin
1. Activate the plugin

= By direct upload: =

1. Download the plugin and unzip it.
1. Upload the network-rest-site-list folder to your /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==


== Changelog ==

= 1.0.0 =
* 20180508
* Initial public implementation
