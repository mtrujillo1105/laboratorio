<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploaded
{
    public $path;
    public $filename;
    public $extension;

    public function getPath(){
        return isset($this->path) ? $this->path : null;
    }
}

class UploadController extends Controller
{

    public function store(Request $request)
    {
        $upload_path = public_path('upload');
        $file_name = $request->file->getClientOriginalName();
        $generated_new_name = date('Ymd-His') . '_' . $file_name;

        $result = self::moveFile($request->file, $generated_new_name, $upload_path);
        return response()->json($result);
    }

    public static function saveFile(object $file, string $prefix)
    {

        $upload_path = public_path('upload');
        $file_name = $file->getClientOriginalName();
        $generated_new_name = $prefix . '_' . date('Ymd-His') . '_' . $file_name;

        $upload_result = self::moveFile($file, $generated_new_name, $upload_path);

        return $upload_result;
    }

    static function moveFile(object $file, string $filename, string $path)
    {
        try {
            $upload_path = ($path == "" || is_null($path)) ? public_path('upload') : $path;
            $file_name_generated = ($filename == "" || is_null($filename)) ? date('Ymd-His') . '_' . $filename : $filename;

            $file->move($upload_path, $file_name_generated);

            $fullFilename = $upload_path . '\\' . $file_name_generated;

            $file_upload = new FileUploaded();

            $file_upload->path = $fullFilename;
            $file_upload->filename = $file_name_generated;
            $file_upload->extension = $file->getClientOriginalExtension();

            return $file_upload;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
