<?php

namespace Packfire\Octurlpus\Drivers\YouTube;

/**
 * Test class for Provider.
 * Generated by PHPUnit on 2012-07-16 at 21:08:48.
 */
class ProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Packfire\Octurlpus\Drivers\YouTube\Provider
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Provider;
    }

    public function testProviderPeek()
    {
        $urls = array(
            'http://www.youtube.com/watch?v=1S6oEDZ66rU&feature=autoplay&list=PL142BA7DCA89DBFB2&playnext=1' => true,
            'http://www.youtube.com/watch?feature=test&v=LBTdJHkAr5A' => true,
            'http://www.youtu.be/LBTdJHkAr5A' => true,
            'http://youtu.be/LBTdJHkAr5A' => true,
            'http://vimeo.com/really?LBTdJHkAr5A' => false,
            'http://www.youtube.com/watch?feature=test&a=LBTdJHkAr5A' => false
        );

        foreach ($urls as $url => $result) {
            $this->object->set($url);
            $this->assertEquals($result, $this->object->peek());
        }
    }

    public function testProviderFetch()
    {
        $this->object->set('http://www.youtube.com/watch?feature=test&v=LBTdJHkAr5A');
        $this->object->peek();
        $data = $this->object->fetch();
        $this->assertNotEmpty($data);
        $this->assertEquals('YouTube', $data['provider_name']);
        $this->assertEquals('1.0', $data['version']);
        $this->assertEquals('video', $data['type']);
    }
}
