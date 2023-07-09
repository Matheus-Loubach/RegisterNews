<?php get_header(); ?>

<div class="container_cadaster">
    <?php
    // Verifica se o formulário foi enviado
    if (isset($_GET['success'])) {
        // Redireciona para a página inicial
        echo '<meta http-equiv="refresh" content="5;URL=' . home_url() . '">';
    }
    ?>


    <form class="container_cadas" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="submit_news_form" autocomplete="off">
        <label for="news_category">Titulo:</label>
        <input type="text" name="news_title" placeholder="Título da notícia" autocomplete="off">
        <label for="news_category">Conteúdo:</label>
        <textarea name="news_content" placeholder="Conteúdo da notícia" autocomplete="off"></textarea>


        <label for="news_category">Categoria:</label>
        <select name="news_category" id="news_category">
            <option value="">Selecione uma categoria</option>
            <?php
            $args = array(
                'hide_empty' => false, // Exibir todas as categorias, mesmo as vazias
            );
            $categories = get_terms('category', $args);
            foreach ($categories as $category) {
                echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
            }
            ?>
        </select>

        <label for="news_author">Autor:</label>
        <select name="news_author" id="news_author">
            <?php
            $users = get_users(); // Obtém todos os usuários
            foreach ($users as $user) {
                echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Adicionar Notícia">
    </form>
</div>

<?php get_footer(); ?>