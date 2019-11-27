<?php
/**
 * Plugin Name:     Mwra Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Custom plugin for MWRA Advisory site
 * Author:          Myriad, Inc
 * Author URI:      myriadweb.com
 * Text Domain:     mwra-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Mwra_Plugin
 */

// Your code starts here.

function get_documents($args) {
	$output = ''; $result = array();
	$query = new \WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$library_type = get_field('select_library_type');
			$pdf = get_field('pdf_attatchment');
			$video = get_field('vimeo_attachment');
			$thumb = has_post_thumbnail() ? get_the_post_thumbnail(get_the_ID(), 'thumbnail') : '<img src="' . get_stylesheet_directory_uri() . '//images/mwra-no-image.png" alt="thumb" />';
			$date = get_the_date('F j, Y');
			$cat = get_the_category();
			$result[] = array(
				'library_type' => $library_type,
				'pdf' => $pdf,
				'video' => $video,
				'thumb' => $thumb,
				'date' => $date,
				'cat' => $cat,
				'title' => get_the_title()
			);
		}
		wp_reset_postdata();
	}
	return $result;
}

function get_popular_topics() {
	$args = array(
		'post_type' => 'cpt-library',
		'posts_per_page' => 7,
		'meta_query' => array(
			array(
				'key' => 'show_in_popular_topics',
				'value' => '1',
			),
			array(
				'key'   => 'select_library_type',
				'value' => 'pdf',
			)
		),
		'order' => 'ASC',
		'orderby'  => 'meta_value_num',
	);
	$query = new \WP_Query($args);
	if ($query->have_posts()) {
		$output = '<ul class="libraries-tag-list">';
		while ($query->have_posts()) {
			$query->the_post();
			$library_type = get_field('select_library_type');
			$pdf = get_field('pdf_attatchment');
			//var_dump($pdf);
			$video = get_field('vimeo_attachment');
			$thumb = has_post_thumbnail() ? get_the_post_thumbnail() : '<img src="' . get_stylesheet_directory_uri() . '//images/mwra-no-image.png" alt="thumb" />';
			if ($library_type == 'video') {
				$item = '<a href="' . $video . '" class="fancybox-vimeo" alt="' . get_the_title() . '">' . $thumb . '</a>';
			}
			else {
				$item = '<a href="' . $pdf['url'] . '" class="fancybox-pdf" alt="' . get_the_title() . '">' . $thumb . '</a>
						<div style="display:none" class="fancybox-hidden">
							<div id="pdf_document-'. get_the_ID() .'" class="hentry" style="width:1000px;max-width:100%;">
								' . $pdf['url'] . '
							</div>
						</div>';
			}
			$output .= '<li class="library-list">' . $item . '</li>';
		}
		$output .= '</ul>';
		wp_reset_postdata();
	}
	return $output;
}

function get_documents_by_category() {
	// get all categories; for each category, get all documents associated with it
	$output = '<div class="document-categories row" style="width: 100%;">';
	$categories = get_categories(array('taxonomy' => 'library-cat'));
	foreach ($categories as $category) {
		if (!strstr($category->slug, 'video')) {
			$args = array(
				'post_type' => 'cpt-library',
				'posts_per_page' => 7,
				'tax_query' => array(
					array(
						'taxonomy' => 'library-cat',
						'field' => 'term_id',
						'terms' => $category->term_id
					)
				)
			);
			$docs = get_documents($args);
			if ($docs) {
				$output .= '<div class="col-6 col-md-3 category">
				<div class="cat-title">' . $category->name . '</div>
				<div class="cat-thumb">' . $docs[0]['thumb']. '</div>
				<div class="documents">
					<div class="controls"><a href="/libraries-category/' . $category->slug . '">View All</a><i class="fa fa-times"></i></div>';
				foreach ($docs as $doc) {
					if ($doc['library_type'] == 'video') {
						$link_url = $doc['video'];
						$link_class = 'fancybox-vimeo';
					}
					else {
						$link_url = $doc['pdf']['url'];
						$link_class = 'fancybox-pdf';
					}
					$output .= '<div class="document row">
						<div class="thumb col-3"><a href="' . $link_url . '" class="'. $link_class . '">' . $doc['thumb'] . '</a></div>
						<div class="desc col-9">
							<a href="' . $link_url . '" class="'. $link_class . '">
								<div class="date">' . $doc['date'] . '</div>
								<div class="title">' . $doc['title'] . '</div>
							</a>
						</div>
					</div>';
				}
				$output .= '</div></div>';
			}
		}
	}
	$output .= '</div>';
	return $output;
}
