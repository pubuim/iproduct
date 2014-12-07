<?php

namespace Web;

class UI extends \Web
{
    public function get()
    {
        $this->render('ui.php');
    }

    /**
     * Override before to disable DB loading
     */
    protected function before()
    {
    }
}