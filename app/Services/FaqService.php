<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Support\Str;

class FaqService
{
    public function getAllFaqs($perPage)
    {
        return Faq::latest()
            ->paginate($perPage);
    }

    public function createFaq(array $data)
    {
        return Faq::create($data);
    }

    public function editFaq(int $id)
    {
        return Faq::findOrFail($id);
    }

    public function updateFaq(int $id, array $data)
    {
        $faq = Faq::findOrFail($id)->update($data);

        return $faq;
    }


    public function deleteFaq(int $id)
    {
        return Faq::findOrFail($id)->delete();
    }
}
