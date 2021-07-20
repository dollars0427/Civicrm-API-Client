<?php
namespace CivicrmClient;

class CivicrmClient {
  public function __construct($base_url, $api_key) {
    global $common;
    $this->base_url = $base_url;
    $this->api_key = $api_key;
  }
}
