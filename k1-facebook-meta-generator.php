<?php
/*
  Plugin Name: Klan1 WP Facebook Meta
  Plugin URI: http://www.klan1.com
  Description: Basic zero-config Facebook Open Graph metada generator.
  Version: 0.4.1
  Author: Alejandro Trujillo J. - J0hnD03
  Author URI: http://www.facebook.com/j0hnd03
 */

/*
  Klan1 WP Facebook Meta (Wordpress Plugin)
  Copyright (C) 2011 Alejandro Trujillo J.
  Contact me at http://www.klan1.com

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.


 * TODO: Make the description tag, right now I do not want to use the excerpt as is, sorry.

 */

// CHECK PREREQUISITES K1FM
function check_k1fm_prerequisites() {
    global $k1_wp_error;
    $admin_url = get_admin_url();
    $k1_functions_install_url = $admin_url . "/plugin-install.php?tab=plugin-information&plugin=klan1-functions&TB_iframe=true&width=600&height=550";
    $html_link_to_install = "<a href='{$k1_functions_install_url}' class='thickbox' title='" . _("More information about Klan1 Common WP Functions") . "'>" . _("View details and install/update here") . "</a>";
    $WP_Error_install_msg = __("<p>The plugin 'Klan1 Common WP Functions' ver >= 0.3 is needed, please install it first: </p>");
    $WP_Error_update_msg = __("<p>The plugin 'Klan1 Common WP Functions' is outdated, please update it first: </p>");

    if (!defined("K1_FUNCTIONS")) {
        $k1_wp_error = new WP_Error('K1FM-NO-K1_FUNCTIONS', $WP_Error_install_msg . $html_link_to_install);
    } else {
        if (K1_FUNCTIONS_VER < 0.3) {
            $k1_wp_error = new WP_Error('K1_FUNCTIONS-TO-UPDATE', $WP_Error_update_msg . $html_link_to_install);
        } else {
            define("K1FM_VER", 0.3);
        }
    }
    if (isset($k1_wp_error)) {
        if (is_admin()) {
            add_action('admin_notices', 'k1fm_admin_notice');
        } else {
            echo $k1_wp_error->get_error_message();
        }
    }
}

add_action('init', 'check_k1fm_prerequisites', 1);

function k1fm_admin_notice() {
    global $k1_wp_error;
    ?>
    <div class="error">
        <p><strong>Klan1 WP Facebook Meta: </strong><?php echo $k1_wp_error->get_error_message(); ?></p>
    </div>
    <?php
    unset($k1_wp_error);
}

// PLUGIN CODE 
function k1_add_facebook_meta() {
    global $post;

    if (is_page() || is_single()) {
        $fb_tags_values = array(
            "title" => $post->post_title . " @ " . get_bloginfo("name"),
            "type" => "article",
            "image" => k1_get_post_timthumb_img_url($post->ID, 600, 315, 1, "t"),
            "url" => get_permalink($post->ID),
            "site_name" => get_bloginfo("name")
        );

        echo "\n<!-- Begin Klan1 WP Facebook Meta " . K1FM_VER . " by J0hnD03 - Klan1 Network -->\n";
        foreach ($fb_tags_values as $tags => $value) {
            echo "\t<meta property=\"og:$tags\" content=\"$value\"/> \n";
        }
        echo "<!-- / End Klan1 WP Facebook Meta -->\n\n";
    }
    //  echo "<!-- DEBUG \n " . print_r($post, TRUE) . " \n -->\n";
}

add_action("wp_head", "k1_add_facebook_meta", 1);
?>