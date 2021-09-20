<?php require_once("funciones.php")?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once("01_header.php");?>
    <body class="c-layout-header-fixed c-layout-header-mobile-fixed">
        <?php require_once("02_menu.php");?>       
        <div class="c-layout-page">
            <?php require_once("03_banner.php")?>
            
            <?php 
                $arr_productos = ObtenerProductosArr();
            ?>
            <!-- BEGIN: CONTENT/SHOPS/SHOP-2-1 -->
            <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
                <div class="container">
                    <div class="c-content-title-4">
                        <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">Novedades</span></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white">
                                <div class="c-content-overlay">
                                    <div class="c-label c-bg-red c-font-uppercase c-font-white c-font-13 c-font-bold">Sale</div>
                                    <div class="c-label c-label-right c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold">New</div>
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="detalle_producto.php?id=<?=12?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Ver más</a>
                                        </div>
                                    </div>
                                    <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?=fileBase64($arr_productos[12]["path"])?>);"></div>
                                </div>
                                <div class="c-info">
                                    <p class="c-title c-font-18 c-font-slim"><?=$arr_productos[12]["nombre"]?></p>
                                    <p class="c-price c-font-16 c-font-slim">$<?=number_format($arr_productos[12]["precio"],0,",",".")?> &nbsp;
                                        <span class="c-font-16 c-font-line-through c-font-red">$<?=number_format($arr_productos[12]["precio_old"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="detalle_producto.php?id=<?=23?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Ver más</a>
                                        </div>
                                    </div>
                                    <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?=fileBase64($arr_productos[23]["path"])?>);"></div>
                                </div>
                                <div class="c-info">
                                    <p class="c-title c-font-18 c-font-slim"><?=$arr_productos[23]["nombre"]?></p>
                                    <p class="c-price c-font-16 c-font-slim">$<?=number_format($arr_productos[23]["precio"],0,",",".")?> &nbsp;
                                        <span class="c-font-16 c-font-line-through c-font-red">$<?=number_format($arr_productos[23]["precio_old"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="detalle_producto.php?id=<?=31?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Ver más</a>
                                        </div>
                                    </div>
                                    <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?=fileBase64($arr_productos[31]["path"])?>);"></div>
                                </div>
                                <div class="c-info">
                                    <p class="c-title c-font-18 c-font-slim"><?=$arr_productos[31]["nombre"]?></p>
                                    <p class="c-price c-font-16 c-font-slim">$<?=number_format($arr_productos[31]["precio"],0,",",".")?> &nbsp;
                                        <span class="c-font-16 c-font-line-through c-font-red">$<?=number_format($arr_productos[31]["precio_old"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="detalle_producto.php?id=<?=2?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Ver más</a>
                                        </div>
                                    </div>
                                    <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?=fileBase64($arr_productos[2]["path"])?>);"></div>
                                </div>
                                <div class="c-info">
                                    <p class="c-title c-font-18 c-font-slim"><?=$arr_productos[2]["nombre"]?></p>
                                    <p class="c-price c-font-16 c-font-slim">$<?=number_format($arr_productos[2]["precio"],0,",",".")?> &nbsp;
                                        <span class="c-font-16 c-font-line-through c-font-red">$<?=number_format($arr_productos[2]["precio_old"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- END: CONTENT/SHOPS/SHOP-2-1 -->

            <!-- BEGIN: CONTENT/MISC/PROMO-1-2 -->
            <div class="c-content-box c-size-lg c-bg-green-1">
                <div class="container">
                    <div class="row">
                        <div class="c-shop-banner-3 c-center">
                            <h3 class="c-title c-font-uppercase c-font-bold c-font-35 c-font-white">Visita nuestro catálogo</h3>
                            <p class="c-desc c-font-uppercase c-font-bold c-font-25 c-font-black-1">Hasta 70% de Descuento en Retail</p>
                            <button onclick="window.location.href='catalogo.php'" class="btn btn-lg c-btn-white c-btn-square c-btn-bold">Ver Catálogo</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/MISC/PROMO-1-2 -->
        </div>    
        <!-- BEGIN: LAYOUT/FOOTERS/FOOTER-6 -->
        <footer class="c-layout-footer c-layout-footer-6 c-bg-grey-1">
            <?php require_once("04_pre_footer.php");?>
            <?php require_once("05_footer.php");?>
        </footer>
        <!-- END: LAYOUT/FOOTERS/FOOTER-6 -->
        <!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
        <div class="c-layout-go2top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END: LAYOUT/FOOTERS/GO2TOP -->
        <!-- BEGIN: LAYOUT/BASE/BOTTOM -->
        <!-- BEGIN: CORE PLUGINS -->
        <!--[if lt IE 9]>
	<script src="../../assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
        <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
        <script src="assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
        <script src="assets/demos/index/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
        <!-- END: CORE PLUGINS -->
        <!-- BEGIN: LAYOUT PLUGINS -->
        <script src="assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.slideanims.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.layeranimation.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.navigation.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.video.min.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.parallax.min.js" type="text/javascript"></script>
        <script src="assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
        <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="assets/plugins/smooth-scroll/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="assets/plugins/typed/typed.min.js" type="text/javascript"></script>
        <script src="assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js" type="text/javascript"></script>
        <script src="assets/plugins/js-cookie/js.cookie.js" type="text/javascript"></script>
        <!-- END: LAYOUT PLUGINS -->
        <!-- BEGIN: THEME SCRIPTS -->
        <script src="assets/base/js/components.js" type="text/javascript"></script>
        <script src="assets/base/js/components-shop.js" type="text/javascript"></script>
        <script src="assets/base/js/app.js" type="text/javascript"></script>
        <script>
            $(document).ready(function()
            {
                App.init(); // init core    
            });
        </script>
        <!-- END: THEME SCRIPTS -->
        <!-- BEGIN: PAGE SCRIPTS -->
        <script src="assets/demos/default/js/scripts/revo-slider/slider-4.js" type="text/javascript"></script>
        <script src="assets/plugins/isotope/isotope.pkgd.min.js" type="text/javascript"></script>
        <script src="assets/plugins/isotope/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="assets/plugins/isotope/packery-mode.pkgd.min.js" type="text/javascript"></script>
        <script src="assets/plugins/ilightbox/js/jquery.requestAnimationFrame.js" type="text/javascript"></script>
        <script src="assets/plugins/ilightbox/js/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="assets/plugins/ilightbox/js/ilightbox.packed.js" type="text/javascript"></script>
        <script src="assets/demos/default/js/scripts/pages/isotope-gallery.js" type="text/javascript"></script>
        <script src="assets/plugins/revo-slider/js/extensions/revolution.extension.parallax.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/revo-slider/js/extensions/revolution.extension.kenburn.min.js" type="text/javascript"></script>
        <!-- END: PAGE SCRIPTS -->
        <!-- END: LAYOUT/BASE/BOTTOM -->
    </body>

</html>