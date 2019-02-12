<?php

namespace App\Domain\Recipe;

class RecipeResource
{

    /**
     * @var Recipe
     */
    private $recipe;

    /**
     * Recipe constructor.
     * @param Recipe $recipe
     */
    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @return array|mixed
     */
    public function toJson()
    {
        return [
            'title' => $this->recipe->getTitle(),
            'href' => $this->recipe->getHref(),
            'ingredients' => $this->recipe->getIngredients(),
            'thumbnail' => $this->recipe->getThumbnail(),
        ];
    }

}