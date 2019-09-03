<!doctype html>
<html>
<head>
    <?php $HOME = get_template_directory_uri(); /* Pega o diretorio raiz do tema */ ?>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?= $HOME; ?>/reset.css">
    <link rel="stylesheet" type="text/css" href="<?= $HOME; ?>/style.css">

    <link rel="stylesheet" type="text/css" href="<?= $HOME; ?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= $HOME; ?>/assets/css/page.css">

    <link rel="stylesheet" type="text/css" href="<?= $HOME; ?>/assets/css/<?=$css_especifico?>.css">
    <title>
        <?php  geraTitle();  ?>
    </title>
<?php wp_head(); /* Função para colocar o cabec de administração do WP */ ?>

</head>
<body>

<header>
    <div class="container">
        <?php
        $args = array(
          'theme_location'  => 'header-menu'    /* O nome do menu foi registrado em functions.php */
        );
        wp_nav_menu($args);
        ?>
    </div>
</header>
