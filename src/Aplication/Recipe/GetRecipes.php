<?php

namespace App\Aplication\Recipe;

use App\Domain\Recipe\Recipe;
use App\Domain\Recipe\RecipeRepository;
use App\Domain\Recipe\RecipeResource;

class GetRecipes
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * GetRecipes constructor.
     * @param RecipeRepository $recipeRepository
     */
    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param array $query
     * @return array
     */
    public function getRecipes(array $query): array
    {

        $recipes = $this->recipeRepository->getRecipes($query);

        return array_map(function(Recipe $recipe) {
            return (new RecipeResource($recipe))->toJSON();
        }, $recipes);
    }

}