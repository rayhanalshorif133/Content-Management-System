<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ContentController;

class DeleteTempData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tempdatadelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Content Uploaded temp file delete';

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
        $contentController = new ContentController();
        $contentController->tempDataFileDelete();
    }
}
