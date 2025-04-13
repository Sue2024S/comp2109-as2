<?php
get_header();
$shopFeatureImg = wp_get_attachment_image_src(get_post_thumbnail_id( wc_get_page_id( page: 'shop')), 'full');
?>