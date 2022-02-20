<?php
if (get_theme_mod('woo_archive_product_img_flipper', 1) == 1) {
    // Product loop hover image.
    add_action('woocommerce_before_shop_loop_item_title', 'loop_product_hover_image', 50);

    function loop_product_hover_image() {
        global $product;
        $gallery = $product->get_gallery_image_ids();
        $size = 'woocommerce_thumbnail';
        $image_size = apply_filters('single_product_archive_thumbnail_size', $size);

        // Hover image.
        if (!empty($gallery)) {
            $hover = wp_get_attachment_image_src($gallery[0], $image_size);
            echo wp_get_attachment_image($gallery[0], 'shop_catalog', '', $attr = array('class' => 'secondary-image attachment-shop-catalog'));
        }
    }

    add_filter('post_class', 'futurio_pro_product_has_gallery');

    function futurio_pro_product_has_gallery($classes) {
        global $product;
        $post_type = get_post_type(get_the_ID());
        if (!is_admin()) {
            if ($post_type == 'product') {
                $attachment_ids = $product->get_gallery_image_ids();
                if ($attachment_ids) {
                    $classes[] = 'futurio-has-gallery';
                }
            }
        }
        return $classes;
    }

}

if (!function_exists('futurio_pro_product_gallery')) {

    function futurio_pro_product_gallery() {

        if (get_theme_mod('woo_archive_product_gallery_images', 1) == 1) {
            global $product;

            $attachment_ids = $product->get_gallery_image_ids();
            $id = $product->get_id();

            if ($attachment_ids) {
                echo '<div class="arhive-product-gallery">';
                $i = 0;
                $image_numb = absint(get_theme_mod('woo_archive_product_gallery_images_number', 3) + 1);
                foreach ($attachment_ids as $attachment_id) {
                    if (++$i == $image_numb)
                        break;
                    $image_size = get_theme_mod('woo_archive_product_gallery_images_size', 45);
                    $image_link = wp_get_attachment_image($attachment_id, array($image_size, $image_size));
                    echo '<div class="arhive-product-gallery-image">';
                    echo '<a rel="prettyPhoto[productGallery-' . $id . ']" href="' . wp_get_attachment_image_url($attachment_id, 'full') . '">';
                    echo $image_link;
                    echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
    }

    add_action('woocommerce_before_shop_loop_item', 'futurio_pro_product_gallery', 9);
}

if (!function_exists('futurio_pro_generate_float_product')) :

    /**
     * Floating bar for add to cart and product info
     */
    add_action('futurio_after_footer', 'futurio_pro_generate_float_product');

    function futurio_pro_generate_float_product() {
        if (is_product() && get_theme_mod('woo_float_info', 1) == 1) {
            global $product;
            ?>
            <div class="woo-float-info container-fluid">
                <div class="close-me"></div>
                <div class="container">
                    <?php
                    futurio_thumb_img('futurio-thumbnail', '', false, true);
                    the_title('<div class="product_title entry-title">', '</div>');
                    woocommerce_template_single_price();
                    if ($product->is_in_stock()) {
                        if (!$product->is_type('variable')) {
                            woocommerce_template_loop_add_to_cart();
                        } else {
                            ?>
                            <a href="#product-<?php echo get_the_ID() ?>" class="button product_type_variable add_to_cart_button" rel="nofollow">
                                <?php esc_html_e('Select options', 'futurio-pro') ?>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div> 
            <?php
        }
    }

endif;

function futurio_pro_wishlist_products() {
    if (function_exists('YITH_WCWL')) {
        global $product;
        $url = add_query_arg('add_to_wishlist', $product->get_id());
        $id = $product->get_id();
        $wishlist_url = YITH_WCWL()->get_wishlist_url();
        ?>  
        <div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr($id); ?>">
            <div class="yith-wcwl-add-button show" style="display:block" data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('Add to Wishlist', 'futurio-pro'); ?>"> <a href="<?php echo esc_url($url); ?>" rel="nofollow" data-product-id="<?php echo esc_attr($id); ?>" data-product-type="simple" class="add_to_wishlist"></a><img src="<?php echo plugin_dir_url(dirname(__FILE__)) . '/img/loading.gif'; ?>" class="ajax-loading" alt="loading" width="16" height="16"></div>
            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> <span class="feedback"><?php esc_html_e('Added!', 'futurio-pro'); ?></span> <a href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('View Wishlist', 'futurio-pro'); ?></a></div>
            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"> <span class="feedback"><?php esc_html_e('The product is already in the wishlist!', 'futurio-pro'); ?></span> <a href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('Browse Wishlist', 'futurio-pro'); ?></a></div>
            <div class="clear"></div>
            <div class="yith-wcwl-wishlistaddresponse"></div>
        </div>
        <?php
    }
}

add_action('woocommerce_after_shop_loop_item', 'futurio_pro_wishlist_products', 20);
