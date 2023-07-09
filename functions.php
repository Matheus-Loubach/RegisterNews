<?php

//Style CSS e JS
function wpdevs_load_scripts()
{
    wp_enqueue_style('wpdevs-styles', get_stylesheet_uri(), array(), filemtime(get_template_directory() . "./style.css"), 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200&family=Roboto:wght@400;700&display=swap', array(), null);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
    // wp_enqueue_style('main', get_template_directory_uri() . 'style.css', array(), '1.0');
}


// Registrar menus de navegação
register_nav_menus(
    array(
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu'
    )
);

//Adicionar Noticias
function submit_news_form()
{
    // Verifica se os dados do formulário foram enviados
    if (isset($_POST['news_title'], $_POST['news_content'], $_POST['news_category'])) {
        $title = sanitize_text_field($_POST['news_title']);
        $content = wp_kses_post($_POST['news_content']);
        $category_id = intval($_POST['news_category']); // Obtém o ID da categoria selecionada

        // Realiza a validação dos dados
        if (empty($title) || empty($content) || empty($category_id)) {
            // Exibe uma mensagem de erro caso algum campo esteja vazio
            wp_die('Por favor, preencha todos os campos obrigatórios.');
        }

        // Cria um novo post com os dados enviados
        $new_post = array(
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'post',
        );

        // Insere o novo post no banco de dados
        $post_id = wp_insert_post($new_post);

        // Verifica se o post foi inserido com sucesso
        if ($post_id) {
            // Atualiza a categoria do post
            wp_set_post_categories($post_id, array($category_id));

            // Redireciona para a página INICIO
            wp_redirect(home_url('/'));
            exit;
        } else {
            // Exibe uma mensagem de erro caso ocorra algum problema
            wp_die('Erro ao adicionar a notícia.');
        }
    } else {
        // Exibe uma mensagem de erro caso algum campo esteja faltando
        wp_die('Por favor, preencha todos os campos obrigatórios.');
    }
}


// Função para desativar a ocultação de categorias vazias
function show_empty_categories($args)
{
    $args['hide_empty'] = false;
    return $args;
}

if (is_user_logged_in()) {
    show_admin_bar(false); // mostrar a barra administrativa
}

// Processar o formulário,css e js
add_action('admin_post_nopriv_submit_news_form', 'submit_news_form');
add_action('admin_post_submit_news_form', 'submit_news_form');
add_action('wp_enqueue_scripts', 'wpdevs_load_scripts');
