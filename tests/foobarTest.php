<?php

require_once S9Y_INCLUDE_PATH . 'tests/plugins/PluginTest.php';
require_once S9Y_INCLUDE_PATH . 'plugins/serendipity_event_foobar/serendipity_event_foobar.php';

/**
 *
 */
class serendipity_event_foobarTest extends PluginTest
{
    /**
     * @var serendipity_event_foobar
     */
    protected $object;

    /**
     * @var serendipity_property_bag
     */
    protected $propBag;

    /**
     * @var array
     */
    protected $eventData;

    /**
     * Set up
     */
    public function setUp()
    {
        parent::setUp();
        $this->object = new serendipity_event_foobar('test');
        $this->propBag = new serendipity_property_bag();
        $this->getEventData();
    }

    /**
     * Tear down
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Helper method
     */
    protected function getEventData()
    {
        $this->eventData = array(
            'id' => 1,
            'body' => 'Normal body.',
            'extended' => 'Extended body.',
        );
    }

    /**
     * Example 1
     */
    public function testIntrospect()
    {
        $this->object->introspect($this->propBag);
        $this->assertEquals('1.0', $this->propBag->get('version'));
        $this->assertFalse($this->propBag->get('stackable'));
    }

    /**
     * Example 2
     */
    public function testGenerateContent()
    {
        $title = 'foobar'; // we need to pass this by reference
        $this->object->generate_content($title);
        $this->assertEquals('Foobar', $title);
    }

    /**
     * Example 3
     */
    public function testFrontendComment()
    {
        $this->object->introspect($this->propBag);
        $this->object->event_hook('frontend_comment', $this->propBag, $this->eventData);
        $this->expectOutputString('<div>test</div>');
    }

    /**
     * Example 4
     */
    public function testBackendSave()
    {
        $this->object->introspect($this->propBag);
        $this->object->set_config('setting_foobar', 1);
        $result = $this->object->event_hook('backend_save', $this->propBag, $this->eventData);
        $this->assertTrue($result);
    }
}
