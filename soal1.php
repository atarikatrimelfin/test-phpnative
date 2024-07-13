<?php
$tokens = [];

/**
 * @param string $user
 * @return string
 */


function generate_token($user){
    global $tokens;

    $token = bin2hex(random_bytes(16));
    if (!isset($tokens[$user])){
        $tokens[$user] = [];
    }

    array_push($tokens[$user], $token);
    if(count($tokens[$user])>10){
        array_shift($tokens[$user]);
    }
    return $token;
}

/**
 * @param string $user
 * @param string $token
 * @return bool
 */

 function verify_token($user, $token){
    global $tokens;

    if (isset($tokens[$user])){
        $key = array_search($token, $tokens[$user]);

        if ($key !== false){
            unset($tokens[$user][$key]);
            $tokens[$user] = array_values($tokens[$user]);
            return true;
        }
    }
    return false;
 }


 // penggunaan
$user = 'Atarika';
$newToken = generate_token($user);
echo "Generated Token: ".$newToken.PHP_EOL;

$isVerified = verify_token($user, $newToken);
echo "Token Verified: ".($isVerified ? 'true' : 'false') .PHP_EOL;

$isVerified = verify_token($user, $newToken);
echo "Token Verified Again: ".($isVerified ? 'true' : 'false') .PHP_EOL;

?>