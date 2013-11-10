<?php

namespace Packfire\Octurlpus;

use Packfire\Octurlpus\Provider;

/**
 * OEmbedProvider class
 *
 * A provider that supplies oEmbed compatible data
 *
 * @author Sam-Mauris Yong / mauris@hotmail.sg
 * @copyright Copyright (c) 2010-2012, Sam-Mauris Yong
 * @license http://www.opensource.org/licenses/bsd-license New BSD License
 * @package Packfire\Octurlpus
 * @since 1.0
 */
abstract class OEmbedProvider extends Provider
{
    /**
     * Peek into the URL to see if the Provider can handle this URL.
     *
     * @return boolean Returns true if the Provider can handle and fetch data
     *          for the URL, and false otherwise.
     * @since 1.0
     */
    public function peek()
    {
        return $this->match($this->url);
    }

    /**
     * Fetch data from the current working URL
     * @return array Returns the array containing the data
     * @since 1.0
     */
    public function fetch()
    {
        $url = $this->oembed() . '?url=' . urlencode($this->url) . '&format=json&for=packfire/octurlpus';
        $data = self::getData($url);
        return json_decode($data, true);
    }

    /**
     * Get the string data from a URL
     * @param string $url The URL to get data from
     * @return string Returns the string data retrieved
     * @since 1.0
     */
    private static function getData($url)
    {
        $ch = curl_init();
        if (substr($url, 0, 8) == 'https://') {
            curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cacert.pem');
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    /**
     * Check if the URL matches the oEmbed provider's pattern
     * @param string $url The URL to check
     * @return boolean Returns true if the pattern matches, false otherwise.
     * @since 1.0
     */
    abstract protected function match($url);

    /**
     * Get the oEmbed provider endpoint
     * @return string Returns the endpoint URL
     * @since 1.0
     */
    abstract protected function oembed();
}
