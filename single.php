<?php   /* a página 'single' é o nome padrão para página com descrição 
           detalhada dos posts, após clicar no post desejado */
/* Tive um problema pra mostrar esta página, que se resolveu quando 
reparei que o link permanente que aparecia na guia não correswpondia 
ao link gerado no Admin->Configurações->Links permanente. 
Alterei para "Nome do Post" que era o que estava sendo gerado 
na página de edição do post e tudo se resolveu */

$css_especifico = "single";
	/*get_header(); = função WP ou <?php include('header.php'); ?> - Não aceita passa parametros*/
	require_once('header.php');	/* Cabeçalho - Força esta forma para aceitar enviar o css específico */
?>

<main>
    <article>
        <?php
        if( have_posts()){  /* Aqui não é necessário usar o "$loop->" usado na index. O WP já sabe */
            while (have_posts()) {
                the_post();
        ?>
        	<a href="<?php the_permalink(); ?>">
                <div class="single-imovel-thumnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            </a>                
                <div class="container">
                    <section class="chamada-principal">
                        <?php the_title(); ?>
                    </section>
                    <section class="single-imovel-geral">
                        <div class="single-imovel-descricao">
                            <?php the_content(); ?>
                        </div>
                    </section>
                    <span class="single-imovel-data">
                        <?php the_date(); ?>
                </span>
                </div>
        <?php
            }
        }
        ?>
    </article>
</main>
<?php
get_footer(); /* Página com roda-pé */?>