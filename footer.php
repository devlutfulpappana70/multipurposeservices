<?php
/**
 * @Packge     : Rakar
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
    
    /**
    *
    * Hook for Footer Content
    *
    * Hook rakar_footer_content
    *
    * @Hooked rakar_footer_content_cb 10
    *
    */
    do_action( 'rakar_footer_content' );

    echo '<!-- Smoother -->';
            echo '</div>';
        echo '</div>';
    echo '<!-- Smoother -->';

    /**
    *
    * Hook for Back to Top Button
    *
    * Hook rakar_back_to_top
    *
    * @Hooked rakar_back_to_top_cb 10
    *
    */
    do_action( 'rakar_back_to_top' );

    /**
    *
    * rakar grid lines
    *
    * Hook rakar_grid_lines
    *
    * @Hooked rakar_grid_lines_cb 10
    *
    */
    do_action( 'rakar_grid_lines' );

    wp_footer();
    ?>
</body>
</html>