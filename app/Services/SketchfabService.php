<?php 

namespace App\Services;

use GuzzleHttp\Client;

class SketchfabService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.sketchfab.com/v3/',
        ]);
    }

    public function getAccessToken()
    {
        $response = $this->client->post('oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_api_token' => config('services.sketchfab.api_token'),
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['access_token'];
    }

    public function uploadModel($file)
    {
        $response = $this->client->post('models', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getAccessToken(),
                'Content-Type' => 'multipart/form-data',
            ],
            'multipart' => [
                [
                    'name' => 'modelFile',
                    'contents' => fopen($file->getRealPath(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ],
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
