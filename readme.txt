=== Koko Analytics - Privacy-Friendly WordPress Analytics ===
Contributors: Ibericode, DvanKooten, kokoanalytics
Tags: analytics, google analytics, privacy, statistics, website statistics
Requires at least: 6.0
Tested up to: 7.0
Stable tag: 2.3.5
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.4

WordPress analytics without cookies or third-party tracking. A fast, privacy-friendly Google Analytics alternative

== Description ==

Koko Analytics gives you WordPress analytics inside your dashboard without sending visitor data to an external service. See your pageviews, visitors, top pages, and referrers while keeping analytics data on your own server.

It is built for privacy from the start. Koko Analytics can be used without cookies and does not process or store personal data. That makes it suitable for GDPR, CCPA, and PECR-friendly website statistics.

It is also built for speed. Koko Analytics adds less than 1 KB to your HTML, works with cached pages, and bypasses WordPress for its optimized collection endpoint.

== Why choose Koko Analytics? ==

= Privacy-friendly analytics =

Koko Analytics is [privacy-friendly analytics](https://www.kokoanalytics.com/privacy-focused-wordpress-analytics/) for WordPress. No personal data is processed or stored, all measurements are anonymous, and nothing is shared with a third-party analytics platform.

= Lightweight website statistics =

Koko Analytics is [lightweight analytics](https://www.kokoanalytics.com/lightweight-wordpress-analytics/). It adds less than 1 kilobyte of data to your HTML and is fully compatible with pages served from any kind of cache. WordPress is bypassed entirely for its collection endpoint, making the impact on your site's performance as close to zero as possible.

= A simple analytics dashboard =

Koko Analytics is [simple analytics](https://www.kokoanalytics.com/simple-wordpress-analytics/). There are no complicated reports to dig through. One dashboard page shows your important website statistics.

= Open source analytics =

Koko Analytics is [open source analytics](https://www.kokoanalytics.com/open-source-wordpress-analytics/) released under the GPL license, just like WordPress itself. It is built in the open, so anyone can verify how it works. No company can lock you in or take your analytics data away.

== Features ==

* **WordPress analytics dashboard** - View your website statistics directly inside WordPress admin.
* **Top posts and pages** - See which content gets the most visits.
* **Referrer statistics** - Find out which websites send traffic to your site.
* **Path-based tracking** - Track statistics for any URL, including archives and search pages.
* **Returning visitor detection** - Reliably detect returning visitors without cookies.
* **Exclusion rules** - Exclude visits from selected WordPress user roles or IP addresses.
* **Historical data imports** - Import statistics from Jetpack Stats, Plausible, or Burst Statistics.
* **Automatic data cleanup** - Remove historical data older than a chosen number of months or years.
* **Popular posts output** - Show your most visited posts or pages with a widget, Gutenberg block, or shortcode.
* **Pageview counter** - Show the total number of pageviews for a page with a shortcode or Gutenberg block.

== Koko Analytics Pro ==

Koko Analytics Pro adds more reporting options for sites that need deeper analytics.

* **Country statistics** - See which countries your visitors come from.
* **Technology reports** - View browser, operating system, and device statistics.
* **Custom event tracking** - Track outbound link clicks, contact form submissions, add-to-cart actions, and more.
* **Email reports** - Receive periodic analytics reports in your inbox.
* **Traffic spike alerts** - Get notified by email when traffic changes quickly.

[View the Koko Analytics live demo](https://www.kokoanalytics.com/koko-analytics-dashboard/) or [see Koko Analytics Pro pricing](https://www.kokoanalytics.com/pricing/).

== Installation ==

1. Go to Plugins > Add New in your WordPress dashboard.
2. Search for Koko Analytics.
3. Click Install Now, then Activate.
4. To upload the plugin manually, download the ZIP from WordPress.org or GitHub, then go to Plugins > Add New > Upload Plugin.
5. After activation, Koko Analytics starts collecting statistics right away. No configuration is required.
6. View your website analytics under Dashboard > Analytics in WordPress admin.

== Frequently Asked Questions ==

= Is Koko Analytics a WordPress analytics plugin? =

Yes. Koko Analytics is a WordPress analytics plugin that shows pageviews, visitors, top pages, and referrers inside your WordPress dashboard.

= Does Koko Analytics use cookies? =

Cookies are optional in Koko Analytics. You can use the plugin without cookies for privacy-friendly website statistics. Read more in the guide: [Does Koko Analytics use cookies?](https://www.kokoanalytics.com/docs/faq/does-koko-analytics-use-cookies/)

= Will Koko Analytics slow down my site? =

No. Koko Analytics adds less than 1 KB to your HTML, works with cached pages, and uses an optimized collection endpoint to keep performance impact as low as possible.

= Is Koko Analytics privacy-friendly? =

Yes. Koko Analytics does not process or store personal data, does not use third-party analytics services, and only stores aggregated counts.

= Is Koko Analytics open source? =

Yes. Koko Analytics is open source analytics released under the GPL license, just like WordPress itself. Anyone can inspect how it works.

= Do I need an account to use Koko Analytics? =

No account is needed. Koko Analytics runs on your own WordPress site, and statistics start recording after activation.

= Does Koko Analytics work with cached pages? =

Yes. Koko Analytics is compatible with pages served from many types of cache.

If your question is not listed here, read the [Koko Analytics documentation](https://www.kokoanalytics.com/docs/).

== Screenshots ==

1. The WordPress analytics dashboard showing visitors, pageviews, top pages, and referrers.
2. Website statistics for the past 2 weeks shown directly after logging in to WordPress.
3. Tracking-related settings for privacy-friendly analytics and visitor statistics.
4. Analytics dashboard settings for customizing the reports shown in WordPress admin.
5. Custom event tracking for outbound links, form submissions, and other analytics events. [Pro]
6. Email reports and traffic spike notifications for Koko Analytics Pro. [Pro]
7. Data ownership tools for importing and exporting your WordPress analytics data.
8. Most viewed posts widget for showing popular content on your site.
9. Country, browser, operating system, and device statistics for deeper website analytics. [Pro]

== Changelog ==

= 2.3.5 =
* Data: Prevent the aggregation process from running while database migrations are pending.
* Performance: Stop the aggregation process from invalidating the alloptions cache on every run.
* Performance: Process database pruning in chunks of 10,000 rows.
* Security: Add nonce verification to the user-initiated v2 update action.

= 2.3.4 =
* Fix: Restore access to the Jetpack and Plausible importer pages.
* Fix: Prevent a database warning for a missing table on fresh installs.
* UX: Make table rows selectable again.
* SEO: Remove the canonical URL from the public dashboard because it is already noindex.
* Database: Change the default database purge threshold from 5 years to 3 years.
* Dashboard: Stop using the public dashboard query string argument when pretty permalinks are enabled.

= 2.3.3 =
* Database: Fix table and column values when upserting new referrer URLs.

= 2.3.2 =
* Dashboard: Show the draggable icon only when hovering over the table header.
* Database: Prevent database migrations from running concurrently.
* Database: Try to increase the time limit to 300 seconds before running database migrations.
* Database: Re-acquire and extend the lock after every database migration step.

= 2.3.0 =
* Tracking: Improve detection of preflight requests and requests from headless browsers.
* Tracking: Add more aggregation rules for Google subdomains.
* Database: Improve the migration runner for more reliable database migrations.
* Database: Use atomic upserts for normalized string values, such as paths and referrer URLs.
* Database: Improve performance for the pruning action.
* Shortcode: Fix cases where the koko_analytics_counter shortcode did not work outside post content.
* Shortcode: Format koko_analytics_counter output with localized number formatting rules.
* Settings: Restrict the tab query parameter to allowed values only.
* UX: Allow custom ordering of dashboard components with drag and drop.
* UX: Add a direct link to each page in the top pages component.
* UX: Improve dashboard styling.
* Developer: Add the koko_analytics_print_html_comments filter to disable HTML comments with version info.

= 2.2.5 =
* Tracking: Change the tracking request URL to home_url to bypass rate limits on admin-ajax.php on some hosts. This only applies when the optimized endpoint is not used.
* Dashboard: Format dates in chart tooltips based on grouping.
* Fix: Allow the dashboard to fetch statistics more than 10 years back.
* Fix: Prevent a load_textdomain_just_in_time() warning when other plugins call wp_get_schedules() before init.
* Developer: Improve types based on PHPStan reports.

= 2.2.4 =
* Fix: Prevent a fatal error on fresh plugin installation caused by calling a non-static method statically.
* Fix: Restore the koko_analytics_counter shortcode in version 2.2.2 by passing the required function arguments.

= 2.2.2 =
* Developer: Add the koko_analytics_public_dashboard_headers hook before sending HTTP headers for the public dashboard.
* Developer: Add the koko_analytics_output_dashboard_settings hook for adding setting rows to the dashboard settings page.
* Uninstall: Delete the koko_analytics_last_aggregation_at option on plugin uninstall.
* UX: Add a gradient that shows relative weight per row in the referrers table.
* Fix: Restore access to Jetpack and Plausible import pages.
* Performance: Reuse common action hooks for minor performance improvements.

= 2.2.1 =
* Gutenberg: Add the counter block type.
* Tracking: Add the koko_analytics_allowed_query_vars filter.
* Performance: Roll up database migrations older than 5 years.

= 2.2.0 =
* Settings: Allow plugins to register their own settings tab through the koko_analytics_settings_tabs filter.
* Endpoint: Remove duplicate require statements when several plugins add the same file.

= 2.1.3 =
* Security: Escape path and referrer URL values in data export files. Fixes a potential SQL injection vulnerability when importing a previously exported dataset containing malicious path values (CVE-2026-22850). Thanks to Hector Ruiz from naxus-audit for responsibly disclosing.
* Data import: Only allow SQL statements that affect the Koko Analytics database tables.
* Tracking: Reject invalid path values per the RFC 2396 specification.

= 2.1.2 =
* Tracking: Accept path and post ID arguments in the koko_analytics.trackPageview(path, post_id) function for manual calls in single-page applications.
* Dashboard: Add a yearly grouping option to the chart.

View the complete changelog at https://www.kokoanalytics.com/changelog/
