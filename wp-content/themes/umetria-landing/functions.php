<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '/OpenServer/domains/umetria-landing/vendor/autoload.php';
// require '/var/www/www-root/data/www/xn-----7kcbeuaaea0a4ad4ad5cxb5cwa.xn--p1ai/vendor/autoload.php';

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

add_action( 'wp_ajax_send_form', 'send_form' );
add_action( 'wp_ajax_nopriv_send_form', 'send_form' );
function send_form() {

  // PHPMailer options
  $mail = new PHPMailer(true);

  $mail->CharSet = 'UTF-8';

  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPDebug = 0;

  $mail->Host = 'ssl://smtp.mail.ru';
  $mail->Username = 'info@umetria.ru';
  $mail->Password = 'FStT0svuqTfgbjaKmpQ6';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
  $mail->Port = 465;

  // Form data
  $form = isset($_POST["form"]) ? $_POST["form"] : '';
  $name = isset($_POST["name"]) ? $_POST["name"] : '';
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';

  $mail->setFrom('info@umetria.ru', 'umetria.ru');
  // $mail->addAddress('info@umetria.ru', 'Umetria');
  // $mail->addAddress('kolyan45495@gmail.com', 'Umetria');
  $mail->addAddress('nikitach05@yandex.ru', 'Umetria');

  $mail->isHTML(true);
  $subject = $form;
  $mail->Subject = $subject;

  $body = "";

  if (!empty($name)) {
    $body .= "Имя: " . $name . "<br>";
  }

  if (!empty($phone)) {
    $body .= "Телефон: " . $phone . "<br>";
  }

  $mail->Body = $body;

  try {
    $mail->send();
    echo 'ok';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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