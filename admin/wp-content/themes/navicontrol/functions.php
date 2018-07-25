<?php
add_theme_support('post-thumbnails');

//login logo
function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important; width:303px !important; height:80px !important; }</style>';
}

add_action('login_head', 'custom_login_logo');


//timthumb

define('THEME_DIR', get_template_directory_uri());
/* Timthumb CropCropimg */
function thumbCrop($img='', $w=false, $h=false, $zc=1){
    if($h)
        $h = "&amp;h=$h";
    else
        $h = "";
        
    if($w)
        $w = "&amp;w=$w";
    else
        $w = "";
    $img = str_replace(get_bloginfo('url'), '', $img);
    $image_url = THEME_DIR . "/timthumb/timthumb.php?src=" . $img . $h . $w ;
    return $image_url;

}
$image_cache = THEME_DIR . "/php/cache/";
chmod($image_cache, 0777);

// 管理画面サイドバーメニュー非表示
function remove_menus () {
    if (!current_user_can('level_9')) { //level9以下のユーザーの場合メニューをunsetする
    global $menu;
    var_dump($menu);
    unset($menu[2]);//ダッシュボード
    unset($menu[4]);//メニューの線1
    unset($menu[5]);//投稿
    unset($menu[15]);//リンク
    unset($menu[20]);//ページ
    unset($menu[25]);//コメント
    unset($menu[59]);//メニューの線2
    unset($menu[60]);//テーマ
    unset($menu[65]);//プラグイン
    unset($menu[70]);//プロフィール
    unset($menu[75]);//ツール
    unset($menu[80]);//設定
    unset($menu[90]);//メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');

function custom_admin_footer() {
    echo 'TeddyCoder - http://navicontrol.com.vn/ - Navicontrol - 2018';
}
add_filter('admin_footer_text', 'custom_admin_footer');

/* term drop down function */
function todo_restrict_manage_posts() {
    global $typenow;
    $args=array( 'public' => true, '_builtin' => false );
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
    $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            wp_dropdown_categories(array(
                'show_option_all' => __('カテゴリー '),
                'taxonomy' => $tax_slug,
                'name' => $tax_obj->name,
                'orderby' => 'term_order',
                'selected' => $_GET[$tax_obj->query_var],
                'hierarchical' => $tax_obj->hierarchical,
                'show_count' => false,
                'hide_empty' => true
            ));
        }
    }
}
function todo_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
                $var = $term->slug;
            }
        }
    }
    return $query;
}
add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
add_filter('parse_query','todo_convert_restrict');
/* term drop down function end*/

//for archives
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( '' != $my_archives_post_type )
    $add_link .= '?post_type=' . $my_archives_post_type;
	$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link."'",$link_html);

  return $link_html;
}

// paging
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}


// Custom post

//sample
add_action('init', 'my_custom_services');
function my_custom_services()
{
  $labels = array(
    'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Services', 'post type singular name'),
    'add_new' => _x('add services', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit services'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('services',$args);
}

add_action('init', 'my_custom_news');
function my_custom_news()
{
  $labels = array(
    'name' => _x('News', 'post type general name'),
    'singular_name' => _x('News', 'post type singular name'),
    'add_new' => _x('add News', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit News'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('news',$args);
}

add_action('init', 'my_custom_career');
function my_custom_career()
{
  $labels = array(
    'name' => _x('Career', 'post type general name'),
    'singular_name' => _x('Career', 'post type singular name'),
    'add_new' => _x('add Career', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit Career'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('career',$args);
}


add_action('init', 'my_custom_library');
function my_custom_library()
{
  $labels = array(
    'name' => _x('Library', 'post type general name'),
    'singular_name' => _x('Library', 'post type singular name'),
    'add_new' => _x('add Library', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit Library'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','thumbnail'),
    'has_archive' => true
  );
  register_post_type('library',$args);
}

// make taxonomy
add_action ('init','create_librarycat_taxonomy','0');
function create_librarycat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('librarycat','post type general name'),
	'singular_name' => _x('librarycat','post type singular name'),
	'search_items' => __('librarycat'),
	'all_items' => __('librarycat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Cat記事を編集'),
	'add_new_item' => __('Cat記事を書く'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'librarycat' )
	);
	register_taxonomy('librarycat','library',$args);

}

add_action('init', 'my_custom_document');
function my_custom_document()
{
  $labels = array(
    'name' => _x('Document', 'post type general name'),
    'singular_name' => _x('Document', 'post type singular name'),
    'add_new' => _x('add Document', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit Document'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','thumbnail'),
    'has_archive' => true
  );
  register_post_type('document',$args);
}

add_action('init', 'my_custom_client');
function my_custom_client()
{
  $labels = array(
    'name' => _x('Client', 'post type general name'),
    'singular_name' => _x('Client', 'post type singular name'),
    'add_new' => _x('add Client', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit Client'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','thumbnail'),
    'has_archive' => true
  );
  register_post_type('client',$args);
}

add_action('init', 'my_custom_slider');
function my_custom_slider()
{
  $labels = array(
    'name' => _x('Slider', 'post type general name'),
    'singular_name' => _x('Slider', 'post type singular name'),
    'add_new' => _x('add Slider', 'news'),
    'add_new_item' => __('add new item'),
    'edit_item' => __('edit Slider'),
    'new_item' => __('new item'),
    'view_item' => __('View Item'),
    'search_staff' => __('search'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor'),
    'has_archive' => true
  );
  register_post_type('slider',$args);
}