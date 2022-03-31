<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $post_id = $row[0];
            $title = $row[3];
            $description = $row[4];
            $post = Post::find($post_id);
            if($post){
                $post->update([
                    'title' => $title,
                    'description' => $description
                    ]);
            }
        }
    }
}