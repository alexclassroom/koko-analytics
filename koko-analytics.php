<?php

/*
Plugin Name: Koko Analytics
Plugin URI: https://www.kokoanalytics.com/#utm_source=wp-plugin&utm_medium=koko-analytics&utm_campaign=plugins-page
Version: 1.6.3
Description: Privacy-friendly analytics for your WordPress site.
Author: ibericode
Author URI: https://www.ibericode.com/
Author Email: support@kokoanalytics.com
Text Domain: koko-analytics
License: GPL-3.0-or-later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Koko Analytics - website analytics plugin for WordPress

Copyright (C) 2019 - 2025, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

phpcs:disable PSR1.Files.SideEffects
*/

namespace KokoAnalytics;

\define('KOKO_ANALYTICS_VERSION', '1.6.3');
\define('KOKO_ANALYTICS_PLUGIN_FILE', __FILE__);
\define('KOKO_ANALYTICS_PLUGIN_DIR', __DIR__);

// Load the Koko Analytics autoloader
require __DIR__ . '/autoload.php';

// don't run if PHP version is lower than 7.4
// prevent direct file access
if (PHP_VERSION_ID < 70400 || ! \defined('ABSPATH')) {
    return;
}

$times = [];
$times[] = ['start', microtime(true)];

// Maybe run any pending database migrations
require __DIR__ . '/src/class-migrations.php';
$migrations = new Migrations('koko_analytics_version', KOKO_ANALYTICS_VERSION, KOKO_ANALYTICS_PLUGIN_DIR . '/migrations/');
add_action('init', [$migrations, 'maybe_run'], 10, 0);
$times[] = ['Migrations', microtime(true)];

// aggregator
add_filter('cron_schedules', function ($schedules) {
    $schedules['koko_analytics_stats_aggregate_interval'] = [
        'interval' => 60, // 60 seconds
        'display'  => esc_html__('Every minute', 'koko-analytics'),
    ];
    return $schedules;
}, 10, 1);
add_action('koko_analytics_aggregate_stats', [Aggregator::class, 'run'], 10, 0);
$times[] = ['Aggregator', microtime(true)];

if (\defined('DOING_AJAX') && DOING_AJAX) {
    // ajax only
    add_action('init', 'KokoAnalytics\maybe_collect_request', 1, 0);
} elseif (is_admin()) {
    new Admin();
    new Dashboard_Widget();
}

// script loader
add_action('wp_enqueue_scripts', [Script_Loader::class, 'maybe_enqueue_script'], 10, 0);
add_action('amp_print_analytics', [Script_Loader::class, 'print_amp_analytics_tag'], 10, 0);
add_action('admin_bar_menu', 'KokoAnalytics\admin_bar_menu', 40, 1);
$times[] = ['Script_Loader', microtime(true)];

// query loop block
add_action('admin_enqueue_scripts', [QueryLoopBlock::class, 'admin_enqueue_scripts']);
add_filter('pre_render_block', [QueryLoopBlock::class, 'pre_render_block'], 10, 3);
$times[] = ['QueryLoopBlock', microtime(true)];

// init REST API endpoint
add_action('rest_api_init', [Rest::class, 'register_routes'], 10, 0);
$times[] = ['Rest', microtime(true)];

// pruner
add_action('koko_analytics_prune_data', [Pruner::class, 'run'], 10, 0);
$times[] = ['Pruner', microtime(true)];

if (\class_exists('WP_CLI')) {
    \WP_CLI::add_command('koko-analytics', 'KokoAnalytics\Command');
    $times[] = ['Command', microtime(true)];
}

// register shortcodes
add_shortcode('koko_analytics_most_viewed_posts', [Shortcode_Most_Viewed_Posts::class, 'content']);
add_shortcode('koko_analytics_counter', [Shortcode_Site_Counter::class, 'content']);
$times[] = ['Shortcodes', microtime(true)];


// run koko_analytics_action=[a-z] hooks
add_action('init', function () {
    $actions = [];

    if (isset($_GET['koko_analytics_action'])) {
        $actions[] = trim($_GET['koko_analytics_action']);
    }

    if (isset($_POST['koko_analytics_action'])) {
        $actions[] = trim($_POST['koko_analytics_action']);
    }

    if (empty($actions)) {
        return;
    }

    if (!current_user_can('manage_koko_analytics')) {
        return;
    }

    // fire all supplied action hooks
    foreach ($actions as $action) {
        do_action("koko_analytics_{$action}");
    }

    wp_safe_redirect(remove_query_arg('koko_analytics_action'));
    exit;
}, 10, 0);
$times[] = ['Actions', microtime(true)];

// maybe show standalone dashboard
add_action('wp', function () {
    if (!isset($_GET['koko-analytics-dashboard'])) {
        return;
    }

    $settings = get_settings();
    if (!$settings['is_dashboard_public'] && !current_user_can('view_koko_analytics')) {
        return;
    }

    (new Dashboard())->show_standalone_dashboard_page();
});
$times[] = ['Dashboard', microtime(true)];

// register most viewed posts widget
add_action('widgets_init', function () {
    require KOKO_ANALYTICS_PLUGIN_DIR . '/src/class-widget-most-viewed-posts.php';
    register_widget(Widget_Most_Viewed_Posts::class);
});

add_action('koko_analytics_test_custom_endpoint', 'KokoAnalytics\test_custom_endpoint');

register_activation_hook(__FILE__, function () {
    Aggregator::setup_scheduled_event();
    Pruner::setup_scheduled_event();
    Plugin::setup_capabilities();
    Plugin::install_optimized_endpoint();
});

register_deactivation_hook(__FILE__, function () {
    Aggregator::clear_scheduled_event();
    Pruner::clear_scheduled_event();
    Plugin::remove_optimized_endpoint();
});

// if (php_sapi_name() === 'cli') {
//     $times = array_map(function ($t) {
//         $t[1] = round($t[1] * 1000, 4);
//         return $t;
//     }, $times);

//     for ($i = count($times) - 1; $i > 0; $i--) {
//         $times[$i][1] = $times[$i][1] - $times[$i-1][1];
//     }
//     usort($times, function ($a, $b) {
//         return $a[1] === $b[1] ? 0 : ($a[1] > $b[1] ? -1 : 1);
//     });

//     dump($times);
// }
