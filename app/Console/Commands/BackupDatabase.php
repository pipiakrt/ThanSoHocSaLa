<?php

namespace App\Console\Commands;

use File;
use Storage;
use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BackupDatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fileName = "Backup_" . date("d-m-Y") . ".sql";
        $path = "BackupDatabase/" . $fileName;
        $command = "mysqldump -u root admin_stagethansohocsala > storage/" . $path;
        exec($command);
        $file = File::get(storage_path($path));
        $driveService = Storage::disk('google')->put($fileName, $file);
        return 0;
    }
}
