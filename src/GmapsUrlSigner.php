<?php

namespace BenTools\GmapsApiSigner;

final class GmapsUrlSigner
{
    /**
     * @var string
     */
    private $secretCode;

    /**
     * GmapsUrlSigner constructor.
     * @param string $apiKey
     * @param string $secretCode
     */
    public function __construct(string $secretCode)
    {
        $this->secretCode = $secretCode;
    }

    /**
     * @param string $url
     * @return string
     */
    public function sign(string $url): string
    {
        $segments = parse_url($url);
        $urlPartToSign = $segments['path'].'?'.$segments['query'];
        // Decode the private key into its binary format
        $decodedKey = base64_decode(str_replace(array('-', '_'), array('+', '/'), $this->secretCode));
        // Create a signature using the private key and the URL-encoded
        // string using HMAC SHA1. This signature will be binary.
        $signature = hash_hmac('sha1', $urlPartToSign, $decodedKey, true);
        $encodedSignature = str_replace(array('+', '/'), array('-', '_'), base64_encode($signature));
        return sprintf('%s&signature=%s', $url, $encodedSignature);
    }

    /**
     * Use as a callable
     *
     * @param string $url
     * @return string
     */
    public function __invoke(string $url): string
    {
        return $this->sign($url);
    }
}
