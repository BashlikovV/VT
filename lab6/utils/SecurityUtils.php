<?php
interface SecurityUtils {

    function generateSalt();

    function passwordToHash(string $password, string $salt);
}