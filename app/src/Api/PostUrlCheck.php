<?php

namespace Api;

class PostUrlCheck extends \Api
{
    /**
     * GET /
     */
    public function get()
    {
        $url = $this->input->query['url'];

        if (!$url) {
            $this->error('Params "url" required');
        }

        $opts = array(
            'http' => array(
                'timeout' => 5
            )
        );

        $context = stream_context_create($opts);
        $payload = file_get_contents($url, false, $context);

        preg_match('/<title>([^<]+)<\/title>/i', $payload, $title_matches);
        preg_match('/<meta name="description" content="(.*)" \/> /i', $payload, $description_matches);

        $this->data['title'] = $title_matches[1];
        $this->data['content'] = $description_matches[1];
    }
}