<?php
/* Suporte a temas = https://developer.wordpress.org/reference/functions/add_theme_support/*/
add_theme_support("post-thumbnails");   /* add suporte ao tema - imagem de destaque */
add_theme_support("custom-background");  /* Add "Imagem de fundo" ao menu "Painel WP->Aparencia->Personalizar"*/

function cadastrando_post_type_imoveis()
{
    $nomeSingular = 'Imóvel';
    $nomePlural = 'Imóveis';
    $labels = array(    /* Modifica de acordo com seu novo tipo de POST */
        'name' => $nomePlural, /* Este é o plural */
        'name_singular' => $nomeSingular,
        'add_new_item' => 'Incluir ' .$nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular
    );
    $descricao = 'Imóveis Malura';
    $supports = array(
        'title',
        'thumbnail',
        'editor'
    );
    $args = array(      /* Aqui passa todas as alterações para o modelo POST criado */
        'public' => true,    /* Faz o post aparecer na área de admin */
        'labels' => $labels, /* Modifica os nomes "POSTS" para o seu nome (ex. Imóveis) */
        'description' => $descricao,    /* Mostra descrição na ... */
        'menu_icon' => 'dashicons-admin-home',   /* mostra o icone do nov tipo de post no painel admin */
        'supports' => $supports
    );
    register_post_type('imovel', $args);    /* registra um novo tipo de POST para este site e suas características */
}
add_action('init', 'cadastrando_post_type_imoveis');

/* Faz aparecer o menu para este tema */
function registrar_menu_navegacao(){
    register_nav_menu('header-menu', 'main-menu');
}
add_action('init', 'registrar_menu_navegacao');

// Coloca titulo na URL 
function geraTitle(){
    bloginfo('name'); /* Mostra o nome do site na URL */
    if (!is_home()) {
        echo(' | ');
    }
    the_title();        /* Coloca nome da página junto na URL */
}

