<?php

$length = floatval(trim(fgets(STDIN)));
$width = floatval(trim(fgets(STDIN)));
$height = floatval(trim(fgets(STDIN)));

try{
    $box = new Box($length, $width, $height);
    echo $box;
}catch (Exception $e){
    echo $e->getMessage();
}

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @throws Exception If length is equal to or less than zero
     */
    private function setLength(float $length)
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        }
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @throws Exception If width is equal to or less than zero
     */
    private function setWidth(float $width)
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        }
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @throws Exception If height is equal to or less than zero
     */
    private function setHeight(float $height)
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        }
        $this->height = $height;
    }

    public function getVolume(): float
    {
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    public function getLateralSurfaceArea(): float
    {
        return 2 * $this->getLength() * $this->getHeight() + 2 * $this->getWidth() * $this->getHeight();
    }

    public function getSurfaceArea()
    {
        return 2 * $this->getLength() * $this->getWidth() + 2 * $this->getLength() * $this->getHeight() + 2 * $this->getWidth() * $this->getHeight();
    }

    public function __toString()
    {
        $output = "Surface Area - ";
        $output .= number_format($this->getSurfaceArea(), 2,  '.', '') . PHP_EOL;
        $output .= "Lateral Surface Area - ";
        $output .= number_format($this->getLateralSurfaceArea(), 2,  '.', '') . PHP_EOL;
        $output .= "Volume - ";
        $output .= number_format($this->getVolume(), 2, '.', '');
        return $output;
    }

}