<?php
class token {

    private $key, $iv;

    function __construct( $pass ) {
        $this->key = hash( 'sha256', $pass, true );
        $this->iv = mcrypt_create_iv(32);
    }

    function encrypt( $input ) {
        return urlencode( base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $this->key, $input, MCRYPT_MODE_ECB, $this->iv ) ) );
    }

    function decrypt( $input ) {
        return mcrypt_decrypt( MCRYPT_RIJNDAEL_256, $this->key, base64_decode( urldecode( $input ) ), MCRYPT_MODE_ECB, $this->iv );
    }

}


$cipher = new token( 'SDFL2li342#@$f;;aso8f;ahf;akdhj3sfl_' );
$encrypted = $cipher->encrypt( 'mohammad KASSAB' );
$decrypted = $cipher->decrypt( $encrypted );

echo "Encrypted string: $encrypted<hr>";
echo "Decrypted string: $decrypted";
?>