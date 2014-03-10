    <div class="clear"></div>
    </div> <!-- #main end -->
</div> <!-- #wrapper end -->
<div id="footer">
 
    <div id="footer-inner" class="wrapper">
           
    <?php echo image_credits($post->ID); ?>
    
        <div id="footer-logos">
            <p>
                <a href="" ><img alt="University of Western Sydney" src="<?php bloginfo('template_url'); ?>/img/uws-logo.png"></a>
            </p>
            <p>
                 <a href="" ><img alt="TVS" src="<?php bloginfo('template_url'); ?>/img/tvs-logo.png"></a>
            </p>
        </div>
        <div class="clear"></div>
        <p class="copyright">&copy; <?php echo date('Y'); ?> Rachel Bentley</p>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>