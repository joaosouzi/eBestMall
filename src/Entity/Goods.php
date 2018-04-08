<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GoodsRepository")
 * @ORM\Table(name="goods")
 */
class Goods
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $goods_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $goods_name;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $goods_price;

    /**
     * @ORM\Column(nullable=true)
     * @ORM\Column(type="text")
     */
    private $goods_description;

    public function getId()
    {
        return $this->id;
    }
}
