<?php /* A page.php quando presente sinaliza ao WP que esta página será a página
         padrão daqui pra frente e que todas as página criadas no admin->Pages
         terão este formato */

$css_especifico = "page";
	/*get_header(); = função WP ou <?php include('header.php'); ?> - Não aceita passa parametros*/
	require_once('header.php');	/* Cabeçalho - Força esta forma para aceitar enviar o css específico */
?>

<main class="pagina-main">
    <article class="pagina">

        <h1 class="pagina-titulo">
            <?php the_title(); ?>
        </h1>
        <?php
        if( have_posts()){  /* Aqui não é necessário usar o "$loop->" usado na index. O WP já sabe */
            while (have_posts()) {
                the_post();
        ?>

        <div class="pagina-conteudo">
            <?php the_content(); ?>
        </div>

       <?php
            }
        }
		if( is_page('contato') ) {
            ?>
    
            <form>
                <div class="form-nome">
                    <label for="form-nome">Nome:</label>
                    <input id="form-nome" type="text" placeholder="Seu nome aqui" name="form-nome">
                </div>
    
                <div class="form-email">
                    <label for="form-email">Email:</label>
                    <input id="form-email" type="email" placeholder="email@exemplo.com.br" name="form-email">
                </div>
            
                <div class="form-mensagem">
                    <label for="form-mensagem">Mensagem:</label>
                    <textarea id="form-mensagem" name="form-mensagem"></textarea>
                </div>
                <button type="submit">Enviar</button>
    
            </form>        
        <?php 
        } ?>
    </article>
</main>

<?php get_footer(); /* função WP ou <?php include('footer.php'); ?> */
?>