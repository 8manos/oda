<?php
/*
Author: Marcin Gierada
Author URI: http://www.teastudio.pl/
Author Email: m.gierada@teastudio.pl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
 * 
 */
class Utils {
    
        public static function getTemplates() {
                $plugin_theme_file = scandir( plugin_dir_path(__FILE__) . '../templates/' );

                if ( count($plugin_theme_file) > 0 && array_key_exists(0, $plugin_theme_file) && array_key_exists(1, $plugin_theme_file)) {
                        unset($plugin_theme_file[0]);
                        unset($plugin_theme_file[1]);
                }
                
                $site_theme = get_template_directory() . '/css/wp-posts-carousel/';
                if( is_dir($site_theme) ) {
                        $site_theme_file = scandir( $site_theme );  
                        
                        if ( count($site_theme_file) > 0 && array_key_exists(0, $site_theme_file) && array_key_exists(1, $site_theme_file)) {
                                unset($site_theme_file[0]);
                                unset($site_theme_file[1]);
                        }                        
                } else {
                        $site_theme_file = array();
                }
                                
                $templates = array_merge( $plugin_theme_file, $site_theme_file );
               
                return $templates;
        }
        
        public static function getTaxonomies() {
                return get_post_types(array('public' => 'true', 'show_in_nav_menus' => true), 'objects');
        }
        
        public static function getShows() {
                return array("id" => __("By id", "wp-posts-carousel"),
                             "title" => __("By title", "wp-posts-carousel"),
                             "newest" => __("Newset", "wp-posts-carousel"),
                             "popular" => __("Popular", "wp-posts-carousel")                               
                            );
        }
        
        public static function getOrderings() {
                return array("asc" => __("Ascending", "wp-posts-carousel"),
                             "desc" => __("Descending", "wp-posts-carousel"),
                             "random" => __("Random", "wp-posts-carousel")
                            );
        }
        
        public static function getDescriptions() {
                return array("false" => __("No", "wp-posts-carousel"),
                             "excerpt" => __("Excerpt", "wp-posts-carousel"),
                             "content" => __("Full content", "wp-posts-carousel")
                            );
        }
        
        public static function getSources() {
                return array("thumbnail"  => __("Thumbnail", "wp-posts-carousel"),
                             "medium"     => __("Medium", "wp-posts-carousel"),
                             "large"      => __("Large", "wp-posts-carousel"),
                             "full"       => __("Full", "wp-posts-carousel"),                  
                            );
        }
        
        public static function getAnimations() {
                return array("linear"             => "linear",
                             "swing"              => "swing",
                             "easeInQuad"         => "easeInQuad",
                             "easeOutQuad"        => "easeOutQuad",   
                             "easeInOutQuad"      => "easeInOutQuad",
                             "easeInCubic"        => "easeInCubic",
                             "easeOutCubic"       => "easeOutCubic",
                             "easeInOutCubic"     => "easeInOutCubic",
                             "easeInQuart"        => "easeInQuart",
                             "easeOutQuart"       => "easeOutQuart",
                             "easeInOutQuart"     => "easeInOutQuart",
                             "easeInQuint"        => "easeInQuint",
                             "easeOutQuint"       => "easeOutQuint",
                             "easeInOutQuint"     => "easeInOutQuint",
                             "easeInExpo"         => "easeInExpo",
                             "easeOutExpo"        => "easeOutExpo",
                             "easeInOutExpo"      => "easeInOutExpo",
                             "easeInSine"         => "easeInSine",
                             "easeOutSine"        => "easeOutSine",
                             "easeInOutSine"      => "easeInOutSine",
                             "easeInCirc"         => "easeInCirc",
                             "easeOutCirc"        => "easeOutCirc",
                             "easeInOutCirc"      => "easeInOutCirc",
                             "easeInElastic"      => "easeInElastic",
                             "easeOutElastic"     => "easeOutElastic",
                             "easeInOutElastic"   => "easeInOutElastic",
                             "easeInBack"         => "easeInBack",
                             "easeOutBack"        => "easeOutBack",
                             "easeInOutBack"      => "easeInOutBack",
                             "easeInBounce"       => "easeInBounce",
                             "easeOutBounce"      => "easeOutBounce",
                             "easeInOutBounce"    => "easeInOutBounce"                   
                            );
        }
}
