<?php
get_header();

/* Template Name:Front Page */

?>

<div id="wrapper">
<div class="thumbnail">
<?php if(has_post_thumbnail()) : ?>
<a href="<?php the_permalink();?>">
<?php the_post_thumbnail(); ?>
</a>    
    
<?php endif; ?>
</div>    
<!-- end thumbnail -->
<!-- if we have posts show me the post
if not we do not have posts -->
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post() ; ?>
<h2><?php the_title() ;?></h2>
<?php the_content() ;?>
<?php endwhile; ?>
<?php else : ?>
<?php echo wp_autop('Sorry, no posts were found!'); ?>
<?php endif; ?>


<p>Here is my content</p>
    
    
</div>
    <!-- end wrapper -->
<?php
get_footer();
?>