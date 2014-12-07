<?php

namespace Web;

class Index extends \Web
{
    public function get()
    {
        $this->render('index.php');
    }

    public function post()
    {
        print_r($this->input->data);
    }
}