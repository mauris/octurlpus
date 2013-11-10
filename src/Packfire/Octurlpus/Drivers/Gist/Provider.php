<?php

namespace Packfire\Octurlpus\Drivers\Gist;

use Packfire\Octurlpus\Provider as OcturlpusProvider;

/**
 * Provider class
 *
 * Providing Driver for Github Gist URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\Gist
 * @since 1.0
 */
class Provider extends OcturlpusProvider
{
    /**
     * Determine if the Gist is secured (using HTTPS)
     * @var boolean
     * @since 1.0
     */
    private $secure = false;

    /**
     * The Gist ID
     * @var integer
     * @since 1.0
     */
    private $id;

    /**
     * Peek into the URL to see if the Provider can handle this URL.
     *
     * @return boolean Returns true if the Provider can handle and fetch data
     *          for the URL, and false otherwise.
     * @since 1.0
     */
    public function peek()
    {
        $matches = array();
        $i = preg_match(
            '`^http([s]{0,1})://gist.github.com/([0-9]+)(/[a-f0-9]+)*$`is',
            $this->url,
            $matches
        );
        if ($i) {
            if ($matches[1]) {
                $this->secure = true;
            }
            $this->id = (int)$matches[2];
        }
        return (bool)$i;
    }

    /**
     * Fetch data from the current working URL
     * @return array Returns the array containing the data
     * @since 1.0
     */
    public function fetch()
    {
        return array(
            'provider_name' => 'Github Gist',
            'provider_url' => 'https://gist.github.com/',
            'type' => 'link',
            'version' => '1.0',
            'title' => $this->id,
            'html' => '<script type="text/javascript" src="http'
                        . ($this->secure ? 's' : '') . '://gist.github.com/'
                        . $this->id . '.js"></script>'
        );
    }
}
