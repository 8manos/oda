<?php
class custom_carousel extends WpPostsCarouselGenerator {
	
	    public static function generate($atts) {
                global $post;


                /*
                 * default parameters
                 */
                $params = parent::prepareSettings($atts);

                /*
                 * fix to previous versions
                 */
                if ( array_key_exists('show_description', $params) && in_array( $params['show_description'], array('true', 'false') ) ) {
                        $params['show_description'] = $params['show_description'] == 'true' ? 'excerpt' : 'false';
                }


                /*
                 * post type
                 */
                $post_type = $params['post_type'] ? $params['post_type'] : 'post';
                $post_type_category = $params['post_type'].'_category';
                $post_type_tag = $params['post_type'].'_tag';

                if ($post_type === 'post') {
                        $post_type_category = 'category';
                }

                /*
                 * print styles
                 */
                //wp_print_scripts('owl.carousel');
                //wp_print_styles('owl.carousel.style');

                /*
                 * theme
                 */
                $theme =  $params['template'];
                $theme_name = str_replace('.css', '', $theme);

                /*
                 * check if template css file exists
                 */
                $plugin_theme_url = plugins_url( dirname(plugin_basename(__FILE__)) ) . '/templates/' . $theme;
                $plugin_theme_file = plugin_dir_path( __FILE__ ) . '/templates/'. $theme;

                $site_theme_url = get_template_directory_uri() . '/css/wp-posts-carousel/' . $theme;
                $site_theme_file = get_template_directory() . '/css/wp-posts-carousel/' . $theme;

                if ( @file_exists($plugin_theme_file) ) {
                        wp_enqueue_style( 'wp_posts_carousel-carousel-style-'. $theme_name, $plugin_theme_url, true );
                } else if ( @file_exists($site_theme_file) ) {
                        wp_enqueue_style( 'wp_posts_carousel-carousel-style-'. $theme_name, $site_theme_url, true );
                } else {
                        return '<div class="error"><p>'. sprintf( __('Theme - %s.css stylesheet is missing.', 'wp-posts-carousel'), $theme_name ) .'</p></div>';
                }

                /*
                 * prepare html and loop
                 */
                $out = '<div id="wp-posts-carousel-'. $params['id'] .'" class="'. $theme_name .'-theme wp-posts-carousel owl-carousel">';

                /*
                 * prepare sql query
                 */
                $query_args = array('post_type'      =>  $post_type,
                                   'post_status'    =>  'publish',
                                   'posts_per_page' =>  $params['all_items'],
                                   'no_found_rows'  =>  1,
                                   //'post__not_in' =>  array($post->ID) //exclude current post
                                   );

                $sql_i = 0;

                if ($params['posts'] != "") {
                        $query_args['post__in'] = explode(',', $params['posts']);
                }

                if ($params['categories'] != "" || $params['tags'] != "") {
                        $query_args['tax_query'] = array('relation' => 'AND', array());
                }

                if ($params['categories'] != "") {
                        $query_args['tax_query'][$sql_i++] = array('taxonomy'  =>  $post_type_category,
                                                                  'field'     =>  'id',
                                                                  'terms'     =>  explode(',', $params['categories']),
                                                                  'operator'  => 'IN'
                                                           );
                }

                if ($params['tags'] != "") {
                        $query_args['tax_query'][$sql_i++] = array('taxonomy'  =>  $post_type_tag,
                                                                  'field'     =>  'name',
                                                                  'terms'     =>  explode(',', $params['tags']),
                                                                  'operator'  => 'IN'
                                                            );
                }


				if ($params['posts'] != "") {
						$query_args['orderby'] = 'ID';
				} else {
						switch($params['show_only']) {
								case "id":
										$query_args['orderby'] = 'ID';
										break;

								case "newest":
										$query_args['orderby'] = 'post_date';
										break;
								case "title":
								default:
										$query_args['orderby'] = 'post_title';
										break;
						}
				}

				if( in_array($params['ordering'], array('asc', 'desc')) ) {
						$query_args['order'] = $params['ordering'];
				}else {
						$query_args['order'] = 'desc';
				}
                /*
                 * end sql query
                 */

                /*
                 * display popular posts from Wordrpess Popular Posts
                 * period: 1 MONTH from now
                 */
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                if( $params['show_only'] === "popular" && is_plugin_active( 'wordpress-popular-posts/wordpress-popular-posts.php' ) ) {
                        /*
                         * include custom queries
                         */
                        require_once("includes/wp-posts-carousel-popular-posts-query.class.php");
                        $loop = new WP_Posts_Carousel_Popular_Posts_Query( apply_filters( 'wpc_query', $query_args ) );
                } else {
                        $loop = new WP_Query( apply_filters( 'wpc_query', $query_args ) );
                }

                /*
                 * if random, we shuffle array
                 */
                if($params['ordering'] === "random") {
                        shuffle($loop->posts);
                }

                /*
                 * check if there are more then one item
                 */
                $params['post_count'] = $loop->post_count;
                if(!$params['post_count'] > 1) {
                    return false;
                }

                /*
                 * products loop
                 */
                while($loop->have_posts()) {
                        $loop->the_post();

                        $post_url = get_permalink($post->ID);
                        $title = '';
                        $featured_image = '';
                        $description = '';
                        $tags = '';
                        $created_date = '';
                        $category = '';
                        $buttons = '';

                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),$params['image_source']);

                        /*
                         * if no featured image for the product
                         */
                        if ($image[0] == '' || $image[0] == '/') {
                                $image[0] = plugin_dir_url( __FILE__ ).'images/placeholder.png';
                        }

                        /*
                         * show featured image
                         */
                        if ($params['show_featured_image'] === 'true') {

                                $data_src = 'src="'. $image[0] .'"';
                                $image_class = null;

                                if ($params['lazy_load'] === 'true' ) {
                                    $data_src = 'data-src="'. $image[0] .'" data-src-retina="'. $image[0] .'"';
                                    $image_class = 'class="owl-lazy"';
                                }

                                $featured_image = '<div class="wp-posts-carousel-image" data-toggle="modal" data-target="#'.$post->post_name.'">';
                                        //$featured_image .= '<a href="'. $post_url .'" title="'. __('Read more', 'wp-posts-carousel') .' '. $post->post_title .'">';
                                               $featured_image .= '<img alt="'. $post->post_title .'" style="max-width:'. $params['image_width'] .'%;max-height:'. $params['image_height'] .'%" '. $data_src . $image_class .'>';
                                        //$featured_image .= '</a>';
                                $featured_image .= '</div>';
                        }

                        /*
                         * show title
                         */
                        if ($params['show_title'] === 'true') {
                                $title = '<h3 class="wp-posts-carousel-title">';
                                       // $title .= '<a href="'. $post_url .'" title="'. $post->post_title .'">'. $post->post_title .'</a>';
                                       $title.='<span data-toggle="modal" data-target="#'.$post->post_name.'">'.$post->post_title.'</span>';
                                $title .= '</h3>';
                        }

                        /*
                         * show title
                         */
						 $categories_list = get_the_terms($post->ID, $post_type_category);
                        if ($params['show_category'] === 'true') {
                                if ($categories_list) {
                                        $category = '<p class="wp-posts-carousel-categories">';
                                                foreach ($categories_list as $cat) {
                                                        $category .= '<a href="'.  get_category_link( $cat->term_id ).'" title="' . esc_attr( sprintf( __( "View all items in %s" ), $cat->name ) ) . '">'.$cat->name.'</a> ';
                                                }
                                        $category .= '</p>';
                                }
                        }

                        /*
                         * show tags
                         */
						$tags_list = get_the_term_list(get_the_ID(), $post_type_tag, '', ' ', '' );
                        if ($params['show_tags'] == 'true') {
                                $tags = '<p class="wp-posts-carousel-tags">';
                                        $tags .= $tags_list;
                                $tags .= '</p>';
                        }

                        /*
                         * show created date
                         */
                        if ($params['show_created_date'] === 'true') {
                                $created_date = '<p class="wp-posts-carousel-created-date">';
                                        $created_date .= get_the_date();
                                $created_date .= '</p>';
                        }

                        /*
                         * show excerpt or full content
                         */
                        if ($params['show_description'] === 'excerpt') {
                                $description = '<div class="wp-posts-carousel-desc">'. get_the_excerpt() .'</div>';
                        } else if ($params['show_description'] === 'content') {
                                $description = '<div class="wp-posts-carousel-desc">'. ( $params['allow_shortcodes'] === 'true' ? do_shortcode( get_the_content( '', true) ) : get_the_content() ) .'</div>';
                        }

                        /*
                         * show button
                         */
                        if ($params['show_more_button'] === 'true') {
                                $buttons = '<p class="wp-posts-carousel-buttons">';
                                        $buttons .= '<a href="'. $post_url .'" class="wp-posts-carousel-more-button button" title="'. __('Read more', 'wp-posts-carousel') .' '.$post->post_title.'">'. __('read more', 'wp-posts-carousel') .'</a>';
                                $buttons .= '<p>';
                        }

                        /*
                         * list products
                         */
                        $out .= '<div class="wp-posts-carousel-slide slides-'. $params['items_to_show'] .'">';
                                $out .= '<div class="wp-posts-carousel-container">';
                                        do_action( 'wpc_before_item_content', $params );

                                        $out .= apply_filters( 'wpc_item_featured_image', $featured_image, array( 'post_url' => $post_url,
                                                                                                                  'post' => $post,
                                                                                                                  'image' => $image[0],
                                                                                                                  'params' => $params,
                                                                                                                ) );

                                        $out .= '<div class="wp-posts-carousel-details">';
                                                $out .= apply_filters( 'wpc_item_title', $title, array( 'post_url' => $post_url,
                                                                                                                  'post' => $post,
                                                                                                                  'params' => $params,
                                                                                                                ) );
                                                $out .= apply_filters( 'wpc_item_created_date', $created_date, array( 'date' => get_the_date(),
                                                                                                                      'post' => $post,
                                                                                                                      'params' => $params,
                                                                                                                    ) );
                                                $out .= apply_filters( 'wpc_item_categories', $category, array( 'categories_list' => $categories_list,
                                                                                                                'post' => $post,
                                                                                                                'params' => $params,
                                                                                                              ) );
                                                $out .= apply_filters( 'wpc_item_description', $description, array( 'post' => $post,
                                                                                                                    'params' => $params,
                                                                                                                  ) );
                                                $out .= apply_filters( 'wpc_item_tags', $tags, array( 'tags_list' => $tags_list,
                                                                                                      'post' => $post,
                                                                                                      'params' => $params,
                                                                                                    ) );
                                                $out .= apply_filters( 'wpc_item_buttons', $buttons , array( 'post_url' => $post_url,
                                                                                                             'post' => $post,
                                                                                                             'params' => $params,
                                                                                                           ) );
                                        $out .= '</div>';

                                        do_action( 'wpc_after_item_content', $params );
                                $out .= '</div>';
                        $out .= '</div>';
                }
                /*
                 * reset wordpress query
                 */
                //wp_reset_query();
                wp_reset_postdata();

                $out .= '</div>';

                /*
                 * generate jQuery script for FlexCarousel
                 */
                $out .= parent::carousel($params);
                return $out;
        }
		
	
 }
 
 
 class custom_wpcarousalwidget extends WpPostsCarouselWidget{
	function myfunc(){
		parent::WpPostsCarouselWidget;
 }
			function widget( $args, $instance ) {
                extract( $args );

                $title = apply_filters("widget_title", $instance["title"]);

                echo $before_widget;

                if ($title) {
                        echo $before_title . $title . $after_title;
                }

                echo custom_carousel::generate($instance);
                echo $after_widget;
        }
        
    function form($instance) {
        /*
         * load defaults if new
         */
        if ( empty($instance) ) {
                $instance = custom_carousel::getDefaults();
        }

?>
    <p>
        <label for="<?php echo $this->get_field_id("title"); ?>"><?php _e("Title"); ?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr(array_key_exists('title', $instance) ? $instance["title"] : ''); ?>" />
    </p>

    <p>
        <strong>--- <?php _e("Display options", "wp-posts-carousel") ?> ---</strong>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("template"); ?>"><?php _e("Template", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("template"); ?>" id="<?php echo $this->get_field_id("template"); ?>" class="select">
            <?php
                $files_list = Utils::getTemplates();
                foreach($files_list as $list) {
                    echo "<option value=\"".$list."\" ". (esc_attr($instance["template"]) == $list ? "selected=\"selected\"" : null) .">". $list ."</option>";
                }
            ?>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("post_type"); ?>"><?php _e("Post type", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("post_type"); ?>" id="<?php echo $this->get_field_id("post_type"); ?>" class="select">
          <?php
                $taxonomies = Utils::getTaxonomies();
                foreach($taxonomies as $key => $type) {
                    echo "<option value=\"" .$key ."\" ". (esc_attr($instance["post_type"]) == $key ? 'selected="selected"' : null) .">". $type->label ."</option>";
                }
          ?>
        </select>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id("all_items"); ?>"><?php _e("Posts limit", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("all_items"); ?>" name="<?php echo $this->get_field_name("all_items"); ?>" type="text" value="<?php echo esc_attr($instance["all_items"]); ?>" />
    </p>

    <div>
        <fieldset style="border:1px solid #dfdfdf;padding:10px;">
            <legend><strong><?php _e('Select what you want to display', 'wp-posts-carousel') ?></strong></legend>
            <p>
                <label for="<?php echo $this->get_field_id("show_only"); ?>"><?php _e("Show", "wp-posts-carousel"); ?>:</label>
                <br />
                <select name="<?php echo $this->get_field_name("show_only"); ?>" id="<?php echo $this->get_field_id("show_only"); ?>" class="select">
                  <?php
                        $show_list = Utils::getShows();
                        foreach($show_list as $key => $list) {
                            echo "<option value=\"".$key."\" ". (esc_attr($instance["show_only"]) == $key ? 'selected="selected"' : null) .">". $list ."</option>";
                        }
                  ?>
                </select>
            </p>
            <p><?php _e('or', "wp-posts-carousel") ?></p>
            <p>
                <label for="<?php echo $this->get_field_id("posts"); ?>"><?php _e("by selected IDs", "wp-posts-carousel"); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id("posts"); ?>" name="<?php echo $this->get_field_name("posts"); ?>" type="text" value="<?php echo esc_attr($instance["posts"]); ?>" />
                <br />
                <small><?php _e("Please enter Post or custom post type IDs with comma seperated.", "wp-posts-carousel") ?></small>
            </p>
        </fieldset>
    </div>

    <p>
        <label for="<?php echo $this->get_field_id("ordering"); ?>"><?php _e("Ordering", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("ordering"); ?>" id="<?php echo $this->get_field_id("ordering"); ?>" class="select">
          <?php
                $ordering_list = Utils::getOrderings();
                foreach($ordering_list as $key => $list) {
                    echo "<option value=\"" .$key ."\" ". (esc_attr($instance["ordering"]) == $key ? 'selected="selected"' : null) .">". $list ."</option>";
                }
          ?>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("categories"); ?>"><?php _e("Category IDs", "wp-posts-carousel"); ?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id("categories"); ?>" name="<?php echo $this->get_field_name("categories"); ?>" type="text" value="<?php echo esc_attr($instance["categories"]); ?>" />
        <br />
        <small><?php _e("Please enter Category IDs with comma seperated.", "wp-posts-carousel") ?></small>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("tags"); ?>"><?php _e("Tag names", "wp-posts-carousel"); ?>:</label>
        <textarea class="widefat" id="<?php echo $this->get_field_id("tags"); ?>" name="<?php echo $this->get_field_name("tags"); ?>"><?php echo esc_attr($instance["tags"]); ?></textarea>
        <br />
        <small><?php _e("Please enter Tag names with comma seperated.", "wp-posts-carousel") ?></small>
    </p>

    <p>
        <strong>--- <?php _e("Post options", "wp-posts-carousel") ?> ---</strong>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_title"); ?>" name="<?php echo $this->get_field_name("show_title"); ?>" <?php array_key_exists('show_title', $instance) ? checked( (bool) $instance["show_title"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_title"); ?>"><?php _e("Show title", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_created_date"); ?>" name="<?php echo $this->get_field_name("show_created_date"); ?>" <?php array_key_exists('show_created_date', $instance) ? checked( (bool) $instance["show_created_date"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_created_date"); ?>"><?php _e("Show created date", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("show_description"); ?>"><?php _e("Show description", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("show_description"); ?>" id="<?php echo $this->get_field_id("show_description"); ?>" class="select">
          <?php
                $description_list = Utils::getDescriptions();
                foreach($description_list as $key => $list) {
                    echo "<option value=\"" .$key ."\" ". (esc_attr($instance["show_description"]) == $key ? 'selected="selected"' : null) .">". $list ."</option>";
                }
          ?>
        </select>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("allow_shortcodes"); ?>" name="<?php echo $this->get_field_name("allow_shortcodes"); ?>" <?php array_key_exists('allow_shortcodes', $instance) ? checked( (bool) $instance["allow_shortcodes"], false ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("allow_shortcodes"); ?>"><?php _e("Allow shortcodes in full content", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_category"); ?>" name="<?php echo $this->get_field_name("show_category"); ?>" <?php array_key_exists('show_category', $instance) ? checked( (bool) $instance["show_category"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_category"); ?>"><?php _e("Show category", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_tags"); ?>" name="<?php echo $this->get_field_name("show_tags"); ?>" <?php array_key_exists('show_tags', $instance) ? checked( (bool) $instance["show_tags"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_tags"); ?>"><?php _e("Show tags", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_more_button"); ?>" name="<?php echo $this->get_field_name("show_more_button"); ?>" <?php array_key_exists('show_more_button', $instance) ? checked( (bool) $instance["show_more_button"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_more_button"); ?>"><?php _e("Show more button", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_featured_image"); ?>" name="<?php echo $this->get_field_name("show_featured_image"); ?>" <?php array_key_exists('show_featured_image', $instance) ? checked( (bool) $instance["show_featured_image"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("show_featured_image"); ?>"><?php _e("Show featured image", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("image_source"); ?>"><?php echo _e("Image source", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("image_source"); ?>" id="<?php echo $this->get_field_id("image_source"); ?>" class="select">
            <?php
                $source_list = Utils::getSources();
                foreach($source_list as $key => $list) {
                      echo "<option value=\"". $key ."\" ". (esc_attr($instance["image_source"]) == $key ? 'selected="selected"' : null) .">". $list ."</option>";
                }
            ?>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("image_height"); ?>"><?php _e("Image height", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="10" id="<?php echo $this->get_field_id("image_height"); ?>" name="<?php echo $this->get_field_name("image_height"); ?>" type="text" value="<?php echo esc_attr($instance["image_height"]); ?>" />%
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("image_width"); ?>"><?php _e("Image width", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="10" id="<?php echo $this->get_field_id("image_width"); ?>" name="<?php echo $this->get_field_name("image_width"); ?>" type="text" value="<?php echo esc_attr($instance["image_width"]); ?>" />%
    </p>


    <p>
        <strong>--- <?php _e("Carousel options", "wp-posts-carousel") ?> ---</strong>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("items_to_show"); ?>"><?php _e("Items to show", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("items_to_show"); ?>" name="<?php echo $this->get_field_name("items_to_show"); ?>" type="text" value="<?php echo esc_attr($instance["items_to_show"]); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("slide_by"); ?>"><?php _e("Slide by", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("slide_by"); ?>" name="<?php echo $this->get_field_name("slide_by"); ?>" type="text" value="<?php echo esc_attr($instance["slide_by"]); ?>" />
        <br />
        <small><?php echo _e("Number of elements to slide.", "wp-posts-carousel") ?></small>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("margin"); ?>"><?php _e("Margin", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("margin"); ?>" name="<?php echo $this->get_field_name("margin"); ?>" type="text" value="<?php echo esc_attr($instance["margin"]); ?>" />[px]
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("loop"); ?>" name="<?php echo $this->get_field_name("loop"); ?>" <?php array_key_exists('loop', $instance) ? checked( (bool) $instance["loop"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("loop"); ?>"><?php _e("Inifnity loop", "wp-posts-carousel"); ?></label>
        <br />
        <small><?php echo _e("Duplicate last and first items to get loop illusion.", "wp-posts-carousel") ?></small>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("stop_on_hover"); ?>" name="<?php echo $this->get_field_name("stop_on_hover"); ?>" <?php array_key_exists('stop_on_hover', $instance) ? checked( (bool) $instance["stop_on_hover"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("stop_on_hover"); ?>"><?php _e("Pause on mouse hover", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("auto_play"); ?>" name="<?php echo $this->get_field_name("auto_play"); ?>" <?php array_key_exists('auto_play', $instance) ? checked( (bool) $instance["auto_play"], true ): null; ?> value="1" />
        <label for="<?php echo $this->get_field_id("auto_play"); ?>"><?php _e("Auto play", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("auto_play_timeout"); ?>"><?php _e("Autoplay interval timeout", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("auto_play_timeout"); ?>" name="<?php echo $this->get_field_name("auto_play_timeout"); ?>" type="text" value="<?php echo esc_attr($instance["auto_play_timeout"]); ?>" />[ms]
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("auto_play_speed"); ?>"><?php _e("Autoplay speed", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("auto_play_speed"); ?>" name="<?php echo $this->get_field_name("auto_play_speed"); ?>" type="text" value="<?php echo esc_attr($instance["auto_play_speed"]); ?>" />[ms]
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("nav"); ?>" name="<?php echo $this->get_field_name("nav"); ?>" <?php array_key_exists('nav', $instance) ? checked( (bool) $instance["nav"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("nav"); ?>"><?php _e("show \"next\" and \"prev\" buttons", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("nav_speed"); ?>"><?php _e("Navigation speed", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("nav_speed"); ?>" name="<?php echo $this->get_field_name("nav_speed"); ?>" type="text" value="<?php echo esc_attr($instance["nav_speed"]); ?>" />[ms]
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("dots"); ?>" name="<?php echo $this->get_field_name("dots"); ?>" <?php array_key_exists('dots', $instance) ? checked( (bool) $instance["dots"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("dots"); ?>"><?php _e("Show dots navigation", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("dots_speed"); ?>"><?php _e("Dots speed", "wp-posts-carousel"); ?>:</label>
        <br />
        <input size="5" id="<?php echo $this->get_field_id("dots_speed"); ?>" name="<?php echo $this->get_field_name("dots_speed"); ?>" type="text" value="<?php echo esc_attr($instance["dots_speed"]); ?>" />[ms]
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("lazy_load"); ?>" name="<?php echo $this->get_field_name("lazy_load"); ?>" <?php array_key_exists('lazy_load', $instance) ? checked( (bool) $instance["lazy_load"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("lazy_load"); ?>"><?php _e("Delays loading of images", "wp-posts-carousel"); ?></label>
        <br />
        <small><?php echo _e("Images outside of viewport won't be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.","wp-posts-carousel"); ?></small>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("mouse_drag"); ?>" name="<?php echo $this->get_field_name("mouse_drag"); ?>" <?php array_key_exists('mouse_drag', $instance) ? checked( (bool) $instance["mouse_drag"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("mouse_drag"); ?>"><?php _e("Mouse events", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("mouse_wheel"); ?>" name="<?php echo $this->get_field_name("mouse_wheel"); ?>" <?php array_key_exists('mouse_wheel', $instance) ? checked( (bool) $instance["mouse_wheel"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("mouse_wheel"); ?>"><?php _e("Mousewheel scrolling", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("touch_drag"); ?>" name="<?php echo $this->get_field_name("touch_drag"); ?>" <?php array_key_exists('touch_drag', $instance) ? checked( (bool) $instance["touch_drag"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("touch_drag"); ?>"><?php _e("Touch events", "wp-posts-carousel"); ?></label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("easing"); ?>"><?php echo _e("Animation", "wp-posts-carousel"); ?>:</label>
        <br />
        <select name="<?php echo $this->get_field_name("easing"); ?>" id="<?php echo $this->get_field_id("easing"); ?>" class="select">
            <?php
                    $animation_list = Utils::getAnimations();
                    foreach($animation_list as $key => $list) {
                          echo "<option value=\"". $key ."\" ". (esc_attr($instance["easing"]) == $key ? 'selected="selected"' : null) .">". $list ."</option>";
                    }
            ?>
        </select>
    </p>
    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("auto_height"); ?>" name="<?php echo $this->get_field_name("auto_height"); ?>" <?php array_key_exists('auto_height', $instance) ? checked( (bool) $instance["auto_height"], true ): null; ?> value="1"/>
        <label for="<?php echo $this->get_field_id("auto_height"); ?>"><?php _e("Auto height", "wp-posts-carousel"); ?></label>
        <br />
        <small><?php echo _e("Height adjusted dynamically to highest displayed item.","wp-posts-carousel"); ?></small>
    </p>
<?php
    }
}    

 
 
 
 add_action("widgets_init", create_function("", "return register_widget('custom_wpcarousalwidget');"));
 
 
 /*
 class custom_slider_shortcode extends WpPostsCarouselShortcodeDecode {	
        public function initialize($atts, $content = null, $code = "") {	
                return custom_carousel::generate($atts);
        }
}*/

