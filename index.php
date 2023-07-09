<?php get_header(); ?>



<div class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="home-blog">
                <div class="grid-container">
                    <!-- conteúdo dos posts -->
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                            <article>
                                <div class="container_main">
                                    <div class="grid-item">
                                        <h2><?php echo esc_html(get_the_title()); ?></h2>
                                        <div class="sub-title">
                                            <span><?php echo get_the_date(); ?> by: <?php echo get_the_author_posts_link(); ?></span>
                                            <span> Categoria:<?php the_category(' '); ?></span>
                                        </div>
                                        <p> <?php the_content() ?></p>
                                        <!-- Botão para abrir o modal -->
                                        <button class="more-info-btn" data-title="<?php the_title(); ?>" data-content="<?php the_content(); ?>">Saiba mais</button>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal">
                                    <div class="modal-content">
                                        <button class="close-btn">&times;</button>
                                        <h2 class="modal-title"></h2>
                                        <p class="modal-author"></p>
                                        <p class="modal-body"></p>
                                    </div>
                                </div>
                            </article>
                        <?php
                        endwhile;
                    else :
                        ?>
                        <p>Nenhum Conteúdo encontrado</p>
                    <?php endif; ?>
                </div> <!-- Fim do grid-container -->
            </section>
        </main>
    </div>
</div>

<?php get_footer(); ?>