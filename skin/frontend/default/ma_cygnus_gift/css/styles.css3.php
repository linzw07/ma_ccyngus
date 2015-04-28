<?php
    header('Content-type: text/css; charset: UTF-8');
    header('Cache-Control: must-revalidate');
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
    $url = $_REQUEST['url'];
?>

.mobilemenu>li.first {
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
	behavior: url(<?php echo $url; ?>css/css3.htc);
	position: relative;
}
.mobilemenu>li.last {
	-webkit-border-radius:0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
	behavior: url(<?php echo $url; ?>css/css3.htc);
	position: relative;
}
#Example_F {
	-moz-box-shadow: 0 0 5px 5px #888;
	-webkit-box-shadow: 0 0 5px 5px#888;
	box-shadow: 0 0 5px 5px #888;
}




.nav-container {
    /*opacity: 0.8;
    -webkit-opacity: 0.8;
    -moz-opacity: 0.8;*/
}

.ma-featuredproductslider-container  .bx-wrapper .bx-controls-direction a, .ma-brand-slider-contain .bx-controls-direction a, .ma-thumbnail-container .flex-direction-nav a, .ma-banner7-container .flex-direction-nav a, .nivo-directionNav a, .banner-static-contain .banner-box img, .footer-static2 .web li a, .ma-upsellslider-container .flex-direction-nav a, .banner-static2 .banner-box img, #back-top, .ma-relatedslider-container .flex-direction-nav a{
    transition: 0.5s ease-out;
    -webkit-transition: 0.5s ease-out;
    -moz-transition: 0.5s ease-out;
}

.actions .actions-inner button.button, .quickview-button, .actions .actions-inner .add-to-links li, .email-friend, .product-view .add-to-cart button.button {
    transition: 0.7s ease-out;
    -webkit-transition: 0.7s ease-out;
    -moz-transition: 0.7s ease-out;
}

.banner-static-contain .banner-box:hover img, .banner-static2 .banner-box:hover img,.featuredproductslider-item:hover .item-inner .image-container .image-inner,.products-grid .item:hover .item-inner .image-container .image-inner, .footer-static2 .pay li a:hover img {
    opacity: 0.8;
    -webkit-opacity: 0.8;
    -moz-opacity: 0.8;
    transition: 0.5s ease-out;
    -webkit-transition: 0.5s ease-out;
    -moz-transition: 0.5s ease-out;
}

.ma_categorytab_slider  .bx-wrapper .bx-controls-direction a, .ma-featuredproductslider-container .bx-wrapper .bx-controls-direction a, .ma-brand-slider-contain .bx-controls-direction a, .ma-relatedslider-container .flex-direction-nav a, .ma-thumbnail-container .flex-direction-nav a, .add-to-cart .qty, .ma-upsellslider-container .flex-direction-nav a {
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
}

.actions .actions-inner button.button span, .actions .actions-inner .add-to-links li a {
    border-radius: 30px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
}
button.button, button.button span, .products-list .actions .actions-inner button.button span {
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
}
.actions .actions-inner {
    opacity: 0;
    -webkit-opacity: 0;
    -moz-opacity: 0;
    transition: 0.3s ease-out;
    -webkit-transition: 0.3s ease-out;
    -moz-transition: 0.3s ease-out;
}
.tab_content_new_arrivals2 .bx-wrapper .bxslider .item:hover .actions .actions-inner, .featuredproductslider-item:hover .actions .actions-inner, .products-grid .item .item-inner:hover .actions .actions-inner{
    opacity: 1;
    -webkit-opacity: 1;
    -moz-opacity: 1;
}

.tab_content_newarrivals .bx-wrapper .bxslider .item:hover .actions .actions-inner img, .featuredproductslider-item:hover .actions .actions-inner img, .products-grid .item .item-inner:hover .actions .actions-inner img, .banner-left:hover img, .item:hover .image-container a img, .featuredproductslider-item:hover .image-container a img {
    opacity: 0.8;
    -webkit-opacity: 0.8;
    -moz-opacity: 0.8;
    transition: 0.3s ease-out;
    -webkit-transition: 0.3s ease-out;
    -moz-transition: 0.3s ease-out;
}

.products-list li.item .actions .actions-inner, .product-view .product-shop .actions .actions-inner{
    opacity: 1;
    -webkit-opacity: 1;
    -moz-opacity: 1;
}




