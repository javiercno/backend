<?php

namespace App\Controller;

use App\Aplication\Recipe\GetRecipes;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecipeController
{
    /**
     * @var GetRecipes
     */
    private $getRecipes;

    /**
     * RecipeController constructor.
     * @param GetRecipes $getRecipes
     */
    public function __construct(GetRecipes $getRecipes)
    {
        $this->getRecipes = $getRecipes;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {

            return new JsonResponse([
                'status' => 'ok',
                'data' => $this->getRecipes->getRecipes($this->getQueryFromRequest($request)),
            ]);

        } catch (\Exception $exception) {
            return new JsonResponse([
                'status' => 'error',
                'errors' => [
                    $exception->getMessage(),
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getQueryFromRequest(Request $request): array
    {
        return [
            'q' => $request->query->get('q'),
            'i' => $request->query->get('i'),
            'page' => $request->query->getInt('page', 1),
        ];
    }
}                                       