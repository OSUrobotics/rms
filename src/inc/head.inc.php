<?php
/**
 * Include functions for the HTML HEAD section of the RMS.
 *
 * Provides several common functions to generate the HTML for the HEAD section
 * of the RMS HTML.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2013 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    April, 13 2013
 * @package    inc
 * @link       http://ros.org/wiki/rms
 */

if (file_exists(dirname(__FILE__).'/config.inc.php')) {
    include_once(dirname(__FILE__).'/config.inc.php');
}

/**
 * A static class to contain the head.inc.php functions.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2013 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    April, 13 2013
 * @package    inc
 */
class head
{
    
    /**
     * A function to echo the HTML for the HEAD section of the HTML document.
     * This includes metadata, common CSS and Javascript files, and the Google
     * Analytics code if it exists.
     *
     * @param string $path the relative path to the base RMS directory
     */
    static function import_head($path)
    {
        head::import_meta();
        head::import_common_css($path);
        head::import_common_js($path);
        head::import_analytics();
    }
    
    /**
     * A function to echo the HTML to set the meta information.
     */
    static function import_meta()
    {
        echo '
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        ';
    }
    
    /**
     * A function to echo the HTML to import common CSS files.
     *
     * @param string $path the relative path to the base RMS directory
     */
    static function import_common_css($path)
    {
        echo '
        <link type="text/css" rel="stylesheet" media="all"
            href="/modules/node/node.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/modules/system/defaults.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/modules/system/system.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/modules/system/system-menus.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/modules/user/user.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/announcements/announcements.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/cck/theme/content-module.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/date/date.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/libraries/jquery.ui/themes/base/jquery-ui.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/date/date_popup/themes/datepicker.1.7.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/date/date_popup/themes/jquery.timeentry.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/feature_story/feature_story.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/filefield/filefield.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/lightbox2/css/lightbox.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/nice_menus/nice_menus.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/nice_menus/nice_menus_default.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/video_carousel_with_lightbox/css/lightbox.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/misc/farbtastic/farbtastic.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/calendar/calendar.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/biblio/biblio.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/cck/modules/fieldgroup/fieldgroup.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/views/css/views.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/modules/popup_filter/popup-filter.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/bootstrap/css/bootstrap.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/main.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/top_hat.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/standard.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/feature_stories.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/live_feeds.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/osu_ed_events.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/bootstrap/css/responsive.css?4">
        <link type="text/css" rel="stylesheet" media="all"
            href="/sites/all/themes/osu_standard-DF/css/main-responsive.css?4">
        <link rel="stylesheet" type="text/css" href="'.$path.'css/common.css" />
        <link rel="stylesheet" type="text/css" href="'.$path.
            'css/jquery-ui-1.8.22.custom.css" />
        <link href="http://fonts.googleapis.com/css?family=Gudea:400,400italic,700"
            "rel="stylesheet" type="text/css">
        ';
    }
    
    /**
     * A function to echo the HTML to import common JS files.
     *
     * @param string $path the relative path to the base RMS directory
     */
    static function import_common_js($path)
    {
        echo '
        <script type="text/javascript" src="'.$path.'js/rms/common.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/'.
            'jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/'.
            '1.8.22/jquery-ui.min.js"></script>
        ';
    }
    
    /**
     * A function to echo the HTML to import Google Analytics settings.
     */
    static function import_analytics()
    {
        return;
    }
}
