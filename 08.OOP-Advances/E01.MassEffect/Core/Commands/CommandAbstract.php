<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 12:32 ч.
 */

namespace Core\Commands;

use Core\Commands\Executable;
use Entities\Galaxy\GalaxyInterface;

abstract class CommandAbstract implements Executable
{
    /** @var  GalaxyInterface */
    protected $galaxy;

    public function __construct(GalaxyInterface $galaxy)
    {
        $this->galaxy = $galaxy;
    }

    public function getGalaxy(): GalaxyInterface{
        return $this->galaxy;
    }
}