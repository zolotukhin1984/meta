<?php

namespace App\Model;

class BookCategoryListItem
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $slug;

    /**
     * @param int $id
     * @param string $title
     * @param string $slug
     */
    public function __construct(int $id, string $title, string $slug)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
