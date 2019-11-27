<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knoxweb
 */

?>

<?php if (is_home() || is_single() || is_archive() || is_category() || is_search() || is_404()) { ?>
    </div>
<?php } ?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="foot-left"><?php dynamic_sidebar('footer-menu'); ?></div>
        <!-- .foot-left -->
        <div
                class="foot-right"><?php dynamic_sidebar('footer-copyright'); ?></div>
        <!-- .foot-right -->
    </div><!-- .container -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


<script type="text/javascript"
        src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<?php

$page = get_post();

if ($page->post_title == 'Home') {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.fancybox').fancybox();
            jQuery(".various").fancybox({type: 'ajax'});
            jQuery(".various_com").fancybox({type: 'iframe'});
        });
    </script>
<?php } ?>






</body>
</html>