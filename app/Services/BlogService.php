<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogService
{
    public function getAllBlogs($perPage)
    {
        return Blog::latest()
            ->paginate($perPage);
    }

    public function createBlog(array $data)
    {
        $blog = new Blog($data);

        if (isset($data['image'])) {
            $blog->setImageAttribute($data['image']);
        }
        $blog->slug = Str::slug($data['title'], '-');
        $blog->save();

        return $blog;
    }

    public function editBlog(int $id)
    {
        return Blog::findOrFail($id);
    }

    public function updateBlog(int $id, array $data)
    {
        $blog = Blog::findOrFail($id);

        if (request()->hasFile('image')) {
            $blog->setImageAttribute($data['image']);
        }
        $blog->slug = Str::slug($data['title'], '-');
        $blog->fill($data)->update();

        return $blog;
    }


    public function deleteBlog(int $id)
    {
        return Blog::findOrFail($id)
            ->delete();
    }
}
