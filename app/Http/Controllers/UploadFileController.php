<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StdClass;
use Illuminate\Http\UploadedFile;

class UploadFileController extends Controller
{

    public function upload(Request $request)
    {
        $files = $request->file('file');
        $multiple = is_array($files);
        $response = $multiple ? [] : $this->packResponse($files);
        if ($multiple) {
            foreach ($files as $file) {
                $response[] = $this->packResponse($file);
            }
        }
        return response()->json($response);
    }

    private function packResponse(UploadedFile $file)
    {
        $json = new StdClass();
        $json->name = $file->getClientOriginalName();
        $json->mime = $file->getClientMimeType();
        $json->path = $file->storePubliclyAs('', $this->getPublicName($file), 'public');
        $json->url = asset('storage/' . $json->path);
        return $json;
    }

    private function getPublicName(UploadedFile $file)
    {
        if (!$file->guessExtension()) {
            return uniqid('', true) . '.' . $file->clientExtension();
        } else {
            return $file->hashName();
        }
    }
}
