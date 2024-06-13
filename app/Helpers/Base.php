<?php

/**
 * check if string is json
 * @param mixed string
 * @return boolean
 */

use App\Domain\PropertyManagement\Entities\Property;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;




use Illuminate\Support\Facades\Storage;

if (!function_exists('platform')) {
    function platform()
    {
        return config('app.platform');
    }
}

if (!function_exists('generateUuid')) {
    function generateUuid($length)
    {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }

        return $random;
    }
}

if (!function_exists('storageUrl')) {
    function storageUrl($path)
    {
        $filesystemDefault = config('filesystems.default');
        if ($filesystemDefault == 'gcs') {
            return Storage::url($path);
        } else {
            return asset(Storage::url($path));
        }
    }
}

if (!function_exists('replaceExceptCharToDash')) {
    function replaceExceptCharToDash($text)
    {
        return preg_replace("/[^0-9a-zA-Z]/", "_", $text);
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('responseFile')) {
    function responseFile($path)
    {
        $filesystemDefault = config('filesystems.default');
        if ($filesystemDefault == 'gcs') {
            $file = file_get_contents(storagePath($path));
            return response($file);
        } else {
            return response()->file(storagePath($path));
        }
    }
}

if (!function_exists('castArrayValueToFloat')) {
    function castArrayValueToFloat($array)
    {
        return array_map('floatval', $array);
    }
}

if (!function_exists('generate_username_with_email')) {
    function generate_username_with_email($email)
    {
        return preg_replace('/[^A-Za-z0-9\-]/', '_', $email);
    }
}

if (!function_exists('responseImageWithPath')) {
    function responseImageWithPath($path)
    {
        $headers = [
            'Content-Type' => 'image',
            'Cache-Control' => 'max-age=31536000',
        ];

        $filesystemDefault = config('filesystems.default');
        if ($filesystemDefault == 'gcs') {
            $file = file_get_contents(storagePath($path));
            return response($file)->withHeaders($headers);
        } else {
            return response()->file(storagePath($path), $headers);
        }
    }
}

if (!function_exists('responseImage')) {
    function responseImage($image)
    {
        $headers = [
            'Content-Type' => 'image',
            'Cache-Control' => 'max-age=31536000',
        ];

        if ($image) {
            return response($image)->withHeaders($headers);
        } else {
            return abort(404);
        }
    }
}

if (!function_exists('responseImage')) {
    function responseImage($image)
    {
        $headers = [
            'Content-Type' => 'image',
            'Cache-Control' => 'max-age=31536000',
        ];

        return response($image)->withHeaders($headers);
    }
}

if (!function_exists('responseDownload')) {
    function responseDownload($path, $name = null)
    {
        $filesystemDefault = config('filesystems.default');
        $pathInfo = pathinfo($path);
        if ($name == null && isset($pathInfo['filename'])) {
            $name = $pathInfo['fileinfo'];
        }

        if ($filesystemDefault == 'gcs') {

            $filename = $pathInfo['basename'] ?? null;
            if (!$filename) {
                return rest_error(null, 'Data not found');
            }

            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy(Storage::url($path), $tempImage);

            return response()->download($tempImage, $name);
        } else {
            return response()->download(public_path('storage/' . $path), $name);
        }
    }
}

if (!function_exists('storagePath')) {
    function storagePath($path)
    {
        $filesystemDefault = config('filesystems.default');
        if ($filesystemDefault == 'gcs') {
            return Storage::url($path);
        } else {
            return Storage::path($path);
        }
    }
}

if (!function_exists('storageDeleteDir')) {
    function storageDeleteDir($path)
    {

        $filesystemDefault = config('filesystems.default');
        if ($filesystemDefault == 'gcs') {
            return Storage::deleteDirectory($path);
        } else {
            return File::deleteDirectory(storage_path($path));
        }
    }
}

if (!function_exists('removeMultiSlash')) {
    function removeMultiSlash($str)
    {
        return preg_replace('#/+#', '/', $str);
    }
}

if (!function_exists('validate_date')) {
    function validate_date($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}

if (!function_exists('implode_with_key')) {
    function implode_with_key($delimiterKey, $sparator, $input)
    {
        return implode($sparator, array_map(
            function ($v, $k) use ($delimiterKey) {
                return sprintf("%s" . $delimiterKey . "%s", $k, $v);
            },
            $input,
            array_keys($input)
        ));
    }
}

if (!function_exists('is_json')) {
    function is_json($string)
    {
        return is_string($string) && is_array(json_decode($string, true));
    }
}

if (!function_exists('format_money_with_currency')) {
    function format_money_with_currency($angka, $currency = 'IDR')
    {
        return $currency . ' ' . format_money($angka);
    }
}

if (!function_exists('format_money')) {
    function format_money($angka)
    {
        $data = 0;
        if (gettype($angka) == 'string') {
            $data = intval($angka);
        } else {
            $data = $angka;
        }

        $hasil_rupiah = number_format($data, 0, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('is_true_in_string')) {
    function is_true_in_string($value)
    {
        return $value === true || $value == 1 || $value == 'true' || $value == '1';
    }
}

/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('localizeText')) {
    function localizeText($data)
    {
        $decoded = is_json($data) ? json_decode($data) : $data;
        $lang = app()->getLocale() ?? 'id';
        return $lang == 'id' ? $decoded->id : $decoded->en;
    }
}

/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('localizeObject')) {
    function localizeObject($data)
    {
        if ($data) {
            $decoded = is_json($data) ? json_decode($data) : $data;
            $lang = app()->getLocale() ?? 'id';
            return $lang == 'id' ? $decoded->id : $decoded->en;
        }
    }
}


/**
 * create get setting config if doesnt exists
 * @param string key
 * @return mixed
 */
if (!function_exists('setting')) {
    function setting($key)
    {
        if ($key) {
            return config('setting.' . $key);
        }
    }
}

/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('localizeSlug')) {
    function localizeSlug($slugs)
    {
        $lang = app()->getLocale() ?? 'id';
        $slug = $slugs->where('lang', $lang)->first();
        if (!$slug) {
            $slug = $slugs->where('lang', config('app.fallback_locale'))->first();
        }
        return $slug;
    }
}

/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('rest_api')) {
    function rest_api($data, $many = false, $message="Berhasil memproses data", $success=true, $code = 200, $addHeaders = [])
    {
        $attribute          = $many ? (array('items' => $data)) : $data;

        $rest = [
            "success" => $success,
            "message" => $message,
            "version"   => config("api.version.1"),
            "data"      => $attribute
        ];

        return response()
            ->json($rest, $code)
            ->withHeaders($addHeaders);
    }
}

/**
 * create rest_api error response if doesnt exists
 * @param string|array|object message
 * @param mixed additional data
 * @param integer response code
 * @param integer error code
 * @return Response
 */
if (!function_exists('rest_error')) {
    function rest_error($message, $data = null, $code = 400, $errCode = null, $addHeaders = [])
    {
        $rest   = [
            "success" => false,
            "message" => $message??"Gagal memproses data",
            "version"   => config("api.version.1"),
            "error" => [
                "code"       => $code,
                "message"    => $message,
            ]
        ];

        if ($errCode)
            $rest['error']['code'] = $errCode;

        if ($data)
            $rest['error']['errors'] = $data;

        return response()
            ->json($rest, $code)
            ->withHeaders($addHeaders);
    }
}

/**
 * @return Array
 */
if (!function_exists('headerContentLanguage')) {
    function headerContentLanguage()
    {
        return ['Content-Language' => app()->getLocale()];
    }
}

/**
 * create rest_api response if doesnt exists
 * @param mixed data
 * @param array attribute
 * @param integer response code
 * @return Response
 */
if (!function_exists('rest_api_xml')) {
    function rest_api_xml($data)
    {
        $setToXml = $data->asXML();
        return response()->xml($setToXml);
    }
}
