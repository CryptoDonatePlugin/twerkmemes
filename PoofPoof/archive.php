<?php get_header(); ?>

<section class="page">
<div class="container">
<div class="row">

<div class="col-lg-8 col-md-8 col-sm-12 col-12">

<div class="memes-loop">
<?php while ( have_posts() ) : the_post(); ?>
<?php $thumb_id = get_post_thumbnail_id();
	$single = get_the_ID();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true); 
	$postTime = strtotime(get_the_time('Y-m-d'));
	$nowTime = strtotime(current_time('Y-m-d')); 
	$days = $nowTime - $postTime;
	$day = floor($days/3600/24);
	$categories = get_the_category();
	$categoryLink = get_category_link($categories[0]->term_id);
	$post_tags = get_the_tags();
    echo "<div class='meme'><div class='meme-title'><a href='".get_permalink()."' alt='".get_the_title()."' title='".get_the_title()."'>".get_the_title()."</a></div>";
    echo "<div class='meme-meta'><span class='meme-time'>";
	if($day==0){ echo "today"; }else if($day==1){ echo $day." day ago"; }else{ echo $day." days ago"; }
	echo "</span> <a href='".$categoryLink."' class='category' alt='".$categories[0]->name."' title='".$categories[0]->name."'>".$categories[0]->name."</a> ";
	if ( $post_tags ) {
		foreach( $post_tags as $tag ) { 
			echo "<a class='tag' alt='".$tag->name."' title='".$tag->name."'>#".$tag->name."</a>";
		}
	}
	echo "</div>";
	echo "<div class='meme-image'><a href='".get_permalink()."' alt='".get_the_title()."' title='".get_the_title()."'><img src='".$thumb_url[0]."' alt='".get_the_title()."'/></a></div>";
   
    echo "</div>"; 
	
	
	?>

<?php endwhile;  ?>
<?php 
the_posts_pagination( array( 'mid_size'  => 2,'prev_text' => __( '&laquo; Newer', 'poofpoof' ),'next_text' => __( 'Older &raquo;', 'poofpoof' ), ) );    	
wp_reset_postdata();
?>

</div>


</div>

<?php get_sidebar(); ?>
</div>

</div>
</section>

<?php get_footer(); ?>

