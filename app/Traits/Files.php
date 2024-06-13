<?php
namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

trait Files {

    /**
     * Delete the file with params to a given path
     *
     * @param $file_path
     * @param $file_path
     * @return string
     */
    public function deleteFile($file_path){
        if(File::exists($file_path)){
            File::delete($file_path);
            return true;
        }
        return false;
    }

    public function previousFile($config_path, $file_name){
        return storage_path('app/'.config($config_path).'/'.$file_name);
    }

    public function randomFilename(UploadedFile $file, $prefix=''){
        //$file->getClientOriginalName() //Option
        $filename = $prefix.$this->randomText();
        $extension = $file->getClientOriginalExtension();
        return $filename.'.'.$extension;
    }

    public function fileStoragePath($config_path, $file_name){
        $directory =  storage_path('app/'.config($config_path));
        $file =  storage_path('app/'.config($config_path).'/'.$file_name);
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        return $file;
    }

    public function randomText()
    {
        return uniqid().Auth::user()->id.time();
    }
}

?>
