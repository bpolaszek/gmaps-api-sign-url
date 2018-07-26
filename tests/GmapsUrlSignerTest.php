<?php

namespace BenTools\GmapsApiSigner\Tests;

use BenTools\GmapsApiSigner\GmapsUrlSigner;
use PHPUnit\Framework\TestCase;

class GmapsUrlSignerTest extends TestCase
{

    public function testSign()
    {
        $secretKey = 'nSlpOGNt10hB_FU1-RGfs3tvh0o=';
        $signer = new GmapsUrlSigner($secretKey);
        $url = 'https://maps.googleapis.com/maps/api/js?key=foo_bar';
        $expected = 'https://maps.googleapis.com/maps/api/js?key=foo_bar&signature=Sc3meb0HXImPjMMUiICRtekp3mk=';
        $this->assertEquals($expected, $signer->sign($url));
    }

    public function testAsCallable()
    {
        $secretKey = 'nSlpOGNt10hB_FU1-RGfs3tvh0o=';
        $sign = new GmapsUrlSigner($secretKey);
        $url = 'https://maps.googleapis.com/maps/api/js?key=foo_bar';
        $expected = 'https://maps.googleapis.com/maps/api/js?key=foo_bar&signature=Sc3meb0HXImPjMMUiICRtekp3mk=';
        $this->assertEquals($expected, $sign($url));
    }
}
