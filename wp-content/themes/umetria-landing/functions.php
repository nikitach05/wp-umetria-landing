<?php

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

add_theme_support('post-thumbnails');

define('PATH_THEME', get_site_url() . "/wp-content/themes/umetria-landing/");

function start_session() {
    if(!session_id()) {
    session_start();
    }
}

if (function_exists('add_theme_support')) {
add_theme_support('menus');
}

// add_action( 'init', 'tpl_jobs' );
// function tpl_jobs() {
//     register_post_type( 'jobs', array(
//         'labels' => array(
//             'name' => 'Вакансии',
//             'all_items' => 'Все',
//             'add_new' => 'Добавить',
//             'add_new_item' => 'Добавление'
//             ),
//         'public' => true,
//         'show_in_nav_menus' => true,
//         'show_in_menu' => true,
//         'supports' => array( 'title', 'custom-fields', 'revisions' ),
//         )
//     );
// };

add_action( 'wp_ajax_send_form', 'send_form' );
add_action( 'wp_ajax_nopriv_send_form', 'send_form' );
function send_form() {

    $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    

    $from = get_field('email_from', 'options');
    $to = get_field('email_to', 'options');

    $subject = "Заявка с Prime Top";

    $body = "";

    if (empty($email) && empty($phone)) {
      return false;
    }

    if (!empty($phone)) {
      $body .= "Телефон: " . $phone . "<br>";
    }

    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'])));
    $filename = $_FILES['fileFF']['name'];
    $filetype = $_FILES['fileFF']['type'];

    $boundary = md5(date('r', time()));

    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"_1_$boundary\"";

    $message="
    --_1_$boundary
    Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

    --_2_$boundary
    Content-Type: text/html; charset=\"utf-8\"
    Content-Transfer-Encoding: 7bit

    $body

    --_2_$boundary--
    --_1_$boundary
    Content-Type: \"$filetype\"; name=\"$filename\"
    Content-Transfer-Encoding: base64
    Content-Disposition: attachment

    $attachment
    --_1_$boundary--";

    if (is_string($to)) {
        if (mail($to, $subject, $message, $headers)) {
            echo 'ok';
        }
    }
}

// allow SVG uploads
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
  $existing_mimes['svg'] = 'image/svg+xml';
  return $existing_mimes;
}
function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
 }
add_action('admin_head', 'fix_svg');

add_filter( 'upload_mimes', 'svg_upload_allow' );
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
  $mimes['svg']  = 'image/svg+xml';

  return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

  // WP 5.1 +
  if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
    $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
  else
    $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

  // mime тип был обнулен, поправим его
  // а также проверим право пользователя
  if( $dosvg ){

    // разрешим
    if( current_user_can('manage_options') ){

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    }
    // запретим
    else {
      $data['ext'] = $type_and_ext['type'] = false;
    }

  }

  return $data;
}

add_filter( 'upload_mimes', 'upload_allow_types' );
add_filter( 'wp_check_filetype_and_ext', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
  // разрешаем новые типы
  $mimes['svg']  = 'image/svg+xml';
  $mimes['doc']  = 'application/msword';
  $mimes['woff'] = 'font/woff';
  $mimes['psd']  = 'image/vnd.adobe.photoshop';
  $mimes['djv']  = 'image/vnd.djvu';
  $mimes['djvu'] = 'image/vnd.djvu';

  return $mimes;
}

// Вернуть старый редактор
if( 'disable_gutenberg' ){
  remove_theme_support( 'core-block-patterns' );
  add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
  remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
  add_action( 'admin_init', function(){
  remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
  add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
  } );
}