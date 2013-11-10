<?php

namespace Packfire\Octurlpus;

use Packfire\Octurlpus\IProvider;

/**
 * Driver class
 *
 * Generic driver for Octurlpus URL parsing
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
abstract class Provider implements IProvider
{
    /**
     * The current working URL
     * @var string
     * @since 1.0
     */
    protected $url;

    /**
     * Set the current working URL
     * @param string $url The URL to set as the current working URL
     * @since 1.0
     */
    public function set($url)
    {
        $this->url = $url;
    }
}
