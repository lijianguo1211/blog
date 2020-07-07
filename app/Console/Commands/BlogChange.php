<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\BlogDetail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BlogChange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog-test';

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
        $this->info('#### start ####');
        $this->update();
        $this->info('#### end ####');
    }

    protected function update()
    {
        try {
            DB::connection('mysql_line')
                ->table('blogs as b')
                ->select('b.title', 'b.reading_volume', 'bc.content', 'bc.content_md', 'b.id')
                ->leftJoin('blog_content as bc', 'b.id', '=', 'bc.blog_id')
                ->orderBy('b.id')

                ->chunk(5, function ($blogs) {
                    foreach ($blogs as $blog) {
                        $this->info('123');
                        $blogModel = Blog::create([
                            'title' => $blog->title,
                            'post_status' => 2,
                            'reading_volume' => $blog->reading_volume
                        ]);

                        $blog_id = $blogModel->id;

                        BlogDetail::create([
                            'blog_id' => $blog_id,
                            'content_html' => $blog->content,
                            'content_md' => $blog->content_md,
                        ]);
                    }
                });
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }

    }
}
