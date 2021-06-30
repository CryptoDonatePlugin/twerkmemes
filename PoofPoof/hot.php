<?php 
$args =  array( 'orderby' => 'comment_count', 'order' => 'DESC','post_type' => 'post', 'posts_per_page' => 10, 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )) ; 
$mems = new WP_Query( $args );

if ( $mems->have_posts() ) : while ( $mems->have_posts() ) : $mems->the_post(); 
	if(get_comments_number()>0){
		$thumb_id = get_post_thumbnail_id();
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
	echo "<div class='comments-count'><i class='fas fa-comments'></i> ".get_comments_number()."</div></div>";
	echo "<div class='meme-image'><a href='".get_permalink()."' alt='".get_the_title()."' title='".get_the_title()."'><img src='".$thumb_url[0]."' alt='".get_the_title()."'/></a></div>";
    
    echo "</div>";
	}
	
    endwhile;  
	the_posts_pagination( array( 'mid_size'  => 2,'prev_text' => __( '&laquo; Newer', 'poofpoof' ),'next_text' => __( 'Older &raquo;', 'poofpoof' ), ) );    	
    wp_reset_postdata();
    endif;
?>