<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class BaseController extends Controller{

    public function showPhoto($key, $filename){
        $path = storage_path('app/'.config('path.'.$key).'/'.$filename);
        if(!File::exists($path))
            //$path = storage_path('app/'.config('path.'.$path.'-default'));
            $path = public_path('img/'.config('path.'.$key.'-default'));

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function downloadFile($path, $filename){
        $path = storage_path('app/'.config('path.'.$path).'/'.$filename);
        if(!File::exists($path))
            abort(404);
        return response()->download($path);
    }

    public function previewFile($path, $filename){
        $path = storage_path('app/'.config('path.'.$path).'/'.$filename);
        if(!File::exists($path))
            abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        $response->header('Content-Disposition', 'inline; filename="'.$filename.'"');
        return $response;
    }
}
