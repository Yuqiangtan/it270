<?php
get_header();

/* Template Name:Tours Page */

?>

<div id="wrapper">
<main>
<?php if(has_post_thumbnail()) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
    

<?php while(have_posts()) : the_post() ; ?>
<h2><?php the_title() ;?></h2>
<?php the_content() ;?>
    
<?php endwhile; ?>




</main>
    
<aside>
    This is my tours page
</aside>
    
    
</div>
    <!-- end wrapper -->
<?php
get_footer();
?>