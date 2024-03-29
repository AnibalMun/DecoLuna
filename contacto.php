<?php 
require_once("funciones.php");

$nombre 	= isset($_POST['nombre'])?$_POST['nombre']:"";
$mail 		= isset($_POST['mail'])?$_POST['mail']:"";
$telefono 	= isset($_POST['telefono'])?$_POST['telefono']:"";
$mensaje 	= isset($_POST['mensaje'])?$_POST['mensaje']:"";

if(isset($_POST['cotiza'])){

	$captcha = $_POST ['g-recaptcha-response'];
    $secret = "6LchJCkfAAAAAL8D-HwiCtpW_RJxJu2SO0PS2bMi";

	if($captcha){

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha);
        $arr_response = json_decode($response, true);

        if($arr_response["success"]){

			if($nombre!="" && $mail!=""){
				$mueble_adjunto="";//$producto_arr["path"];
				$copy_to=$mail;
				$mail_to = 'contacto@lunadeco.cl';
				$asunto_correo = 'Consulta de '.$nombre;
				$mensaje_correo = file_get_contents('plantilla_consulta_gral.html');
				$mensaje_correo = str_replace ('{NOMBRE}', $nombre, $mensaje_correo);
				$mensaje_correo = str_replace ('{MAIL}', $mail, $mensaje_correo);
				$mensaje_correo = str_replace ('{FONO}', $telefono, $mensaje_correo);
				$mensaje_correo = str_replace ('{MENSAJE}', $mensaje, $mensaje_correo);
				$mensaje_correo = str_replace ('{ANIO}', date("Y"), $mensaje_correo);
				//die($mensaje_correo);
				
				$ok=EnviarMail($mail_to,$copy_to,'anibalmunoz.ing@gmail.com;raularaos1@hotmail.com',$asunto_correo,$mensaje_correo,$message_alt,$Attachment='','LunaDeco '.'('.$nombre.')',$mueble_adjunto);
				if($ok=="si"){
					echo '<script>';
					echo 'alert("Su mensaje ha sido enviado, nos contactaremos con usted a la brevedad")';
					echo '</script>';
				}else{
					echo '<script>';
					echo 'alert("No se ha podido enviar su consulta, favor reintentar o comunicarse al correo electrónico contacto@lunadeco.cl")';
					echo '</script>';
				}
			}else{
				echo '<script>';
				echo 'alert("Ingrese su Nombre y Correo Electrónico para poder consultar")';
				echo '</script>';
			}
		
		}else{
			echo '<script>';
				echo 'alert("Captcha Inválido")';
				echo '</script>';
		}
	}
	else
	{
		echo '<script>';
				echo 'alert("Favor validar Captcha")';
				echo '</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("01_header.php");?>
    <body class="c-layout-header-fixed c-layout-header-mobile-fixed">
        <?php require_once("02_menu.php");?> 
        <div class="c-layout-page">
			<div style="padding: 40px;">
			
			<div class="c-layout-sidebar-content ">
				<div class="c-shop-product-details-2 c-opt-1">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<form action="#" method="post">
								<div class="c-product-meta">
									<div class="c-content-title-1">
										<h3 class="c-font-uppercase c-font-bold">Contacto</h3>
										<div class="c-line-left"></div>
									</div>
									<div class="c-product-review" style="margin-bottom: 0px;">
										<div class="c-product-add-cart c-margin-t-20">
											<div class="row">
												<div class="col-sm-10 col-xs-12">
													<div class="c-input-group c-spinner">
														<p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">Nombre (*):</p>
														<input type="text" name="nombre" class="form-control" style="width: 100%;" value="<?=$nombre?>">
													</div>
												</div>
												<div class="col-sm-10 col-xs-12">
													<div class="c-input-group c-spinner">
														<p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">Correo Electrónico (*):</p>
														<input type="email" name="mail" class="form-control val_correo" onChange="validarEmail(this.value);" style="width: 100%;" value="<?=$mail?>">
													</div>
												</div>
												<div class="col-sm-10 col-xs-12">
													<div class="c-input-group c-spinner">
														<p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">Fono:</p>
														<input type="text" name="telefono" class="form-control" style="width: 100%;" value="<?=$fono?>">
													</div>
												</div>												
												<div class="col-sm-10 col-xs-12">
													<div class="c-input-group c-spinner">
														<p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">Comentario:</p>
														<textarea name="mensaje" class="form-control" rows="10" cols="10" style="width: 100%;" placeholder="Solicite este producto o envíenos sus dudas, le contactaremos"><?=$mensaje?></textarea>
													</div>
												</div>
												<div class="col-sm-10 col-xs-12">
													<div class="g-recaptcha" data-sitekey="6LchJCkfAAAAAAbu4iJfBhL04Pv-Zhd0hR_xJk80"></div>
												</div>
												<div class="col-sm-12 col-xs-12 c-margin-t-20">
													<button type="submit" name="cotiza" class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Enviar Consulta</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
            
        <!-- BEGIN: LAYOUT/FOOTERS/FOOTER-6 -->
        <footer class="c-layout-footer c-layout-footer-6 c-bg-grey-1">
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
		<script src="assets/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script>
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