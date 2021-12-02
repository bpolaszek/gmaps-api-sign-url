<?php

namespace BenTools\GmapsApiSigner;

final class GmapsUrlSigner
{
    private $secretCode;

    public function __construct(string $secretCode)
    {
        $this->secretCode = $secretCode;
    }

    public function sign(string $url): string
    {
        $segments = parse_url($url);
        $urlPartToSign = $segments['path'].'?'.$segments['query'];

        // Decode the private key into its binary format
        $decodedKey = base64_decode(str_replace(['-', '_'], ['+', '/'], $this->secretCode));

        // Create a signature using the private key and the URL-encoded
        // string using HMAC SHA1. This signature will be binary.
        $signature = hash_hmac('sha1', $urlPartToSign, $decodedKey, true);

        $encodedSignature = str_replace(['+', '/'], ['-', '_'], base64_encode($signature));

        return sprintf('%s&signature=%s', $url, urlencode($encodedSignature));
    }

    public function __invoke(string $url): string
    {
        return $this->sign($url);
    }
}
