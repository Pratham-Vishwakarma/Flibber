<?php
namespace App\Services;
use GuzzleHttp\Client;
class VultrService
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.vultr.com/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('VULTR_API_KEY'),
                'Accept'        => 'application/json',
            ],
        ]);
    }
    public function listInstances()
    {
        $response = $this->client->get('instances');
        return json_decode($response->getBody(), true);
    }
    // Add more API methods as needed
}
