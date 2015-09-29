<?php
/*
Author: Marcin Gierada
Author URI: http://www.teastudio.pl/
Author Email: m.gierada@teastudio.pl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

?>

<style type="text/css">
table {font-size:12px;}
</style>
<script type="text/javascript">
function insert_shortcode() {
    var shortcode = '[wp_posts_carousel';

    jQuery('#wp-posts-carousel-form').find(':input').filter(function() {
        var val = null;
        if(this.type != "button") {
            if(this.type == "checkbox") {
                val = this.checked ? "true" : "false";
            }else {
                val = this.value;
            }
            shortcode += ' '+jQuery.trim( this.name )+'="'+jQuery.trim( val )+'"';
        }
    });

    shortcode +=']';

    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
    tb_remove();
}
</script>

<div class="widget" id="wp-posts-carousel-form">
    <table cellspacing="5" cellpadding="5">
        <tr>
            <td colspan="2" align="left"><strong>---<?php _e('Display options', 'wp-posts-carousel') ?>---</strong></td>
        </tr>
        <tr>
            <td align="left"><?php _e('Template', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="template" id="template" class="select">
                    <?php
                        $files_list = Utils::getTemplates();
                        foreach($files_list as $filename) {
                            echo "<option value=\"". $filename ."\">". $filename ."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Post type', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="post_type" id="post_type" class="select">
                <?php
                        $taxonomies = Utils::getTaxonomies();
                        foreach($taxonomies as $key => $type) {
                            echo "<option value=\"". $key ."\">". $type->label ."</option>";
                        }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Posts limit', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="all_items" id="all_items" value="10" size="5">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <fieldset style="border:1px solid #dfdfdf;">
                    <legend><strong><?php _e('Select what you want to display', 'wp-posts-carousel') ?></strong></legend>

                    <table cellspacing="5" cellpadding="5">
                        <tr>
                            <td align="left"><?php _e('Show', 'wp-posts-carousel'); ?>:</td>
                            <td>
                                <select name="show_only" id="show_only" class="select">
                                <?php
                                        $show_list = Utils::getShows();
                                        foreach($show_list as $key => $list) {
                                            echo "<option value=\"". $key ."\">". $list ."</option>";
                                        }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php _e('or', "wp-posts-carousel") ?></td>
                        </tr>
                        <tr>
                            <td align="left"><?php _e('by selected IDs', 'wp-posts-carousel'); ?>:</td>
                            <td>
                                <input type="text" name="posts" id="posts" value="" size="30">
                                <br />
                                <small><?php _e('Please enter Post or custom post type IDs with comma seperated.', 'wp-posts-carousel') ?></small>
                            </td>
                        </tr>
                    </table>
                </fieldset>

            </td>
        </tr>

        <tr>
            <td align="left"><?php _e('Ordering', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="ordering" id="ordering" class="select">
                <?php
                        $ordering_list = Utils::getOrderings();
                        foreach($ordering_list as $key => $list) {
                            echo "<option value=\"". $key ."\">". $list ."</option>";
                        }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Category IDs', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="categories" id="categories" value="" size="30">
                <br />
                <small><?php _e('Please enter Category IDs with comma seperated.', 'wp-posts-carousel') ?></small>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Tag names', 'wp-posts-carousel'); ?>:</td>
            <td>
                <textarea name="tags" id="tags" cols="30"></textarea>
                <br />
                <small><?php _e('Please enter Tag names with comma seperated.', 'wp-posts-carousel') ?></small>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="left">
                <br />
                <strong>---<?php _e('Post options', 'wp-posts-carousel') ?>---</strong>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Show title', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_title" id="show_title" checked="checked">
            </td>
        </tr>
       <tr>
            <td align="left"><?php _e('Show created date', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_created_date" id="show_created_date" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Show description', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="show_description" id="show_description" class="select">
                <?php
                        $description_list = Utils::getDescriptions();
                        foreach($description_list as $key => $list) {
                            echo "<option value=\"". $key ."\">". $list ."</option>";
                        }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><?php _e('Allow shortcodes in full content', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="allow_shortcodes" id="allow_shortcodes">
            </td>
        </tr>
        <tr>
            <td><?php _e('Show category', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_category" id="show_category" checked="checked">
            </td>
        </tr>
        <tr>
            <td><?php _e('Show tags', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_tags" id="show_tags">
            </td>
        </tr>
        <tr>
            <td><?php _e('Show more button', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_more_button" id="show_more_button" checked="checked">
            </td>
        </tr>
        <tr>
            <td><?php _e('Show featured image', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="show_featured_image" id="show_featured_image" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php echo _e('Image source', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="image_source" id="image_source" class="select">
                <?php
                        $source_list = Utils::getSources();
                        foreach($source_list as $key => $list) {
                            echo "<option value=\"". $key ."\">". $list ."</option>";
                        }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Image height', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="image_height" id="image_height" value="100" size="5">%
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Image width', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="image_width" id="image_width" value="100" size="5">%
            </td>
        </tr>


        <tr>
            <td colspan="2" align="left">
                <br />
                <strong>---<?php _e('Carousel options', 'wp-posts-carousel') ?>---</strong>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Items to show', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="items_to_show" id="items_to_show" value="4" size="5">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Slide by', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="slide_by" id="slide_by" value="1" size="5">
                <br />
                <small><?php echo _e("Number of elements to slide.", "wp-posts-carousel") ?></small>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Margin', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="margin" id="margin" value="5" size="5">[px]
                <br />
                <small><?php echo _e("Margin between items.", "wp-posts-carousel") ?></small>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Inifnity loop', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="loop" id="loop" checked="checked">
                <br />
                <small><?php echo _e("Duplicate last and first items to get loop illusion.", "wp-posts-carousel") ?></small>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Pause on mouse hover', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="stop_on_hover" id="stop_on_hover" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Auto play', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="auto_play" id="auto_play" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Autoplay interval timeout', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="auto_play_timeout" id="auto_play_timeout" value="1200" size="5">[ms]
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Autoplay speed', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="auto_play_speed" id="auto_play_speed" value="800" size="5">[ms]
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Show "next" and "prev" buttons', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="nav" id="nav" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Navigation speed', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="nav_speed" id="nav_speed" value="800" size="5">[ms]
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Show dots navigation', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="dots" id="dots" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Dots speed', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="text" name="dots_speed" id="dots_speed" value="800" size="5">[ms]
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Delays loading of images', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="lazy_load" id="lazy_load">
                <br />
                <small><?php echo _e("Images outside of viewport won't be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.","wp-posts-carousel"); ?></small>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Mouse events', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="mouse_drag" id="mouse_drag" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Mousewheel scrolling', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="mouse_wheel" id="mouse_wheel" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Touch events', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="touch_drag" id="touch_drag" checked="checked">
            </td>
        </tr>
        <tr>
            <td align="left"><?php echo _e('Animation', 'wp-posts-carousel'); ?>:</td>
            <td>
                <select name="easing" id="easing" class="select">
                <?php
                    $animation_list = Utils::getAnimations();
                    foreach($animation_list as $key => $list) {
                          echo "<option value=\"". $key ."\">".$list."</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left"><?php _e('Auto height', 'wp-posts-carousel'); ?>:</td>
            <td>
                <input type="checkbox" value="1" name="auto_height" id="auto_height" checked="checked">
                <br />
                <small><?php echo _e("Height adjusted dynamically to highest displayed item.","wp-posts-carousel"); ?></small>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" class="button button-primary button-large" value="<?php _e('Insert Shortcode', 'wp-posts-carousel') ?>" onClick="insert_shortcode();">
            </td>
        </tr>
    </table>
</div>
