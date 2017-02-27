<?php
namespace BookShopApp\Entities\Books;

class Gold extends Standard
{

    public function getPrice() : float
    {
        return parent::getPrice()*1.3;

    }

}