<?php

class SocialController extends BaseController {


    public function getPinterest()
    {
        $url = 'http://www.pinterest.com/wheatwildflower/feed.rss';

        if (($response_xml_data = file_get_contents($url))===false){
            echo "Error fetching XML\n";
            die;
        } else {
            libxml_use_internal_errors(true);
            $data = simplexml_load_string($response_xml_data);
            if (!$data) {
                echo "Error loading XML\n";
                die;
                foreach(libxml_get_errors() as $error) {
                    echo "\t", $error->message;
                }
            } else {
                $json = array();
                $json['imgs'] = array();
                foreach ($data as $channel) {
                    foreach($channel as $pin) {
                        if ((string) $pin->description) {
                            $doc = new DOMDocument();
                            $doc->loadHTML((string)$pin->description[0]);

                            $pinHTML =  $pin->description[0];
                            $img = substr($pinHTML,
                                strpos($pinHTML, "src=") + 5,
                                (strpos($pinHTML, ".jpg") + 5)- (strpos($pinHTML, "src=") + 6));
                            $json['imgs'][] = $img;
                        }
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($json);
                die;
            }
        }
    }

    public function getTwitter()
    {
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

        $consumer_key = "cy6CsRDiMfZ7VVrGQEXSu6XU4";
        $consumer_secret = "t4nqpBIHK9mlFYsreDBO0w3dLiQ5JP6CM47LwuIoUjpzEYcLJm";

        $oauth_access_token = "2217183558-FUhJdxgpswdP2ewjDyZN55TGRKi15LuUTEqRzvi";
        $oauth_access_token_secret = "4NKTHzjgmN97Itm33O4EV06Mi6p2VmdcAOvMBpLb7uH2t";

        $oauth = array(
            'screen_name' => 'WheatWildflower',
            'count' => 2,
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_access_token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0');

        $base_info = $this->buildBaseString($url, 'GET', $oauth);
        $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        // Make requests
        $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
            //CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url . '?screen_name=WheatWildflower&count=2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);
        header('Content-Type: application/json');
        echo $json;
    }

    function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }
}
