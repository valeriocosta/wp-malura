<?php 
	$css_especifico = "index";
	/*get_header(); = função WP ou <?php include('header.php'); ?> - Não aceita passa parametros*/
	require_once('header.php');	/* Força esta forma para aceitar enviar o css específico */
    $tit_before = "Título: [";
    $tit_after = "]";
    $tit_echo = true;
    $if_sidebar = false;    /* exibe ou não a barra lateral */
?>
<main class="home-main">
	<div class="container">

		<?php 
			$args = array('post_type' => 'imovel'); /* Avisa ao WP quais post quero mostrar nesta página atual */
			$loop = new WP_Query($args);	/* Faz um query dos posts escolhidos (imóveis) */
		if( $loop->have_posts() ) { 			/* Para forçar a ler do nov query, incluo de onde quero '$loop->' ...
												 .. em todos os locais onde existia apenas '..._posts()'*/
			?>			
			<ul class="imoveis-listagem">
			<?php while( $loop->have_posts() ) {
					$loop->the_post(); /* Para cada post... */?>

				<li class="imoveis-listagem-item">
				<a href="<?= the_permalink(); ?>">
						<?php /* ...Mostra seus itens */
						if (has_post_thumbnail()) {
							the_post_thumbnail();
						}  ?>

						<h2><?php the_title($tit_before, $tit_after, $tit_echo); ?></h2>

						<p><?php the_content(); ?></p>
					</a>
				</li>
			<?php } ?>
			</ul>
		<?php	} 
		    if ( $if_sidebar) : get_sidebar();
			endif;
		?>
	</div>
</main>

<?php get_footer(); /* função WP ou <?php include('footer.php'); ?> */
?>