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
        $client = Client::findOrFail($id);

        if (request()->hasFile('logo')) {
            $client->setLogoAttribute($data['logo']);
        }
        $client->fill($data)->update();

        return $client;
    }

    public function deleteClient(int $id)
    {
        return Client::findOrFail($id)
            ->delete();
    }
}