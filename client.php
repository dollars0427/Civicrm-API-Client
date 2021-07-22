<?php
namespace CivicrmClient;

class CivicrmClient {
  public function __construct($base_url, $api_key, $site_key) {
    global $common;
    $this->base_url = $base_url;
    $this->api_key = $api_key;
    $this->site_key = $site_key;
  }
  public function getContact($group = NULL){
    $params = [
      'key' => $this->site_key,
      'api_key' => $this->api_key,
      'entity' => 'contact',
      'action' => 'get',
      'json' => 1,
    ];
    $params_string = http_build_query($params);
    $api_url = "{$this->base_url}?{$params_string}";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $json_result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($json_result);

    return $result;
  }
}
