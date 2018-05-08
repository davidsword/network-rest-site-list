# Wordpress Plugin - Network Rest Site List

Simple small Wordpress plugin that creates a REST endpoint to list all sites and their IDs in a Wordpress Multisite Network. Similar to wp-cli's `wp site list` command.

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
