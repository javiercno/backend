<?php

namespace App\Domain\Recipe;

class Recipe
{

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $href;
    /**
     * @var array
     */
    private $ingredients;
    /**
     * @var string
     */
    private $thumbnail;


    /**
     * Recipe constructor.
     * @param string $title
     * @param string $href
     * @param string $ingredients
     * @param string $thumbnail
     */
    public function __construct(string $title, string $href, string $ingredients, string $thumbnail)
    {
        $this->title = $title;
        $this->href = $href;
        $this->ingredients = \explode(', ', $ingredients);
        $this->thumbnail = $thumbnail;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

}