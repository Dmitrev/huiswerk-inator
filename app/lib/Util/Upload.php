<?php
namespace Util;

use Mockery\CountValidator\Exception;

class Upload{

    private $api_key;
    private $options = array(
        "image" => null
    );
    private $endpoint;

    public function __construct()
    {
        $this->setupApi();
    }

    public function setupApi()
    {
        if( !array_key_exists('IMGUR_CLIENT_ID', $_ENV) ) {
            throw new Exception('Imgur Client ID missing! does not work');
        }

        $this->api_key = $_ENV['IMGUR_CLIENT_ID'];
    }

    public function setImageBase64( $string )
    {
        $this->options['image'] = $string;
    }

    public function setFile( $file ){

        $cfile = new \CURLFile(
            $file->getRealPath(),
            $file->getMimeType(),
            $file->getClientOriginalName()
        );

        $this->options['image'] = $cfile;
    }

    public function upload(){
        $this->endpoint = "https://api.imgur.com/3/upload";

        return $this->request();
    }

    public function request()
    {
        $headers = array('Authorization: CLIENT-ID ' . $this->api_key);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($this->options) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->options);
        }
        if (($data = curl_exec($ch)) === FALSE) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        return json_decode($data, true);
    }


}