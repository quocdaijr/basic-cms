<?php

if (!function_exists('z')) {
    function z()
    {
        return Yii::$app;
    }
}

if (!function_exists('q')) {
    function q()
    {
        return Yii::$app->request;
    }
}

if (!function_exists('t')) {
    function t($category, $message, $params = [], $language = 'en')
    {
        return Yii::t($category, $message, $params, $language);
    }
}

if (!function_exists('colorRandom')) {
    function colorRandom()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('minimizeSentence')) {
    function minimizeSentence($sentence, $length, $sign = true)
    {
        $minimize_sentence = '';
        $sentence = trim($sentence);
        $word_arr = explode(' ', $sentence);
        $count = 1;
        foreach ($word_arr as $index => $word) {
            $temp = $minimize_sentence . ' ' . $word;
            if (strlen($temp) <= $length) {
                if ($count == 1) {
                    $minimize_sentence = $word;
                } else {
                    $minimize_sentence = $temp;
                }
            } else break;
            $count++;
        }
        if (strlen($minimize_sentence) < strlen($sentence) && $sign == true) {
            $minimize_sentence .= '...';
        }

        return $minimize_sentence;
    }
}

if (!function_exists('formatCapacity')) {
    function formatCapacity($capacity, $unit = 'byte', $precision = 2) {
        switch ($unit) {
            case 'tb':
                $units = ['TB'];
                break;
            case 'gb':
                $units = ['GB', 'TB'];
                break;
            case 'mb':
                $units = ['MB', 'GB', 'TB'];
                break;
            case 'kb':
                $units = ['KB', 'MB', 'GB', 'TB'];
                break;
            case 'byte':
            default:
                $units = ['BYTE', 'KB', 'MB', 'GB', 'TB'];
                break;
        }

        $capacity = max($capacity, 0);
        $pow = floor(($capacity ? log($capacity) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $capacity /= pow(1024, $pow);

        return round($capacity, $precision) . ' ' . $units[$pow];
    }
}

if (!function_exists('stripVietnamese')) {
    function stripVietnamese($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ứ|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        $str = preg_replace('/\p{M}/u', '', $str);
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }
}

if (!function_exists('vietnameseSpecialCharacters')) {
    function vietnameseSpecialCharacters() {
        return [
            'á','à','ả','ã','ạ','ă', 'ắ', 'ặ', 'ằ', 'ẳ', 'ẵ', 'â', 'ấ','ầ','ẩ','ẫ', 'ậ',
            'đ',
            'é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ',
            'í','ì','ỉ','ĩ','ị',
            'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ',
            'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự',
            'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ',
            'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ặ', 'Ằ', 'Ẳ', 'Ẵ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ',
            'Đ',
            'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ',
            'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị',
            'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ',
            'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ứ', 'Ữ', 'Ự',
            'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'
        ];
    }
}

if (!function_exists('toSlug')) {
    function toSlug($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?", "-");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9\-]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}






function userIdentifierCallbackForAudit($user_id)
{
    if (!empty($user_id))
        $user = z()->userHelper->getUser($user_id, UserConstant::BY_ID, 1);
    return !empty($user['username']) ? $user['username'] : $user_id;
}