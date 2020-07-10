<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class ResizeImg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resize-img';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('#### start img size ####');
        $this->update();
        $this->info('####  end  img size ####');
    }

    public function update()
    {
        try {
            Blog::orderBy('id')->select('img_path', 'id')->chunk(3, function ($blogs) {
                foreach ($blogs as $blog) {
                    $path = storage_path('app/public/' . $blog->img_path);
                    $this->info($path);
                    $img = \Image::make($path)->resize(300, 200, function ($constraint) {
                        $constraint->upsize();
                    });
                    $img->save();
                }
            });
        } catch (\Exception $e) {
            $this->error("error file: " . $e->getFile());
            $this->error("error line: " . $e->getLine());
            $this->error("error message: " . $e->getMessage());
        }
    }
}
