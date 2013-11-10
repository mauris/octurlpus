<?php

namespace Packfire\Octurlpus\Drivers\CollegeHumor;

use Packfire\Octurlpus\OEmbedProvider as OcturlpusProvider;

/**
 * Provider class
 *
 * Providing Driver for CollegeHumor URLs
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus\Drivers\CollegeHumor
 * @since 1.0
 */
class Provider extends OcturlpusProvider
{
    protected function match($url)
    {
        return (bool)preg_match('`^http://(www\.)*collegehumor\.com/video/\S+$`is', $url);
    }

    protected function oembed()
    {
        return 'http://www.collegehumor.com/oembed.json';
    }
}
