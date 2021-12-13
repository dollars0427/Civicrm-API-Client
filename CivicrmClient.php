<?php
namespace Sardo\CivicrmApiClient;

//The client name is temp. Maybe change
class CivicrmClient {
  public function __construct($base_url, $api_key, $site_key) {
    global $common;
    $this->base_url = $base_url;
    $this->api_key = $api_key;
    $this->site_key = $site_key;
  }

/**
 * Get all contact in the CRM or in a group.
 *
 * @param string $group The group of the contacts. Can be optional.
 * @return stdClass $result The result which returned by the API.
 */

  public function getContacts($group = NULL){
    $group_json = json_encode(['group' => $group]);
    $params = [
      'key' => $this->site_key,
      'api_key' => $this->api_key,
      'entity' => 'contact',
      'action' => 'get',
      'json' => $group_json,
    ];

    if(!$group){
      $params['json'] = 1;
    }

    $params_string = http_build_query($params);
    $api_url = "{$this->base_url}?{$params_string}";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $json_result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($json_result);

    return $result;
  }

  /**
   * Search contact in the CRM by given information.
   *
   * @param array $contact_info An array which contains all required contact information.
   * @return stdClass $result The result which returned by the API.
   */

  public function searchContact($contact_info){
    $contact_info_json = json_encode($contact_info);
    $params = [
      'key' => $this->site_key,
      'api_key' => $this->api_key,
      'entity' => 'contact',
      'action' => 'get',
      'json' => $contact_info_json,
    ];
    $params_string = http_build_query($params);
    $api_url = "{$this->base_url}?{$params_string}";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $json_result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($json_result);

    return $result;
  }

  /**
   * Add contact in the CRM by given information.
   *
   * @param array $contact_info An array which contains all required contact information.
   * @return stdClass $result The result which returned by the API.
   */

  public function addContact($contact_info){
    $contact_info_json = json_encode($contact_info);
    $params = [
      'key' => $this->site_key,
      'api_key' => $this->api_key,
      'entity' => 'contact',
      'action' => 'create',
      'json' => $contact_info_json,
    ];

    $params_string = http_build_query($params);
    $api_url = "{$this->base_url}?{$params_string}";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $json_result = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($json_result);

    return $result;
  }

  /**
   * Update contact in the CRM by given id and information.
   *
   * @param int $id Contact id of the target contact.
   * @param array $contact_info An array which contains all required contact information.
   * @return stdClass $result The result which returned by the API.
   */

   public function updateContact($id, $contact_info){
     //Setup the id to contact info.
     $contact_info['id'] = $id;
     $contact_info_json = json_encode($contact_info);
     $params = [
       'key' => $this->site_key,
       'api_key' => $this->api_key,
       'entity' => 'contact',
       'action' => 'create',
       'json' => $contact_info_json,
     ];

     $params_string = http_build_query($params);
     $api_url = "{$this->base_url}?{$params_string}";

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $api_url);
     curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $json_result = curl_exec($curl);
     curl_close($curl);

     $result = json_decode($json_result);

     return $result;
   }

   /**
    * Create event in the CRM by given information.
    *
    * @param array $event_info An array which contains all required event information.
    * @return stdClass $result The result which returned by the API.
    */

   public function createEvent($event_info){
     $event_info_json = json_encode($event_info);
     $params = [
       'key' => $this->site_key,
       'api_key' => $this->api_key,
       'entity' => 'event',
       'action' => 'create',
       'json' => $event_info_json,
     ];

     $params_string = http_build_query($params);
     $api_url = "{$this->base_url}?{$params_string}";

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $api_url);
     curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $json_result = curl_exec($curl);
     curl_close($curl);

     $result = json_decode($json_result);

     return $result;
   }

   /**
    * Search event in the CRM by given information.
    *
    * @param array $event_info An array which contains all required contact information.
    * @return stdClass $result The result which returned by the API.
    */

   public function searchEvent($event_info){
     $event_info_json = json_encode($event_info);
     $params = [
       'key' => $this->site_key,
       'api_key' => $this->api_key,
       'entity' => 'event',
       'action' => 'get',
       'json' => $event_info_json,
     ];
     $params_string = http_build_query($params);
     $api_url = "{$this->base_url}?{$params_string}";

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $api_url);
     curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $json_result = curl_exec($curl);
     curl_close($curl);

     $result = json_decode($json_result);

     return $result;
   }

   /**
    * Update event in the CRM by given id and information.
    *
    * @param int $id Contact id of the target contact.
    * @param array $event_info An array which contains all required contact information.
    * @return stdClass $result The result which returned by the API.
    */

   public function updateEvent($id, $event_info){
     $event_info_json = json_encode($event_info);
     $params = [
       'key' => $this->site_key,
       'api_key' => $this->api_key,
       'entity' => 'event',
       'action' => 'get',
       'json' => $event_info_json,
     ];
     $params_string = http_build_query($params);
     $api_url = "{$this->base_url}?{$params_string}";

     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $api_url);
     curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     $json_result = curl_exec($curl);
     curl_close($curl);

     $result = json_decode($json_result);

     return $result;
   }

   /**
    * Create event participant in the CRM by given id and information.
    *
    * @param int $cid Contact id of the target contact.
    * @param int $eid Event id of the target event.
    * @param array $participant_info An array which contains all required contact information.
    * @return stdClass $result The result which returned by the API.
    */

    public function createParticipant($cid, $eid, $participant_info){
      $participant_info['contact_id'] = $cid;
      $participant_info['event_id'] = $eid;
      $participant_info_json = json_encode($participant_info);
      $params = [
        'key' => $this->site_key,
        'api_key' => $this->api_key,
        'entity' => 'participant',
        'action' => 'create',
        'json' => $participant_info_json,
      ];
      $params_string = http_build_query($params);
      $api_url = "{$this->base_url}?{$params_string}";

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $api_url);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $json_result = curl_exec($curl);
      curl_close($curl);

      $result = json_decode($json_result);

      return $result;
    }
}
