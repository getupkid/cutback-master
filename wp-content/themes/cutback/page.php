<?php
/*
 * Use this template for the default 3 column layout.
 */
get_header();

if(is_page('watch')) {
?>


<?php
} else {

$post = get_post($post->ID);
?>
<article <?php post_class('feature-article'); ?> id="page-<?php echo strtolower($post -> post_title); ?>">
		<header <?php post_class(strtolower($post -> post_title) . '-header'); ?>>
			<h1><?php echo $post -> post_title; ?></h1>
		</header>
		
		<div class="article-content">
    		<section>
    			<?php echo apply_filters('the_content', $post -> post_content); ?>
    		</section>
    		
    		<footer>
                <p class="share-links">
                    <a href="">SHARE <span class="icon-share"></span></a>
                </p>
                <?php
                    if (get_field('video', 16)) {
                ?>
                    <p class="watch-now">
                        <a href="<?php echo get_permalink(16); ?>"></a>
                    </p>
                <?php
                    }
                ?>
                <div class="clear"></div>
    		</footer>
    	</div>
</article>
<?php
}
get_footer();
