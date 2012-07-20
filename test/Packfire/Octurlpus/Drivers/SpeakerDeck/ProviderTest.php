<?php

namespace Packfire\Octurlpus\Drivers\SpeakerDeck;

/**
 * Test class for Provider.
 * Generated by PHPUnit on 2012-07-16 at 21:08:48.
 */
class ProviderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Packfire\Octurlpus\Drivers\SpeakerDeck\Provider
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Provider;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    
    /**
     * @covers Provider::peek
     */
    public function testProviderPeek(){
        $urls = array(
            'https://speakerdeck.com/u/mauris/p/rapid-api-development-with-packfire-framework' => true,
            'http://speakerdeck.com/u/mauris/p/rapid-api-development-with-packfire-framework' => true,
            'https://www.speakerdeck.com/u/mauris/p/rapid-api-development-with-packfire-framework' => true,
            'https://speakerdeck.com/u/edds/p/what-the-flash-photography-introduction' => true,
            'http://www.youtube.com/really?LBTdJHkAr5A' => false,
            'http://example.com' => false
        );
        
        foreach($urls as $url => $result){
            $this->object->set($url);
            $this->assertEquals($result, $this->object->peek());
        }
    }
    
    /**
     * @covers Provider::fetch
     */
    public function testProviderFetch(){
        $this->object->set('https://speakerdeck.com/u/mauris/p/rapid-api-development-with-packfire-framework');
        $this->object->peek();
        $data = $this->object->fetch();
        $this->assertNotEmpty($data);
        $this->assertEquals('Speaker Deck', $data['provider_name']);
        $this->assertEquals('1.0', $data['version']);
        $this->assertEquals('rich', $data['type']);
    }

}