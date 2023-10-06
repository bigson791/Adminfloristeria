<?php

namespace App\Controllers;
use CodeIgniter\RESTful\Controller;
use App\Controllers\BaseController;
use Automattic\WooCommerce\Client;

class WooCommerce extends BaseController
{
    protected $url;
    protected $custumerKey;
    protected $secretKey;
    protected $client;

    public function __construct()
    {
        $this->client = new Client('https://floristeriasguate.com/wp-json/wc/v3/', $custumerKey, $secretKey);
    }

    public function index()
    {
        // Devuelve todos los productos
        return $this->client->products->get();
    }

    public function show($id)
    {
        // Devuelve un producto específico
        return $this->client->products->get($id);
    }

    public function getProductsForInternalUsers()
    {
        // Devuelve todos los productos para usuarios internos
        return $this->client->products->get(
            ['auth_key' => 'API_KEY_FOR_INTERNAL_USERS']
        );
    }

    public function getProductsForExternalUsers()
    {
        // Devuelve todos los productos para usuarios externos
        return $this->client->products->get(
            ['auth_key' => 'API_KEY_FOR_EXTERNAL_USERS']
        );
    }

}
