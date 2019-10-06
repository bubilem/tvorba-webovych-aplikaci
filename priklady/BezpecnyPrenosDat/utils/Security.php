<?php

namespace TWA\BezpecnyPrenosDat\Util;

/**
 * Security util class 
 */
class Security
{

    /**
     * Generate random token
     * 
     * @param int $length length of the token
     * @return string
     */
    public static function generateToken(int $length = 32): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $token = '';
        for ($i = 0; $i < intval($length); $i++) {
            $token .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $token;
    }

    /**
     * Hash sha256
     *
     * @param string|array $data
     * @return string
     */
    public static function hash($data): string
    {
        return hash('sha256', is_array($data) ? implode('', $data) : $data);
    }


    /**
     * Hash conformity test
     *
     * @param string $hash
     * @param string $data
     * @return boolean
     */
    public static function checkHash(string $hash, string $data): bool
    {
        return self::hash($data) == $hash;
    }
}
