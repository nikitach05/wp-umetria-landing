<?php

require_once 'access.php';

function get_curl_exec($method, $data, $access_token, $subdomain, $request = 'POST') {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $request);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([$data]));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl);

    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int) $code;
    $errors = [
        301 => 'Moved permanently.',
        400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
        401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
        403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
        404 => 'Not found.',
        500 => 'Internal server error.',
        502 => 'Bad gateway.',
        503 => 'Service unavailable.'
    ];

    if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );
    
    return $out;
}

// POST DATA
$form = isset($_POST['form']) ? $_POST['form'] : 'Квиз';
$name = isset($_POST['name']) ? $_POST['name'] : (isset($_POST["quiz-step-9-name"]) ? $_POST["quiz-step-9-name"] : '');
$phone = isset($_POST['phone']) ? $_POST['phone'] : (isset($_POST["quiz-step-9-phone"]) ? $_POST["quiz-step-9-phone"] : '');
$email = isset($_POST['email']) ? $_POST['email'] : '';
$file_id_from_amo = isset($_POST['file']) ? $_POST['file'] : '';
$url = isset($_POST['url']) ? $_POST['url'] : '-';

// $tag_id = 1182554;
// $tag_name = 'тест';

$ip = '147.45.164.244';
$domain = 'https://umetria.ru';
$price = 0;
$pipeline_id = 8893122;
$user_amo = 11791138; // ID ответственного
$status_id = 71798398; // ID статуса, в который добавляется сделка

$utm_source   = 'utm_source';
$utm_content  = 'utm_content';
$utm_medium   = 'utm_medium';
$utm_campaign = 'utm_campaign';
$utm_term     = 'utm_term';
$utm_referrer = $url;

$title = 'Заявка с лечение-на-брекетах.рф';

if (!empty($form)) {
    $title .= ' (' . $form . ')';
}

$data = [
    "name" => $title,
    "price" => $price,
    "responsible_user_id" => (int) $user_amo,
    "pipeline_id" => (int) $pipeline_id,
    "status_id" => (int) $status_id,
    "_embedded" => [
        // "metadata" => [
        //     "category" => "forms",
        //     "form_id" => 1,
        //     "form_name" => "Форма на сайте",
        //     "form_page" => 'Цель',
        //     "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
        //     "ip" => $ip,
        //     "referer" => $domain
        // ],
        // "tags" => [
        //     ['id' => $tag_id, 'name' => $tag_name]
        // ],
        "contacts" => [
            [
                "first_name" => $name ? $name : ($phone ? $phone : $email),
                "custom_fields_values" => [
                    [
                        "field_code" => "EMAIL",
                        "values" => [
                            [
                                "enum_code" => "WORK",
                                "value" => $email
                            ]
                        ]
                    ],
                    [
                        "field_code" => "PHONE",
                        "values" => [
                            [
                                "enum_code" => "WORK",
                                "value" => $phone
                            ]
                        ]
                    ],
                    // [
                    //     "field_id" => (int) 564061,
                    //     "values" => [
                    //         [
                    //             "value" => $url
                    //         ]
                    //     ]
                    // ]
                ]
            ]
        ]
    ],
    // "custom_fields_values" => [
        // [
        //     "field_id" => (int) 809065,
        //     "values" => [
        //         [
        //             "value" => ''
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_SOURCE',
        //     "values" => [
        //         [
        //             "value" => $utm_source
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_CONTENT',
        //     "values" => [
        //         [
        //             "value" => $utm_content
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_MEDIUM',
        //     "values" => [
        //         [
        //             "value" => $utm_medium
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_CAMPAIGN',
        //     "values" => [
        //         [
        //             "value" => $utm_campaign
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_TERM',
        //     "values" => [
        //         [
        //             "value" => $utm_term
        //         ]
        //     ]
        // ],
        // [
        //     "field_code" => 'UTM_REFERRER',
        //     "values" => [
        //         [
        //             "value" => $utm_referrer
        //         ]
        //     ]
        // ],
    // ],
];

$curl = get_curl_exec("/api/v4/leads/complex", $data, $access_token, $subdomain);

$Response = json_decode($curl, true);

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
$body = "";

foreach ($data as $item) {
    if (!empty($item[1])) {
        $body .= $item[0] . " " . $item[1] . "\r\n";
    }
}

// Проверка на успешное создание лида
if (isset($Response[0]['id']) && isset($_POST["quiz-step-9-name"])) {
    $leadId = $Response[0]['id'];

    // Добавление сообщения в диалог
    $data = [
        'created_by' => $user_amo,
        'note_type' => 'common',
        'params' => [
            'text' => $body
        ]
    ];

    $method = "/api/v4/leads/$leadId/notes";
    $curl = get_curl_exec($method, $data, $access_token, $subdomain);
    // $messageResult = json_decode($curl, true);

    // Прикрепить файл к сделке
    if (!empty($file_id_from_amo)) {
        $method = "/api/v4/leads/$leadId/files";
        $data = [
            'file_uuid' => $file_id_from_amo
        ];
        $curl = get_curl_exec($method, $data, $access_token, $subdomain, 'PUT');
    }

} else {
    echo "Ошибка при создании лида: " . $response;
}

echo "success";