<?php

namespace Packfire\Octurlpus;

use Packfire\Octurlpus\Octurlpus;

/**
 * Test class for Octurlpus.
 * Generated by PHPUnit on 2012-07-16 at 20:06:50.
 */
class OcturlpusTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Octurlpus
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Octurlpus;
    }

    public function testType()
    {
        $this->assertEquals('YouTube', $this->object->type('http://www.youtube.com/watch?v=n0slRE1-g1Q&feature=autoplay&list=PLB6B81734AD119922&playnext=1&shuffle=557660'));
        $this->assertEquals('YouTube', $this->object->type('http://youtu.be/n0slRE1-g1Q'));
        $this->assertNull($this->object->type('example.com'));
    }

    public function testRequest()
    {
        $data = $this->object->request('http://youtu.be/n0slRE1-g1Q');
        $this->assertNotEmpty($data);
        $this->assertEquals('YouTube', $data['provider_name']);
        $this->assertEquals('1.0', $data['version']);
        $this->assertEquals('video', $data['type']);
    }

    public function testRequestNull()
    {
        $data = $this->object->request('http://google.com');
        $this->assertNull($data);
    }
}
