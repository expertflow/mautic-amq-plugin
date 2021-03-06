<?php
/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * 
 */

namespace MauticPlugin\MauticActivemqTransportBundle\Tests\Message;

use MauticPlugin\MauticActivemqTransportBundle\Message\AbstractMessage;
use MauticPlugin\MauticActivemqTransportBundle\Message\MtMessage;

class MtMessageTest extends \PHPUnit\Framework\TestCase
{
    /** @var MtMessage */
    private $message;

    protected function setUp(): void
    {
        $this->message = new MtMessage('test-message');
        $this->message->setContent('restistance is futile');
        $this->message->setPartnerPassword('borg');

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testGetSerializable()
    {
        $serializable = $this->message->getSerializable();
        $this->assertArrayHasKey('content', $serializable);
    }

    public function testGetXML()
    {
        $xml = simplexml_load_string($this->message->getXML());

        $this->assertNotFalse($xml);

        $this->assertEquals($xml->content, $this->message->getContent());
        $this->assertEquals((string) $xml->{AbstractMessage::PASSWORD_ELEMENT}, 'borg');
    }

    public function testGetSanitizedArray()
    {
        $this->assertArrayNotHasKey(MtMessage::PASSWORD_ELEMENT, $this->message->getSanitizedArray());
    }

    public function testSpecialCharactersAreEncoded()
    {
        $content = "<Check out> Sally & Mike's \"puppy\"";
        $this->message->setContent($content);
        $this->assertEquals('&lt;Check out&gt; Sally &amp; Mike&apos;s &quot;puppy&quot;', $this->message->getContent());
    }
}
