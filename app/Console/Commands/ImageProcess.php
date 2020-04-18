<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domain\ImageProcess\ImageProcessService;

class ImageProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ImageProcess';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        ImageProcessService $ImageProcessService
    )
    {
        parent::__construct();
        $this->ImageProcessService = $ImageProcessService;
    }


    private $ImageProcessService;
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->ImageProcessService->_test();
    }
}
