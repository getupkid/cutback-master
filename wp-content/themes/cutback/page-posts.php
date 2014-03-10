<?php
/*
 * Template Name: 4 Blocks &plus; Pagination
 */

get_header();

// Check if page is a parent page or child page
if (is_page() && $post -> post_parent) {
    // If is child page
    $cat_id = get_cat_ID($post -> post_title);
    $posts = get_posts(array('posts_per_page' => 4, 'post_status' => 'publish', 'category' => $cat_id, 'post_type' => 'post'));
} else {
    // If is parent page
    $posts = get_pages(array('post_type' => 'page', 'child_of' => $post -> ID, 'post_status' => 'publish', 'parent' => -1, 'sort_column' => 'menu_order', 'sort_order' => 'ASC'));
}
?>
<div id="feature" <?php post_class(strtolower(get_the_title($post -> ID) . ' feature-article')); ?>>
    <?php foreach($posts as $p) { ?>
    <div <?php post_class(strtolower($p->post_title.' post-child')); ?> id="post-<?php echo $p->ID; ?>">
        
        <a class="post-child-thumb" href="<?php echo get_permalink($p->ID); ?>" title="<?php echo strtoupper($p->post_title); ?>">
        <?php
        if(has_post_thumbnail($p->ID)) {
            echo get_the_post_thumbnail($p->ID, 'feature-image');   
        } else {
            echo '<img src="'.get_bloginfo('template_url').'/img/image-not-available-362.jpg" alt="Image Not Available">';
        }
        ?>
        </a>
        
        <?php
        if (is_page() && $post -> post_parent) {
            if(strlen($p->post_title) > 28) {
                if(get_field('short_title',$p->ID)) {
                    $title = strtoupper(get_field('short_title',$p->ID));
                }
            } else {
                $title = strtoupper($p->post_title);
            }
            
        } else {
            
            $title = strtoupper($p->post_title);
        }        
        ?>
        
        
        <h2><a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo strtoupper($p->post_title); ?>"><?php echo $title; ?></a></h2>
    </div>
    
    <?php } ?>
    
    
</div>
<?php
get_footer();
?>