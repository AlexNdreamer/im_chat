<?php
/**
 * @Descript
 * Auth.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/27/0027 17:31
 */

namespace app\model;


use Lcobucci\JWT\Builder,
    Lcobucci\JWT\Parser,
    Lcobucci\JWT\Signer\Hmac\Sha256,
    app\model\User as User
;

class Auth
{

    private static $secret = 'sd5f1@afeDR27se^!Gx';

    public static function login ($username, $password)
    {
        $user = User::where('username', $username)->field('password')->findOrEmpty();

        if (!$user) {
            return false;
        }

        return password_verify($password, $user->password);
    }

    //颁发TOKEN
    public static function createToken()
    {

        $signer = new Sha256();
        $now = time();
        $token = (new Builder())
            // Configures the issuer (iss claim)
            //->issuedBy('http://example.com')
            // Configures the audience (aud claim)
            //->permittedFor('http://example.org')
            // Configures the id (jti claim)
            ->setId('im_chat', true)
            // Configures the time that the token was issue (iat claim)
            ->issuedAt($now)
            // Configures the time that the token can be used (nbf claim)
            //->canOnlyBeUsedAfter($now->modify('+1 minute'))
            // Configures the expiration time of the token (exp claim)
            ->expiresAt($now + 86400)
            // Configures a new claim, called "uid"
            // ->withClaim('uid', 1)
            // Configures a new header, called "foo"
            //->withHeader('foo', 'bar')
            // Builds a new token
            ->sign($signer, self::$secret)
            ->getToken();

        return $token;
    }

    /**
     * @Descript 验证token
     * @Filename authToken
     * @Author: Mr_dreamer
     * @param $token
     * @return bool
     */
    public static function authToken($token)
    {
        $parse = (new Parser())->parse((string) $token);
        $signer = new Sha256();
        return $parse->verify($signer, self::$secret);// 验证成功返回true 失败false
    }
}