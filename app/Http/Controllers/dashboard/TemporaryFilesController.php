<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TemporaryFilesController extends Controller
{
    public function store(Request $request)
    {
        $files = $request->allFiles();
 
        if (empty($files)) {
            abort(422, 'Tidak ada file yang diupload.');
        }
 
        if (count($files) > 1) {
            abort(422, 'Hanya boleh mengupload 1 file.');
        }
 
        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);
        
        $filename = $file->getClientOriginalName();

        $folder = uniqid().'-'.now()->timestamp;

        $file->storeAs('public/tmp/'.$folder, $filename);

        TemporaryFile::create([
            'folder' => $folder,
            'filename' => $filename,
        ]);

        return $folder;
    }
    public function destroy(Request $request)
    {
        $folder = $request->getContent();
        $temporaryFile = TemporaryFile::where('folder', $folder)->first();
        
        if ($temporaryFile) {
            Storage::deleteDirectory('public/tmp/' . $folder);
            $temporaryFile->delete();
    
            return response()->json(['message' => 'File Temporary berhasil dihapus.'], 200);
        } else {
            return response()->json(['message' => 'File Temporary tidak ditemukan.'], 404);
        }
    }
}
