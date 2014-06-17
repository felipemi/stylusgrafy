<?php
$pagina = end(explode("/", $_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php
            if ($pagina == 'index.php') {
                echo "Stylus Grafy Marketing e Propaganda";
            } else if ($pagina == 'A_Empresa.php') {
                echo "Stylus Grafy Marketing e Propaganda | A Empresa";
            } else if ($pagina == 'Clientes.php') {
                echo "Stylus Grafy Marketing e Propaganda | Clientes";
            } else if ($pagina == 'Servicos.php') {
                echo "Stylus Grafy Marketing e Propaganda | Serviços";
            } else if ($pagina == 'Filipeto.php') {
                echo "Stylus Grafy Marketing e Propaganda | Filipeto";
            } else if ($pagina == 'Contato.php') {
                echo "Stylus Grafy Marketing e Propaganda | Fale Conosco";
            }
            ?>
        </title>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Style-Type" content="text/css"/>
        <meta name="description" content="StylusGrafy. Marketing e Propaganda. Desenvolvimento de Web-Sites e Mídias Sociais"/>
        <meta name="keywords" content="stylusgrafy, ads, seo, marketing, publicidade, propaganda, digital, estratégias, assessoria de imprensa, mídia, filipeto, revista digital, web-site, ecommerce, vitrine, midias sociais"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/splash.css">
        <link rel="shortcut icon" href="images/favicon.png"/>
        <script type="text/javascript" language="javascript" src="js/jquery.min.js" ></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" language="javascript" src="js/maskedinput.js"></script>
        <script type="text/javascript" language="javascript" src="js/stylusgraf.js"></script>
        <script type="text/javascript" language="javascript" src="js/splash.js"></script>
        <script>
            jQuery(function($) {
                $("#telefone").mask("(999)9999-9999");
            });
        </script>

    </head>

    <body> 


        <div id="page"> 
            <header id="brading">
                <div class="top-redes-empresa">                   
                    <h1>
                        <a href="index.php">
                            <img alt="Icon Stylus Grafy Marketing e Propaganda Home" src="images/icon-Stylus-Grafy-Marketing-e-Propaganda-Home.gif" title="Home"/>
                        </a>
                    </h1>
                </div>
                <div class="top-logo-empresa
                     ">
                    <h1>
                        <a>
                            <img alt="Imagem Stylus Grafy Marketing e Propaganda" src="images/img-Stylus-Grafy-Marketing-e-Propaganda-Logo.jpg"/>
                        </a>
                    </h1>
                </div>
            </header>