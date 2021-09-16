<?php

register_nav_menu( 'menu-topo', __( 'Menu Topo', '' ) );

/* Alterando a compressão das imagens */
add_filter('jpeg_quality', function($arg){return 95;});

add_theme_support( 'post-thumbnails' );

add_image_size( 'slide', 640, 520, array('center','center') );
add_image_size( 'galeriadefotos', 292, 180, array('center','center') );

/* Executando o corte das miniatura */
add_image_size( 'slide', 1170, 300, true );
add_image_size( 'slide-noticia-home', 770, 380, array('center','center'));
add_image_size( 'slide-medio', 368, 140, true );
add_image_size( 'lista-noticia', 355, 190, array('center','center'));
add_image_size( 'destaque-home', 730, 420, array('center','center'));
add_image_size( 'quadrodedestaque', 360, 200, array('center','center'));

if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
		'name'=>'Rodapé Coluna 1',
		'id'=>'sidebar-rodapecol1',
		'description'   => 'Coluna 1 do rodapé do website',
		'before_widget' => '',
		'after_widget' => '',
        'before_title' => '',
		'after_title' => '',
	));  

    register_sidebar(array(
		'name'=>'Rodapé Coluna 2',
		'id'=>'sidebar-rodapecol2',
		'description'   => 'Coluna 2 do rodapé do website',
		'before_widget' => '',
		'after_widget' => '',
        'before_title' => '',
		'after_title' => '',
	));     

    register_sidebar(array(
		'name'=>'Rodapé Coluna 3',
		'id'=>'sidebar-rodapecol3',
		'description'   => 'Coluna 3 do rodapé do website',
		'before_widget' => '',
		'after_widget' => '',
        'before_title' => '',
		'after_title' => '',
	));   
	
    register_sidebar(array(
		'name'=>'Rodapé Coluna 4',
		'id'=>'sidebar-rodapecol4',
		'description'   => 'Coluna 4 do rodapé do website',
		'before_widget' => '',
		'after_widget' => '',
        'before_title' => '',
		'after_title' => '',
	));  
    
    register_sidebar(array(
		'name'=>'Mapa do Rodapé',
		'id'=>'sidebar-rodapemapa',
		'description'   => 'Mapa no rodapé do site',
		'before_widget' => '',
		'after_widget' => '',
        'before_title' => '',
		'after_title' => '',
	)); 

}



/*
* Seção Metabox para o campo Chapéu
*/

/* criando metabox para o campo chapeu */

function custom_meta_box_chapeu($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="_chapeu">Chapéu</label>
            <input name="_chapeu" type="text" value="<?php echo get_post_meta($object->ID, "_chapeu", true); ?>">
        </div>
    <?php
}

function add_custom_meta_box()
{
	add_meta_box("meta-box-chapeu", "Chapéu", "custom_meta_box_chapeu", "post", "side", "high", null);
	
	//inserir aqui outro add_meta se houvesse outro campo
}

add_action("add_meta_boxes", "add_custom_meta_box");
/* fim do metabox */

/* salvando os dados do metabox */
function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_chapeu_value = "";

    if(isset($_POST["_chapeu"]))
    {
        $meta_box_chapeu_value = $_POST["_chapeu"];
    }
	update_post_meta($post_id, "_chapeu", $meta_box_chapeu_value);
	
	// inserir prox update se houver outro campo
}

add_action("save_post", "save_custom_meta_box", 10, 3);
/* fim do salvamento */

/*
* Fim da Seção Metabox para o(s) campo(s)
*/




/*
* Criando Post Type para os Banners
*/

add_action('init', 'post_type_banner');

function post_type_banner() {
    register_post_type(
        'banner',
        array(
            'labels' => array(
                 'name' => __( 'Banners' ),
                 'singular_name' => __( 'Banner' ),
                 'add_new' => __('Adicionar Banner', 'Novo Banner'),
			     'add_new_item' => __('Novo Banner'),
			     'edit_item' => __('Editar Banner'),
			     'new_item' => __('Novo Banner'),
			     'view_item' => __('Ver Banner'),
			     'search_items' => __('Procurar Banners'),
                 'all_items' => __('Todos os Banners'),                
			     'not_found' =>  __('Nenhum Banner encontrado'),
			     'not_found_in_trash' => __('Nenhum Banner encontrado na lixeira'),
			     'parent_item_colon' => '',
			     'menu_name' => 'Banners'
                ),
            'description' => __('Registro de Banners'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'register_meta_box_cb' => 'banners_meta_boxes',
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'banner' ),
            'capability_type' => 'post',
            'has_archive' => true,
            'Hierarchical' => false,
            'can_export' => true,
            'exclude_from_search' => false,
            'supports' => array(
                'title',
				'content',
				'excerpt',
                'author',
                'thumbnail')
                /* Nota: foi retirado suporte ao editor */
        )
    );
    register_taxonomy_for_object_type('categoria', 'banner');
    flush_rewrite_rules();
}

/*
* Criando a taxonomia para o tipo Banners
*/

register_taxonomy(
"categoria", 
"banner", 
      array(            
      	"label" => "Categorias", 
        "singular_label" => "Categoria", 
        "rewrite" => true,
        "hierarchical" => true
	  )
);

/*****
Criando os campos personalizados
*****/

add_action( 'admin_init', 'banners_meta_boxes' );

function banners_meta_boxes() {
    add_meta_box( 'chapeu', __('Chapéu'), 'chapeu_meta_box', 'banner', 'normal', 'high' );
}

/*****
Criando cada apresentação HTML dos campos personalizados no form do post type Banners
*****/

function identificacao_linha_meta_box() {
    global $post;
    $nrLinha = get_post_meta($post->ID, '_nr_linha', true);
    $empresa = get_post_meta($post->ID, '_empresa', true);
    if ( function_exists('wp_nonce_field') ) wp_nonce_field('identificacao_linha_nonce', '_identificacao_linha_nonce');
        ?>
            <label for="_nr_linha">Nr. da Linha</label>
            <input type="text" size="10" name="_nr_linha" value="<?php echo wp_specialchars(stripslashes($nrLinha), 1); ?>" />
            <label for="_empresa">Empresa</label>
            <input type="text" size="50" name="_empresa" value="<?php echo wp_specialchars(stripslashes($empresa), 1); ?>" />
        <?php
}

/*****
 Salvando os dados do Post Type Banners
*****/

add_action( 'save_post', 'save_banner_meta_data' );

function save_banner_meta_data( $post_id ) {
    global $post;
    
    // ignore autosaves
    /*if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    
    // check nonces
    check_admin_referer('identificacao_linha_nonce', '_identificacao_linha_nonce');
    check_admin_referer('atendimento_nonce', '_atendimento_nonce');
    check_admin_referer('integrado_nonce', '_integrado_nonce');
    check_admin_referer('horarios_nonce', '_horarios_nonce');

    // check capabilites
    if ( 'banner' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
    return $post_id;*/

    // salvando campos, um por um
    
    update_post_meta($post_id, '_nr_linha', $_POST['_nr_linha']);
    update_post_meta($post_id, '_empresa', $_POST['_empresa']);
    update_post_meta($post_id, '_atendimento', $_POST['_atendimento']);

    update_post_meta($post_id, '_integrado', $_POST['_integrado']);
    
    update_post_meta($post_id, '_diasuteisprimeira', $_POST['_diasuteisprimeira']);
    update_post_meta($post_id, '_diasuteisultima', $_POST['_diasuteisultima']);
    
    update_post_meta($post_id, '_sabadoprimeira', $_POST['_sabadoprimeira']);
    update_post_meta($post_id, '_sabadoultima', $_POST['_sabadoultima']);
    
    update_post_meta($post_id, '_domingoferiadoprimeira', $_POST['_domingoferiadoprimeira']);
    update_post_meta($post_id, '_domingoferiadoultima', $_POST['_domingoferiadoultima']);
    
    update_post_meta($post_id, '_mapa', $_POST['_mapa']);
}

/* Customização das colunas de edição na lista de Banners */

add_action("manage_posts_custom_column",  "banner_custom_columns");
add_filter("manage_edit-banner_columns", "banner_edit_columns");
 
function banner_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Banner",
    "_atendimento" => "Atendimento",
    "_nr_linha" => "Linha",
    "categoria" => "Categoria",
    "terminalintegracao" => "Terminal de Integração",
    "empresa" => "Empresa",
  );
 
  return $columns;
}

function banner_custom_columns($column) {
  global $post;
 
  switch ($column) {
    case "_atendimento":
      $custom = get_post_custom();
      echo $custom["_atendimento"][0];
      break;
    case "_nr_linha":
      $custom = get_post_custom();
      echo $custom["_nr_linha"][0];
      break;
    case "categoria":
      echo get_the_term_list($post->ID, 'categoria');
      break;
    case "terminalintegracao":
      echo get_the_term_list($post->ID, 'terminalintegracao','','<br>');
      break;
    case "empresa":
      echo get_the_term_list($post->ID, 'empresa','' ,'<br>');
      break;
  }
}

/*****
 Função para permitir ordenação pelo campo
*****/

add_filter( 'manage_edit-banner_sortable_columns', 'banner_sortable_columns' );

function banner_sortable_columns( $columns ) {
    $columns['_nr_linha'] = '_nr_linha';
	$columns['categoria'] = 'categoria';
    $columns['terminalintegracao'] = 'terminalintegracao';
    $columns['empresa'] = 'empresa';
	return $columns;
}



/*****
 Função para personalizar a pesquisa no custom post type Banners
*****/

function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'banner') {
                    $query->set('post_type',array('banner'));
                }
        }       
    }
return $query;
}
add_filter('pre_get_posts','searchfilter');

/* fim da criação do custom post type */