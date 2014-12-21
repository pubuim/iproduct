<?php

namespace Api;

class PostUrlCheck extends Api
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

        $_payload = $this->scrapePage($url);

        preg_match('/<title>(.+?)<\/title>/i', $_payload, $title_matches);
        preg_match('/<meta name="description" content="(.*)"/i', $_payload, $description_matches);

        $this->data['title'] = trim($title_matches[1]);
        $this->data['content'] = trim($description_matches[1]);
    }

    /**
     * Scrape page with read limit size socket
     *
     * @param $url
     * @return string
     */
    private function scrapePage($url)
    {
        $urlParts = parse_url(trim($url));
        if (!$urlParts['path']) $urlParts['path'] = '/';

        $fp = fsockopen($urlParts['host'], $urlParts['scheme'] === 'https' ? '443' : '80', $errNo, $errStr, 30);
        $_payload = '';

        if (!$fp) {
            $this->error('Scrape error');
        } else {
            $out = "GET {$urlParts['path']} HTTP/1.1\r\n";
            $out .= "Host: {$urlParts['host']}\r\n";
            $out .= "Connection: Close\r\n\r\n";
            fwrite($fp, $out);
            while (!feof($fp) && strlen($_payload) < 3096) {
                $_payload .= fgets($fp, 1024);
            }
            fclose($fp);
        }

        preg_match('/Location: (.+)/i', $_payload, $redirect_matches);
        if ($redirect_matches[1]) {
            return $this->scrapePage($redirect_matches[1]);
        }

        return $_payload;
    }
}