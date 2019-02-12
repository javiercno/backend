<?php

namespace App\Infrastructure\Domain\Recipe;

use GuzzleHttp\Client;
use App\Domain\Recipe\Recipe;
use App\Domain\Recipe\RecipeRepository;
use Psr\Http\Message\ResponseInterface;

class RestRecipeRepository implements RecipeRepository
{
    /**
     * @var Client
     */
    private $client;

    /**
     * RestRecipeRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get array recipes
     * @param array $query
     * @return array
     */
    public function getRecipes(array $query): array
    {
        $response = $this->request($query);

        $response = \json_decode($response->getBody());

        return array_map(function ($item) {
            return new Recipe($item->title, $item->href, $item->ingredients, $item->thumbnail);
        }, $response->results);
    }

    /**
     * Send request to rest http client
     * @param array $query
     * @return ResponseInterface
     */
    private function request(array $query): ResponseInterface
    {
        try {

            $response = $this->client->get('', [
                'query' => $query,
            ]);

        } catch (\Exception $exception) {
            throw new \RuntimeException('Internal server error');
        }

        return $response;
    }
}