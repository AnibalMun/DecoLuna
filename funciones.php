<?php

define('SecretKey', '0b4K6yU9bUxELmjO');
$key = "0b4K6yU9bUxELmjO";
include("PHPMailer/PHPMailerAutoload.php");

function EnviarMail($mail_to,$copy_to,$hidden_to,$subject,$message_html,$message_alt,$Attachment='',$asunto_principal,$mueble_adjunta){
	$mail = new Phpmailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP();
	$debug=true;
	if($debug){
		$mail->SMTPDebug = 2;
		$mail->Debugoutput = 'html';	
	}
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);  
	
	$mail->Host = 'smtp.zoho.com';//173.194.65.108
	$mail->SMTPAuth = true;
	$mail->Username = 'contacto@lunadeco.cl';
	$mail->Password = '2P0FjCKiVFqT';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	//Indicamos cual es nuestra dirección de correo y el nombre que 
	//queremos que vea el usuario que lee nuestro correo
	$mail->setFrom('contacto@lunadeco.cl', $asunto_principal);
	
	/*$mail->AddAddress('sguzman@vtsystems.cl');*/
	$responder_a="contacto@lunadeco.cl";
	$nombre_responder_a="Raúl Araos";
	$mail->AddReplyTo($responder_a,$nombre_responder_a);
	
	$mail->FromName = 'LunaDeco';
	
	//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
	//una cuenta gratuita, por tanto lo pongo a 30  
	$mail->Timeout=30;

	//$mail->AddAttachment($adjunto,$nombre_archivo,"base64", "application/octet-stream");
	
	//Indicamos cual es la dirección de destino del correo
	$correos = explode(";",$mail_to);
	foreach($correos as $correo){
		if(trim($correo)!='')$mail->AddAddress(trim($correo));
	}
	$correos = explode(";",$copy_to);
	foreach($correos as $correo){
		if(trim($correo)!='')$mail->AddCC(trim($correo));
	}
	$correos = explode(";",$hidden_to);
	foreach($correos as $correo){
		if(trim($correo)!='')$mail->AddBCC(trim($correo));
	}
	
	//Asignamos asunto y cuerpo del mensaje
	//El cuerpo del mensaje lo ponemos en formato html, haciendo 
	//que se vea en negrita
	
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	
	$mail->Body = $message_html;
	
	//Definimos AltBody por si el destinatario del correo no admite email con formato html 
	$mail->AltBody = $message_alt;
	
	if($Attachment!='' && is_array($Attachment)){
		foreach($Attachment as $file_name => $file){
			$mail->AddStringAttachment($file, $file_name);
		}
	}
	
	$mail->AddEmbeddedImage('img/lunadeco.jpg', 'logo');
	if($mueble_adjunta!=""){
		$mail->AddEmbeddedImage($mueble_adjunta, 'mueble');
	}
	
	
	//se envia el mensaje, si no ha habido problemas 
	//la variable $exito tendra el valor true

	$exito = $mail->Send();
	
	//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
	//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
	//del anterior, para ello se usa la funcion sleep	
	$intentos=1; 
	while ((!$exito) && ($intentos <1)) {
	sleep(5);
		//echo " ".$mail->ErrorInfo;
		$exito = $mail->Send();
		$intentos=$intentos+1;	
	}
	
	return $exito;
}

function ObtenerProductosArr(){
    $arr_productos = [];

    $arr_productos[1] = array(
        "nombre" => "Velador blanco decapado",
        "descripcion" => "Velador blanco decapado 1cajon alto 80 x32 de fondo y frente de 46",
        "precio" => "79990",
        "precio_old" => "119000",
        "path" => "img/muebles/1.jpg"
    );

    $arr_productos[2] = array(
        "nombre" => "Mueble vintage",
        "descripcion" => "Mueble puerta estilo vintage alto 90x35 de fondo y 65 de frente",
        "precio" => "115000",
        "precio_old" => "150000",
        "path" => "img/muebles/2.jpg"
    );

    $arr_productos[3] = array(
        "nombre" => "Cómoda blanca vintage",
        "descripcion" => "Cómoda blanca estilo vintage alto 100 frente 71 y 40 de fondo",
        "precio" => "170000",
        "precio_old" => "200000",
        "path" => "img/muebles/3.jpg"
    );

    $arr_productos[4] = array(
        "nombre" => "Arrimo cava blanca",
        "descripcion" => "Arrimo cava blanca 9 botellas mide 80 de alto x 50 de frente y 30 de fondo",
        "precio" => "80000",
        "precio_old" => "95000",
        "path" => "img/muebles/4.jpg"
    );

    $arr_productos[5] = array(
        "nombre" => "Cava vintage",
        "descripcion" => "Cava estilo vintage alto 97x50 de frente y 37 de fondo",
        "precio" => "118000",
        "precio_old" => "142000",
        "path" => "img/muebles/5.jpg"
    );

    $arr_productos[6] = array(
        "nombre" => "Arrimo blanco vintage",
        "descripcion" => "Arrimo blanco estilo vintage alto 82x 72 de frente y36 de fondo",
        "precio" => "68000",
        "precio_old" => "85000",
        "path" => "img/muebles/6.jpg"
    );

    $arr_productos[7] = array(
        "nombre" => "Mueble puerta fierro",
        "descripcion" => "Mueble puerta fierro alto 90 x 35 de fondo y 65 de frente",
        "precio" => "120000",
        "precio_old" => "160000",
        "path" => "img/muebles/7.jpg"
    );

    $arr_productos[8] = array(
        "nombre" => "Cava pequeña vintage",
        "descripcion" => "Cava pequeña estilo vintage 6 botellas 80 de alto x 46 de frente y 32 de fondo",
        "precio" => "88000",
        "precio_old" => "104000",
        "path" => "img/muebles/8.jpg"
    );

    $arr_productos[9] = array(
        "nombre" => "Arrimo cava grande",
        "descripcion" => "Arrimo cava grande mide 80 de alto 100 de frente y 30 de fondo",
        "precio" => "132000",
        "precio_old" => "165000",
        "path" => "img/muebles/9.png"
    );

    $arr_productos[10] = array(
        "nombre" => "Cómoda vintage",
        "descripcion" => "Cómoda estilo vintage mide 94 de alto x 65 de frente y 42 de fondo",
        "precio" => "130000",
        "precio_old" => "158000",
        "path" => "img/muebles/10.jpg"
    );

    $arr_productos[11] = array(
        "nombre" => "Esquinero blanco",
        "descripcion" => "Esquinero blanco mide 1.75 de alto x 55 de frente y 38 de fondo",
        "precio" => "135000",
        "precio_old" => "170000",
        "path" => "img/muebles/11.jpg"
    );

    $arr_productos[12] = array(
        "nombre" => "Librero vintage",
        "descripcion" => "Librero estilo vintage mide 100 de alto 61 de frente y 29 de fondo",
        "precio" => "102000",
        "precio_old" => "136000",
        "path" => "img/muebles/12.jpg"
    );

    $arr_productos[13] = array(
        "nombre" => "Bandejas de escritorio",
        "descripcion" => "Bandejas de escritorio mdf y madera",
        "precio" => "2000",
        "precio_old" => "14000",
        "path" => "img/muebles/13.jpg"
    );

    $arr_productos[14] = array(
        "nombre" => "Portatacos de madera y mdf",
        "descripcion" => "Portatacos de madera y mdf",
        "precio" => "1900",
        "precio_old" => "5000",
        "path" => "img/muebles/14.jpg"
    );

    $arr_productos[15] = array(
        "nombre" => "Papelero madera y mdf 31x21",
        "descripcion" => "Papelero madera y mdf 31x21",
        "precio" => "4000",
        "precio_old" => "10000",
        "path" => "img/muebles/15.jpg"
    );

    $arr_productos[16] = array(
        "nombre" => "Caja kardex de madera",
        "descripcion" => "Caja kardex de madera",
        "precio" => "5000",
        "precio_old" => "14000",
        "path" => "img/muebles/16.jpg"
    );

    $arr_productos[17] = array(
        "nombre" => "Baúl blanco madera y mdf",
        "descripcion" => "Baúl blanco madera y mdf mide 52 de alto x 80 de frente y 45 de fondo",
        "precio" => "105000",
        "precio_old" => "135000",
        "path" => "img/muebles/17.jpeg"
    );

    $arr_productos[18] = array(
        "nombre" => "Banca estilo vintage madera",
        "descripcion" => "Banca estilo vintage madera",
        "precio" => "55000",
        "precio_old" => "62000",
        "path" => "img/muebles/18.jpg"
    );

    $arr_productos[19] = array(
        "nombre" => "Arrimo madera y mdf",
        "descripcion" => "Arrimo madera y mdf rojo mide 82 de alto x 72 de frente y 36 de fondo",
        "precio" => "68000",
        "precio_old" => "85000",
        "path" => "img/muebles/19.jpg"
    );

    $arr_productos[20] = array(
        "nombre" => "Rack vintage",
        "descripcion" => "Rack estilo vintage mide 61 de alto x 125 de frente y 40 de fondo",
        "precio" => "110000",
        "precio_old" => "170000",
        "path" => "img/muebles/20.jpeg"
    );

    $arr_productos[21] = array(
        "nombre" => "Cómoda vintage",
        "descripcion" => "Cómoda estilo vintage mide 94 de alto x 65 de frente y 42 de fondo",
        "precio" => "130000",
        "precio_old" => "158000",
        "path" => "img/muebles/21.jpg"
    );

    $arr_productos[22] = array(
        "nombre" => "Bar esquinero vintage",
        "descripcion" => "Bar esquinero estilo vintage mide 1,15 de alto x 29 de fondo x 61 de frente",
        "precio" => "89000",
        "precio_old" => "99000",
        "path" => "img/muebles/22.jpg"
    );	
	
    $arr_productos[23] = array(
        "nombre" => "Baúl madera y mdf",
        "descripcion" => "Baúl madera y mdf mide 40 de alto x 52 de fondo y 80 de frente",
        "precio" => "110000",
        "precio_old" => "160000",
        "path" => "img/muebles/23.jpg"
    );

    $arr_productos[24] = array(
        "nombre" => "Mesa telefono",
        "descripcion" => "Mesa telefono rojo madera y mdf mide 82 de alto x 40 de frente y 25 de fondo",
        "precio" => "52000",
        "precio_old" => "75000",
        "path" => "img/muebles/24.jpg"
    );

    $arr_productos[25] = array(
        "nombre" => "Arrimo rojo lacado",
        "descripcion" => "Arrimo rojo lacado 82x72 de frente y 36 de fondo",
        "precio" => "68000",
        "precio_old" => "85000",
        "path" => "img/muebles/25.jpg"
    );

    $arr_productos[26] = array(
        "nombre" => "Baúl café",
        "descripcion" => "Baúl café",
        "precio" => "110000",
        "precio_old" => "118000",
        "path" => "img/muebles/26.jpg"
    );

    $arr_productos[27] = array(
        "nombre" => "Velador vintage",
        "descripcion" => "Velador estilo vintage lámina",
        "precio" => "75000",
        "precio_old" => "79000",
        "path" => "img/muebles/27.jpg"
    );

    $arr_productos[28] = array(
        "nombre" => "Velador dos repisas",
        "descripcion" => "Velador dos repisas mide 63 de alto x 38 de frente y 32 de fondo",
        "precio" => "48000",
        "precio_old" => "60000",
        "path" => "img/muebles/28.jpg"
    );

    $arr_productos[29] = array(
        "nombre" => "Arrimo dos bandejas",
        "descripcion" => "Arrimo dos bandejas mide 80 de alto x 70 de frente y 35 de fondo",
        "precio" => "72000",
        "precio_old" => "90000",
        "path" => "img/muebles/29.jpg"
    );

    $arr_productos[30] = array(
        "nombre" => "Arrimo una bamdeja",
        "descripcion" => "Arrimo una bamdeja mide 80 de alto x 60 de frente y 30 de fondo",
        "precio" => "68000",
        "precio_old" => "85000",
        "path" => "img/muebles/30.jpg"
    );

    $arr_productos[31] = array(
        "nombre" => "Rack blanco",
        "descripcion" => "Rack blanco láminas mide 61 de alto x 125 de frente y 40 de fondo",
        "precio" => "110000",
        "precio_old" => "170000",
        "path" => "img/muebles/31.jpeg"
    );

    $arr_productos[32] = array(
        "nombre" => "Velador 2 repisas",
        "descripcion" => "Velador 2 repisas blanco mide 63 de alto x 38 de frente y 32 de fondo",
        "precio" => "48000",
        "precio_old" => "57000",
        "path" => "img/muebles/32.jpg"
    );

    $arr_productos[33] = array(
        "nombre" => "Mini Bar",
        "descripcion" => "Mini Bar, mide 1,17 de alto x 33.8 de frente y 29 de fondo",
        "precio" => "60000",
        "precio_old" => "79000",
        "path" => "img/muebles/33.jpeg"
    );

    $arr_productos[34] = array(
        "nombre" => "Velador dos repisas",
        "descripcion" => "Velador dos repisas mide 63 de alto x 40 de frente y 35 de fondo",
        "precio" => "63000",
        "precio_old" => "75000",
        "path" => "img/muebles/34.jpeg"
    );

    $arr_productos[35] = array(
        "nombre" => "Mini Bar blanco decapado",
        "descripcion" => "Mini Bar blanco decapado mide 1.17 de alto x 33.8 de frente y 29 de fondo",
        "precio" => "64000",
        "precio_old" => "72000",
        "path" => "img/muebles/35.jpeg"
    );

    $arr_productos[36] = array(
        "nombre" => "Bar esquinero",
        "descripcion" => "Bar esquinero mide 1.18 de alto x 62 de frente y 29 de fondo",
        "precio" => "85000",
        "precio_old" => "96000",
        "path" => "img/muebles/36.jpeg"
    );

    $arr_productos[37] = array(
        "nombre" => "Bar recto",
        "descripcion" => "Bar recto mide 1.15 de alto x 61.8 de frente y 29 de fondo",
        "precio" => "100000",
        "precio_old" => "119000",
        "path" => "img/muebles/37.jpeg"
    );

    $arr_productos[38] = array(
        "nombre" => "Mesa teléfono",
        "descripcion" => "Mesa teléfono mide 78 de alto x 27 de frente y 25 de fondo",
        "precio" => "50000",
        "precio_old" => "55000",
        "path" => "img/muebles/38.jpeg"
    );

    $arr_productos[39] = array(
        "nombre" => "Mini Bar blanco",
        "descripcion" => "Mini Bar blanco decapado mide 78 de alto x 27 de frente y 25 de fondo",
        "precio" => "55000",
        "precio_old" => "62000",
        "path" => "img/muebles/39.jpeg"
    );

    $arr_productos[40] = array(
        "nombre" => "Mueble baño",
        "descripcion" => "Mueble baño mide 1 15 de alto x 34 de frente y 28 de fondo",
        "precio" => "65000",
        "precio_old" => "69000",
        "path" => "img/muebles/40.jpeg"
    );

    $arr_productos[41] = array(
        "nombre" => "Bar recto",
        "descripcion" => "Bar recto alto mide 1.54 de alto x 61.8 de frente y 29 de fondo",
        "precio" => "120000",
        "precio_old" => "127000",
        "path" => "img/muebles/41.jpeg"
    );

    $arr_productos[42] = array(
        "nombre" => "Bar esquinero",
        "descripcion" => "Bar esquinero alto mide 1.58 de alto x 62 de frente y 29 de fondo. (Laterales de 47)",
        "precio" => "110000",
        "precio_old" => "118000",
        "path" => "img/muebles/42.jpeg"
    );

    $arr_productos[43] = array(
        "nombre" => "Bar recto alto",
        "descripcion" => "Bar recto alto blanco decapado Mide 1.54 de alto x 62 de frente y 29 de fondo",
        "precio" => "130000",
        "precio_old" => "138000",
        "path" => "img/muebles/43.jpeg"
    );

    return $arr_productos;
}

function fileBase64($path){
	try {
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/'.$type.';base64,'.base64_encode($data);
		return $base64;
	}catch (Exception $e) {
		return false;
	}
}

function fnEncrypt2($sValue)
{//para get url
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Enigma::$Key),
     $sValue, MCRYPT_MODE_CBC, md5(md5(Enigma::$Key))));
}

function fnDecrypt2($sValue)
{//para get url
    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Enigma::$Key), 
     base64_decode($sValue), MCRYPT_MODE_CBC, md5(md5(Enigma::$Key))), "\0");
}

function fnEncrypt1($sValue) //para get url
{
    return rawurlencode(rtrim(
        base64_encode(
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                SecretKey, $sValue, 
                MCRYPT_MODE_ECB, 
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_128, 
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND)
                )
            ), "\0"
        ));
}

function fnDecrypt1($sValue) //para get url
{
    return rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128, 
            SecretKey, 
            base64_decode(rawurldecode($sValue)), 
            MCRYPT_MODE_ECB,
            mcrypt_create_iv(
                mcrypt_get_iv_size(
                    MCRYPT_RIJNDAEL_128,
                    MCRYPT_MODE_ECB
                ), 
                MCRYPT_RAND
            )
        ), "\0"
    );
}

?>