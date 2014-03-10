<?php
/*
Single Post Template: 2 Column w/ Small Video
*/
get_header();

                // Start the Loop.
while ( have_posts() ) : the_post();

?>
<article <?php post_class('feature-article small-video'); ?> id="page-<?php echo strtolower(str_replace(' ', '-', $post -> post_title)); ?>">
	<?php
    the_title('<header><h1>', '</h1></header>');
	?>

	<section>
		<?php
        the_content();
		?>
	</section>

</article>
<?php
endwhile;

get_footer();
