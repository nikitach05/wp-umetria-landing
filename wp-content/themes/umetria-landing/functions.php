<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require '/OpenServer/domains/umetria-landing/vendor/autoload.php';
require '/var/www/www-root/data/www/xn-----7kcbeuaaea0a4ad4ad5cxb5cwa.xn--p1ai/vendor/autoload.php';

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

if ( function_exists('acf_add_options_page') ) {
  acf_add_options_page(['page_title' => 'MAIL', 'menu_slug'  => 'theme-general-mail']);
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

  $mail_from = get_field('mail-from', 'options');
  $mail_to = get_field('mail-to', 'options');
  $mail->setFrom($mail_from, 'Лечение на брекетах');
  foreach ($mail_to as $item) {
    $mail->addAddress($item['mail'], $item['mail']);
  }

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
	
	/* send calltouch */
	try {
		$ct_site_id = '68946'; // ID сайта Calltouch
		$call_value = $_COOKIE['_ct_session_id'];
		if (isset($_POST['call_value'])) {
			$call_value = $_POST['call_value'];
		}
		$ct_data = array(
			'subject'       =>   $subject,
			'fio'           =>   $name,
			'phoneNumber'   =>   $phone,
			'requestUrl'    =>   $_SERVER['HTTP_REFERER'],
			'sessionId'     =>   $call_value
		);
		$ct_data_str = http_build_query($ct_data);
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.calltouch.ru/calls-service/RestAPI/requests/$ct_site_id/register/");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $ct_data_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$calltouch = curl_exec($ch);
		 
		// Проверка на ошибку выполнения запроса
		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch));
		}
		 
		// Получение HTTP-кода ответа
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($http_code != 200) {
			throw new Exception("HTTP response code: " . $http_code . ". Response: " . $calltouch);
		}
	 
		curl_close($ch);
	 
		// Логируем успешный запрос
		$log_message = "\n \n" . "request " . date("Y.m.d H:i") . "\n";
		$log_message .= "Data sent: " . $ct_data_str . "\n";
		$log_message .= "Response: " . $calltouch . "\n";
		//file_put_contents(__DIR__ . '/calltouch_log.txt', $log_message, FILE_APPEND | LOCK_EX);
	 
	} catch (Exception $e) {
		// Логируем ошибку
		$log_message = "\n \n" . "request " . date("Y.m.d H:i") . "\n";
		$log_message .= "Data sent: " . $ct_data_str . "\n";
		$log_message .= "Error: " . $e->getMessage() . "\n";
		file_put_contents(__DIR__ . '/calltouch_error_log.txt', $log_message, FILE_APPEND | LOCK_EX);
	}
	/* send calltouch */
	
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}

// Quiz form
add_action( 'wp_ajax_send_quiz_form', 'send_quiz_form' );
add_action( 'wp_ajax_nopriv_send_quiz_form', 'send_quiz_form' );
function send_quiz_form() {

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
  $data = [];
  $data[0] = ['Имя:', isset($_POST["quiz-step-9-name"]) ? $_POST["quiz-step-9-name"] : ''];
  $data[1] = ['Телефон:', isset($_POST["quiz-step-9-phone"]) ? $_POST["quiz-step-9-phone"] : ''];
  $data[2] = ['Для кого подбираете лечение ?', isset($_POST["quiz-step-1"]) ? $_POST["quiz-step-1"] : ''];
  $data[3] = ['Какая у вас проблема с прикусом ?', isset($_POST["quiz-step-2"]) ? $_POST["quiz-step-2"] : ''];
  $data[4] = ['Были ли вы ранее у врача-ортодонта?', isset($_POST["quiz-step-3"]) ? $_POST["quiz-step-3"] : ''];
  $data[5] = ['Проходили ли ранее ортодонтическое лечение?', isset($_POST["quiz-step-4"]) ? $_POST["quiz-step-4"] : ''];
  $data[6] = ['Прорезались ли у вас зубы мудрости ?', isset($_POST["quiz-step-5"]) ? $_POST["quiz-step-5"] : ''];
  $data[7] = ['Удаляли ли вы зубы мудрости?', isset($_POST["quiz-step-6"]) ? $_POST["quiz-step-6"] : ''];
  $data[8] = ['Доп. комментарий', isset($_POST["quiz-step-8"]) ? $_POST["quiz-step-8"] : ''];

  $mail_from = get_field('mail-from', 'options');
  $mail_to = get_field('mail-to', 'options');
  $mail->setFrom($mail_from, 'Лечение на брекетах');
  foreach ($mail_to as $item) {
    $mail->addAddress($item['mail'], $item['mail']);
  }

  $mail->isHTML(true);
  $subject = 'Квиз';
  $mail->Subject = $subject;

  $body = "<table style='border-collapse: collapse;width: 100%;max-width: 600px;'>";

  foreach ($data as $item) {
    if (!empty($item[1])) {
      $body .= "<tr><td style='border: 1px solid #ddd;padding: 8px;'><strong>" . $item[0] . "</strong></td><td style='border: 1px solid #ddd;padding: 8px;'>" . $item[1] . "</td></tr>";
    }
  }

  $body .= "</table>";

  $mail->Body = $body;

  // Files
  $allowedFormats = array('jpg', 'jpeg', 'png', 'heic');
  if (!empty($_FILES['quiz-step-7']['name'][0])) {
      for ($i = 0; $i < count($_FILES['quiz-step-7']['tmp_name']); $i++) {
          $fileExtension = pathinfo($_FILES['quiz-step-7']['name'][$i], PATHINFO_EXTENSION);
          if (in_array(strtolower($fileExtension), $allowedFormats)) {
              $mail->addAttachment($_FILES['quiz-step-7']['tmp_name'][$i], $_FILES['quiz-step-7']['name'][$i]);
          }
      }
  }

  try {
    $mail->send();
    echo 'ok';
	
	/* send calltouch */
	try {
		$ct_site_id = '68946'; // ID сайта Calltouch
		$call_value = $_COOKIE['_ct_session_id'];
		if (isset($_POST['call_value'])) {
			$call_value = $_POST['call_value'];
		}
		$ct_data = array(
			'subject'       =>   $subject,
			'fio'           =>   isset($_POST['quiz-step-9-name']) ? $_POST['quiz-step-9-name'] : '',
			'phoneNumber'   =>   isset($_POST['quiz-step-9-phone']) ? $_POST['quiz-step-9-phone'] : '',
			'requestUrl'    =>   $_SERVER['HTTP_REFERER'],
			'sessionId'     =>   $call_value
		);
		$ct_data_str = http_build_query($ct_data);
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.calltouch.ru/calls-service/RestAPI/requests/$ct_site_id/register/");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded;charset=utf-8"));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $ct_data_str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$calltouch = curl_exec($ch);
		 
		// Проверка на ошибку выполнения запроса
		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch));
		}
		 
		// Получение HTTP-кода ответа
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($http_code != 200) {
			throw new Exception("HTTP response code: " . $http_code . ". Response: " . $calltouch);
		}
	 
		curl_close($ch);
	 
		// Логируем успешный запрос
		$log_message = "\n \n" . "request " . date("Y.m.d H:i") . "\n";
		$log_message .= "Data sent: " . $ct_data_str . "\n";
		$log_message .= "Response: " . $calltouch . "\n";
		//file_put_contents(__DIR__ . '/calltouch_log.txt', $log_message, FILE_APPEND | LOCK_EX);
	 
	} catch (Exception $e) {
		// Логируем ошибку
		$log_message = "\n \n" . "request " . date("Y.m.d H:i") . "\n";
		$log_message .= "Data sent: " . $ct_data_str . "\n";
		$log_message .= "Error: " . $e->getMessage() . "\n";
		file_put_contents(__DIR__ . '/calltouch_error_log.txt', $log_message, FILE_APPEND | LOCK_EX);
	}
	/* send calltouch */
	
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