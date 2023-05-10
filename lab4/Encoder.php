<?php
class Encoder {

    private $algorithm;
    private $plainText;
    private $key;

    public function __construct(string $plainText, string $key, string $algorithm = "AES-192-CBC") {
        $this->algorithm = $algorithm;
        $this->plainText = $plainText;
        $this->key = $key;
    }

    public function encrypt(): string {
        return openssl_encrypt(
            $this->plainText,
            $this->algorithm,
            $this->key
        );
    }

    public function decrypt(): string {
        return openssl_decrypt(
            $this->plainText,
            $this->algorithm,
            $this->key
        );
    }
}
