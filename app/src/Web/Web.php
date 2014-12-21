<?php

namespace Web;

use Model\User;
use Pagon\Route\Rest;
use Pagon\Url;
use Pagon\View;

class Web extends Rest
{
    protected $_tpl_layout = 'layout.php';
    protected $_tpl = '';

    protected $login;
    protected $config = array('config' => null);
    protected $title = 'iProduct';

    /**
     * Before
     */
    protected function before()
    {
        $this->loadOrm();

        // Auto login
        if ($loginId = $this->input->session('login')) {
            $this->login = User::dispense()->find_one($loginId);
        }
    }

    /**
     * After
     */
    protected function after()
    {
        if (!$this->app->output->body && $this->_tpl) {
            $this->render($this->_tpl);
        }
    }

    /**
     * Disable layout
     */
    protected function disableLayout()
    {
        $this->_tpl_layout = false;
    }

    /**
     * Show error message
     *
     * @param $message
     */
    protected function error($message)
    {
        $this->render('error.php', array('message' => $message));
        $this->output->end();
    }

    /**
     * Login id
     *
     * @param $id
     */
    protected function login($id)
    {
        $this->input->session('login', $id);
        $this->redirect('/');
        $this->output->end();
    }

    /**
     * Render template
     *
     * @param string $tpl
     * @param array  $scope
     */
    protected function render($tpl, array $scope = array())
    {
        $body = new View(
            $tpl,
            get_object_vars($this) + $this->app->locals + $scope,
            array('dir' => $this->app->views)
        );

        if ($this->_tpl_layout) {
            $this->app->render($this->_tpl_layout, array('body' => $body->render()) + get_object_vars($this));
        } else {
            $this->output->body($body->render());
        }
    }

    /**
     * Load ORM and database
     */
    protected function loadOrm()
    {
        $this->app->loadOrm();
    }

    /**
     * Redirect the page
     *
     * @param $uri
     */
    protected function redirect($uri)
    {
        $this->output->redirect(Url::to($uri))->end();
    }
}