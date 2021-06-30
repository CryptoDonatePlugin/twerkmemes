<?php get_header(); ?>

<section class="page">
<div class="container">
<div class="row">

<div class="col-lg-8 col-md-8 col-sm-12 col-12">
<div class="memes-loop">
<?php 
	$single = get_the_ID(); 
    echo "<div class='meme'><div class='meme-title'><a href='".get_permalink()."' alt='".get_the_title()."' title='".get_the_title()."'>".get_the_title()."</a></div>";
    
	echo "<div class='meme-image'>";
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 

		the_content('read more');
	
	endwhile; else: 
 endif; 
	echo "</div>";
   
    echo "</div>"; 
	
	
	?>

</div>
</div>

<?php get_sidebar(); ?>
</div>

</div>
</section>

<?php get_footer(); ?>