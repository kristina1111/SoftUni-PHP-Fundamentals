<?php
namespace BookShopApp\Entities\Books;


class Standard
{
    protected $title;
    protected $author;
    protected $price;

    /**
     * Book constructor.
     * @param array $authorInfo
     * @param string $title
     * @param float $price
     * @internal param $author
     */
    public function __construct(array $authorInfo, string $title, float $price)
    {
        $this->setAuthor($authorInfo);
        $this->setTitle($title);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws \Exception
     */
    protected function setTitle(string $title)
    {
        if(strlen($title)<=3){
            throw new \Exception("Title not valid!");
        }
        $this->title = $title;

    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param array $authorInfo
     * @internal param string $author
     * @throws \Exception;
     */
    protected function setAuthor(array $authorInfo)
    {
        $this->author['firstName'] = $authorInfo[0];
        if(!is_numeric($authorInfo[1][0])){
            $this->author['lastName'] = $authorInfo[1];
            return;
        }

        throw new \Exception("Author not valid!");

    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @throws \Exception
     */
    protected function setPrice(float $price)
    {
        if($price<0){
            throw new \Exception("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }
}