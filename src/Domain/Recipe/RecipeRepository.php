<?php

namespace App\Domain\Recipe;

interface RecipeRepository
{
    public function getRecipes(array $query): array;
}