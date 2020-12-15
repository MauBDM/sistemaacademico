<?php

session_start();
    // La cantidad de caracteres que va a mostrar el captcha
        $longitud = 5;
        
        // Los caracteres que nuestro captcha va a considerar no acepta numeros
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        
        // El catpcha creado
        $captcha = "";
        
        for($i = 0; $i < $longitud; $i++)
        {
            $captcha .= $caracteres[rand(0, strlen($caracteres)-1)];
        }
        
        // Guardamos el catpcha en sesion para validar
        $_SESSION['key'] = strtolower($captcha);

        // Creamos la imagen
        
        // Creamos una imagen con forma de rectangulo por las medidas definidas a continuación
        $ancho = 600;
        $alto  = 180;
        $fuente_tamano = 99;
        $fuente = './fonts/font.ttf';
        
        $img = imagecreatetruecolor($ancho, $alto);

        // Agregamos el texto
        $blanco = ImageColorAllocate($img, 255, 255, 255); // BLANCO

        // Coordenadas de donde va a ir el texto
        $x = $fuente_tamano;
        $y = ($alto / 2) + 25;

        // El texto blanco
        imagettftext($img, $fuente_tamano, 0, $x, $y, $blanco, $fuente, $captcha);

        // Generamos la imagen
        header("Content-Type: image/jpg"); 
        ImageJpeg($img);
        ImageDestroy($img);
    

     ?>