<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage alexia
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section id="content">
	<div class="container">
		<div class="row single_dress">
			<div class="primary">
				<?php
				
				/* Start the Loop */
				if (is_single(8615)) { // /test/ page for filter 
				?>
					<header class="header">
						<?php the_title('<h1>', '</h1>'); ?>
					</header>
					<style>
						#mobileFitting {
							left: -9999px;

						}
					</style>
				<?php
					$collection = [241, 210, 83, 202, 230, 66, 213, 41, 237];
					$sizes = [
						'XXS' => 214,
						'XS'  =>  181,
						'S' => 176,
						'M' => 177,
						'L' => 178,
						'XL' => 180,
						'XXL' => 208

					];

					$dressLength = [
						"short" => 90,
						"midi" => 238,
						"long" => 33

					];


					$data = $_GET;
					
				
					// Get posts based on request
					if (empty($data['size']) && empty($data['length']) && empty($data['color']) && empty($data['collection'])) $blankReq = 1;
					else $blankReq = 0;

					function getFilteredPosts($arr)
					{
						$sizeID = [];
						$original_query = $wp_query;
						global $post;
						$args = array('tag__in' => $arr, 'posts_per_page' => -1, 'cat' => '3,60,292');
						$wp_query = new WP_Query($args);
						if ($wp_query->have_posts()) :

							while ($wp_query->have_posts()) : $wp_query->the_post();
								// $response = $response .  get_the_title($post->ID) . " ";
								$sizeID[] = $post->ID;

							endwhile;
						// print_r($sizeID);

						endif;
						$wp_query = null;
						$wp_query = $original_query;
						wp_reset_postdata();
						return $sizeID;
					}

					//Get posts by collection
					$allCollection = [];
					if(isset($data) && isset($data['collection']) && !(empty($data['collection'])) && strlen($data['collection']) <= 29){
						$collectionStr = sanitize_text_field($data['collection']);
						$strCollection = preg_split("/:/", $collectionStr);

						foreach ($strCollection as $str) {
							$allCollection[] = $str;
						}
						$collectionID = getFilteredPosts($allCollection);
					} else {
						$collectionID = [];
					}
					


					// Get posts by size
					$allSizes = [];
					if (isset($data) && isset($data["size"]) && !(empty($data['size'])) && (strlen($data['size']) <= 19)) {
						$sizeStr = sanitize_text_field($data['size']);
						$strSize = preg_split('/:/', $sizeStr);
						foreach ($strSize as $str) {
							$allSizes[] = $sizes[$str];
						}
						
					} else {
						$allSizes = [214, 181, 176, 177, 178, 180, 208];
						// $sizeID = [];
					}
					$sizeID = getFilteredPosts($allSizes);


					// Get posts by length
					if (isset($data) && isset($data["length"]) && !(empty($data['length'])) && (strlen($data['length']) <= 15)) {
						$sizeStr = sanitize_text_field($data['length']);
						$strLength = preg_split('/:/', $sizeStr);
						foreach ($strLength as $str) {
							$allLength[] = $dressLength[$str];
							
						}
					} else {
						$lengthID = [90,33,238];
					}
					$lengthID = getFilteredPosts($allLength);
					

					// Get posts by color
					if (isset($data) && isset($data["color"]) && (strlen($data['color']) <= 55) && !(empty($data['color']))) {
						$colorStr = sanitize_text_field($data['color']);
						$strColor = preg_split('/:/', $colorStr);
						foreach ($strColor as $str) {
							$allColor[] = (int)$str;
						}
						
					} else {
						$allColor = [188, 5, 45, 63, 27, 31, 52, 103, 21, 99, 25, 66, 194, 49, 30, 28, 29, 6];
						// $colorID = [];
					}
					$colorID = getFilteredPosts($allColor);
					if(empty($collectionID) && !(empty($data['size'])) && empty($data['color']) && empty($data['length'])){
						
						$commonArr = $sizeID;
					} elseif(empty($data['color']) && !(empty($collectionID)) && empty($data['size']) && empty($data['length'])){
						$commonArr = $collectionID;
					} elseif(empty($collectionID)){
						$commonArr = array_intersect($sizeID, $lengthID, $colorID);
					}
					else {
						
						$commonArr = array_intersect($sizeID, $lengthID, $colorID, $collectionID);
					}
					

					if (isset($commonArr) && count($commonArr) > 0 && !($blankReq)) {
						$original_query = $wp_query;
						global $post;
						$paged = ($data['pp']) ? $data['pp'] : 1;
						foreach ($commonArr as $item) {
							$resultArr[] = $item;
						}

						$args = array(
							'post_type' => 'post',
							'post__in' => $resultArr,
							// 'posts_per_page' => 5,
							'paged' => $paged,
							'offset' => (($paged - 1) * 18)
						);
						$wp_query = new WP_Query($args);
						if ($wp_query->have_posts()) :
							if($data["collection"] == 202){
						echo '<div style="margin:1em 0">
						<p><b>Что одеть на вечеринку в стиле Великий Гэтсби?</b><br>
Один из самых не простых вопросов, когда Вас пригласили на тематический вечер. Посмотрите женские образы у нас в наличии. Не нужно шить или покупать платье если вы собираетесь на стилизованную вечеринку Гэтсби , воспользуйтесь услугой проката, это сэкономит ваши деньги и время.</p>
<p><b>Что у нас есть?</b></br>
Короткие, длинные, с бахромой, расшитые бисером и камнями, сверкающие и струящиеся шелковые платья – все это доступно в прокат в Нижнем Новгороде в нашем шоуруме в центре города. Примерка бесплатно, по записи <a href="tel:+79506142188">+7(950)614-21-88</a>.</p>
<p>У нас можно собрать полный образ с аксессуарами, в нашем арсенале есть : тиары, перья, жемчуг, перчатки, браслеты, повязки, боа, клатчи пончо, меховые накидки и многое другое.</p>
						</div>';
						
					}
							echo "<div class='content_gallery'>";
							while ($wp_query->have_posts()) : $wp_query->the_post();
								get_template_part('template-parts/post/content', 'filter');

							endwhile;
							echo "</div>";
						endif;
						echo "<nav class='navigation pagination'><div class='nav-links'>";
						echo paginate_links(array(
							
							'base' => @add_query_arg('pp', '%#%'),
							'format' => '?pp=%#%&',
							'total' => $wp_query->max_num_pages,
							'current' => $paged,
							'add_args'        => false,
							'prev_next'       => True,
							'prev_text'       => __('&laquo;'),
							'next_text'       => __('&raquo;'),
							'type'            => 'plain',
							'add_fragment'    => ''
						));
						echo "</div></nav>";

						wp_reset_postdata();




						$wp_query = null;
						$wp_query = $original_query;
					} else {
						echo "Не найдено! Попробуйте изменить параметры.";
					}
				} else {
					while (have_posts()) : the_post();
						get_template_part('template-parts/post/content', get_post_format());
					endwhile; // End of the loop.
				}
				?>
			</div>
			<div class="secondary">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();
