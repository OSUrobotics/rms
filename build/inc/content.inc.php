<?php
/**
 * Include functions for the HTML BODY section of the RMS.
 *
 * Provides several common functions to generate the HTML for the BODY section
 * of the RMS HTML. Examples include the header, menu, and footer.
 *
 * @author    Russell Toris <rctoris@wpi.edu>
 * @copyright 2013 Russell Toris, Worcester Polytechnic Institute
 * @license   BSD -- see LICENSE file
 * @version   April, 13 2013
 * @package   inc
 * @link      http://ros.org/wiki/rms
 */

include_once(dirname(__FILE__).'/config.inc.php');
include_once(dirname(__FILE__).
    '/../api/content/content_pages/content_pages.inc.php');

/**
 * A static class to contain the content.inc.php functions.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2013 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    April, 13 2013
 * @package    inc
 */
class content
{
    /**
     * A function to echo the HTML for the main header based on the given user
     * and page name. If the
     * user is an admin, the admin menus will be shown.
     *
     * @param array|null $user the user SQL array for the current user (or null)
     * @param string $pagename the name of the page
     * @param string $path the relative path to the base RMS directory
     */
    static function create_header($user, $pagename, $path)
    {
        global $title, $db;
        echo <<<HEADER
<header>
  <div id='osu-top-hat'>
    <div class='container'>
      <a href='http://oregonstate.edu' class='tag'><img src=
      'http://robotics.oregonstate.edu/sites/all/themes/osu_standard-DF/images/osu-tag.png'
      class='logo' alt='Oregon State University'><span class=
      'mobile-header'>OREGON STATE UNIVERSITY</span></a>

      <ul class="menu">
        <li class="first leaf"><a href=
        "http://calendar.oregonstate.edu">Calendar</a></li>

        <li class="leaf"><a href=
        "http://osulibrary.oregonstate.edu">Library</a></li>

        <li class="leaf"><a href=
        "http://oregonstate.edu/campusmap">Maps</a></li>

        <li class="leaf"><a href=
        "http://oregonstate.edu/main/online-services">Online
        Services</a></li>

        <li class="last leaf"><a href=
        "http://osufoundation.org/giving/online_gift.shtml" class=
        "campaign">Make a Gift</a></li>
      </ul>
      <!-- Search was here -->
    </div>
  </div>
</header>
<div id='page-wrapper' class='container'>
    <div id='header' class='row-fluid'>
      <h1><a href='/'>$title: $pagename</a></h1>
    </div>
    <div id="main-menu">
        <div id="block-menu-primary-links" class="block block-menu">
            <div class="content">
              <ul class="menu">
              
HEADER;
    
        // list all of the content pages
        $pages = content_pages::get_content_pages();
        $first = true;
        foreach ($pages as $cur) {
            $class = "leaf";
            if ($first) {
                $class .= " first";
            }
            echo '<li class="'.$class.'"><a href="'.$path.'?pageid='.$cur['pageid'].'">'.
                $cur['menu'].'</a></li>';
        }
    
        // add the login page if the user is not logged in
        if (!$user) {
            echo '<li class="leaf"><a href="'.$path.'login">Login</a></li>';
        }
        echo '
        </ul></div>';
    
        // the user menu
        if ($user) {
            echo '
            <header class="clear"><table><tr>
            <td align="left"><h3>'.$user['firstname'].' '.$user['lastname'].
                '</h3></td>
            <td align="right">
            <span class="menu-main-menu"><a href="'.$path.
                'menu/">Main Menu</a></span>&nbsp;
            <span class="menu-account"><a href="'.$path.
                'account/">Account</a></span>&nbsp;';
    
            // check if this is an admin
            if ($user['type'] === 'admin') {
                echo '
                <span class="menu-admin-panel"><a href="'.$path.
                    'admin/">Admin Panel</a></span>&nbsp;
                <span class="menu-study-panel"><a href="'.$path.
                    'study/">Study Panel</a> </span>&nbsp;';
            }
            echo '
            <span class="menu-logout">
            <a href="javascript:logout();">Logout</a></span>&nbsp;
            </td></tr></table></header>
            ';
        }
    }
    
    /**
     * A function to echo the HTML for the page footer.
     */
    static function create_footer()
    {
        global $designedBy, $copyright;
    
        echo '
        </div><!-- /page-wrapper -->
        <footer>
        <div class="line"></div>
        <table>
        <tr><td align="left">'.$designedBy.'</td><td align="right">'.
            $copyright.'</td></tr>
        <tr><td colspan="2" align="right">'.
            'Powered by the <a href="http://www.ros.org/wiki/rms/">'.
            'Robot Management System</a></td></tr>
        </table>
        </footer>
        ';
    }
}
