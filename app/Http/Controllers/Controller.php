<?php

namespace App\Http\Controllers;

use App\Traits\ResponseApi;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseApi;

    public function show($path, $slug)
    {
        $this->middleware('auth');

        try {
            if ((!Auth::check() && $path !== 'pdfTmp')) {
                abort(403);
            }

            $filePath = $path . '/' . $slug;
            $publicFilePath = 'public/' . $path . '/' . $slug;
            if ((!Storage::disk('local')->exists($filePath)) && (!Storage::disk('local')->exists($publicFilePath))) {
                abort('404');
            }

            if (Storage::disk('local')->exists($publicFilePath)) {
                return Storage::disk('local')->download($publicFilePath);
            }

            return response()->file(storage_path('app/' . $filePath));

        } catch (FileNotFoundException $exception) {
            abort(404);
        }
    }
}
