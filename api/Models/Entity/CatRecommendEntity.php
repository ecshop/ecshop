<?php

namespace App\Models\Entity;

/**
 * Class CatRecommendEntity
 * @package App\Models\Entity
 */
class CatRecommendEntity
{
    /**
     * @var int 
     */
    private int $id;

    /**
     * @var int 
     */
    private int $cat_id;

    /**
     * @var int 
     */
    private int $recommend_type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value)
    {
        $this->id = $value;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $value
     */
    public function setCatId(int $value)
    {
        $this->cat_id = $value;
    }

    /**
     * @return int
     */
    public function getRecommendType(): int
    {
        return $this->recommend_type;
    }

    /**
     * @param int $value
     */
    public function setRecommendType(int $value)
    {
        $this->recommend_type = $value;
    }

}
