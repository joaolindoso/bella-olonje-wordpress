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


// Register Custom Post Type Banners
function banners_post_type() {

	$labels = array(
		'name'                  => _x( 'Banners', 'Post Type General Name', 'banners' ),
		'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'banners' ),
		'menu_name'             => __( 'Banners', 'banners' ),
		'name_admin_bar'        => __( 'Banners', 'banners' ),
	);
	$args = array(
		'label'                 => __( 'Banners', 'banners' ),
		'description'           => __( 'Nossos Banners', 'banners' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'taxonomies'              => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'banners', $args );

}
add_action( 'init', 'banners_post_type', 0 );


