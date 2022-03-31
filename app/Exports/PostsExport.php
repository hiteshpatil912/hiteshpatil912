<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }
    /**
    * @var Post $post
    */
    public function map($post): array
    {
        return [
            $post->id,
            $post->user->name,
            $post->title,
            $post->description,
        ];
    }
}
