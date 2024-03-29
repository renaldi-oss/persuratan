<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteTempUploadedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-temp-uploaded-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command ini digunakan untuk fungsi scheduled task yang akan menghapus file-file yang diupload ke dalam folder tmp setiap 24 jam sekali.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Storage::directories('tmp') as $directory) {
            $directoryLastModified = Carbon::createFromTimestamp(Storage::lastModified($directory));
 
            if (now()->diffInHours($directoryLastModified) > 24) {
                Storage::deleteDirectory($directory);
            }
        }
    }
}
