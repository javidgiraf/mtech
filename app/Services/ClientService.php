<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Str;

class ClientService
{
    public function getAllClients(int $perPage)
    {
        return Client::latest()
            ->paginate($perPage);
    }

    public function createClient(array $data)
    {
        $client = new Client($data);

        if (isset($data['logo'])) {
            $client->setLogoAttribute($data['logo']);
        }
        $client->save();

        return $client;
    }

    public function editClient(int $id)
    {
        return Client::findOrFail($id);
    }

    public function updateClient(int $id, array $data)
    {
        $blog = Client::findOrFail($id);

        if (request()->hasFile('logo')) {
            $blog->setLogoAttribute($data['logo']);
        }
        $blog->fill($data)->update();

        return $blog;
    }

    public function deleteClient(int $id)
    {
        return Client::findOrFail($id)
            ->delete();
    }
}