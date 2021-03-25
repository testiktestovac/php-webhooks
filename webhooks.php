<?php

class webhook
{
    function __construct($url)
    {
        $this->url = $url;
        $this->data = array();
        $this->data["embeds"] = array();
    }

    function set_content($content)
    {
        $this->data["content"] =  $content;
    }

    function set_embed($title, $description, $color)
    {
        array_push($this->data["embeds"], ["title" => $title, "description" => $description, "color" => $color]);
        $this->data["embeds"][count($this->data["embeds"])-1]["fields"] = array();
    }

    function embed_field($embed, $name, $value)
    {
        array_push($this->data["embeds"][$embed]["fields"], ["name" => $name, "value" => $value]);
    }

    function send()
    {
        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($this->data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );
    }
}

?>
