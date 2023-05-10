<?php
require_once 'SecurityUtils.php';
class SecurityUtilsImpl implements SecurityUtils {

    /**
     * @return string|null
     */
    function generateSalt(): string|null
    {
        try {
            $str = random_bytes(100);
            return md5($str);
        } catch (Exception $e) {
            printf("%s\n", $e->getTraceAsString());
            return null;
        }
    }

    /**
     * @param string $password
     * @param string|null $salt
     * @return string
     */
    function passwordToHash(string $password, string $salt = null): string
    {
        return md5($password);
    }
}