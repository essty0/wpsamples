<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage alexia
 * @since 1.0
 * @version 1.0
 */

?>
<?php 
	 $pageId=get_the_ID();
                    
	if($pageId==718)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>3, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==7480)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>292, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
	}
	elseif($pageId==720)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>60, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
	}
	elseif($pageId==6309)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>289, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
	}
	elseif($pageId==6346)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>290, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
	}

	elseif($pageId==5688)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>288, 'post_type' => 'post', 'posts_per_page' => 200,  'paged' => $paged));
	}
	elseif($pageId==470)
	{	
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>40, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
	
	}
	elseif($pageId==722)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>55, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==10)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>4, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==1072)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>80, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==1361)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>109, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));

	}
	elseif($pageId==1435)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>100, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==1200)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>94, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==1645)
	{
		$paged = ( get_query_var('paged') ) ? absint(get_query_var('paged')) : 1;
		$query=new Wp_Query(array('cat'=>129, 'post_type' => 'post', 'posts_per_page' => 18,  'paged' => $paged));
		
	}
	elseif($pageId==2341 or $pageId==3027)
	{
	 $query="";   
	}
	else
	{
	$query=new Wp_Query(array('cat'=>242));
	}
?>

<article>
	<header class="header">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php alexia_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="content">
		<?php
			the_content();

		?>
		<div class="content_gallery">
		<?php 

			while ( $query->have_posts() ):
			$query->the_post();  
			$meta = get_post_custom();  
		?>
			<div class="content_gallery__item">
				<div class="vitrina">
					<div class="vitrina_header" style="display: flex; justify-content:space-between;font-size: 19px;">
						<h3><?php the_title(); ?></h3>
						<div class="vitrina_fav efav-link" style="display:none;"><a title="Добавить в избранное" rel="nofollow" href="?efavaction=efav_add&efav_postid=<?=the_ID()?>"><i class="fas fa-heart"></i></a></div>
					</div>
					<div class="vitrina_image">
					<?php if(isset($meta["profile_pic"][0])): ?>
						<a href='<?php the_permalink(); ?>'><?=$meta["profile_pic"][0]; ?></a>
					<?php endif;?>
						<div class="vitrina_image__price">
						<?php if(isset($meta["price"][0])) echo $meta["price"][0];?>  руб.</div><!-- ..price-->
					</div><!-- .image-->
					<div class="vitrina_desc"><?=$meta["profile_text"][0];?></div><!-- .desk-->
					<?php if (in_category(3) or in_category(80) or in_category(60) or in_category (100) or in_category (40) or in_category (129) )
							{?>
						<div class="vitrina_sizes">
							<?php
									if(has_tag(214)) echo "<div class='vitrina_size'>XXS</div>";
									if(has_tag(181)) echo "<div class='vitrina_size'>XS</div>";
									if(has_tag(176)) echo " <div class='vitrina_size'>S</div>";
									if(has_tag(177)) echo " <div class='vitrina_size'>M</div>";
									if(has_tag(178)) echo " <div class='vitrina_size'>L</div>";
									if(has_tag(180)) echo " <div class='vitrina_size'>XL</div>";
									if(has_tag(208)) echo "<div class='vitrina_size'>XXL</div>";  
									?>
						</div><!-- .vitrina-sizes-->
						<?php	} ?>
				</div><!-- .vitrina-->
			</div><!-- .content_gallery__item-->
			<?php endwhile;
				wp_reset_postdata();
			?>
		</div><!-- .content_gallery-->
		<?php 	custom_pagination($query->max_num_pages,"",$paged); ?>
	</div><!-- .content -->
</article><!-- #post-## -->
