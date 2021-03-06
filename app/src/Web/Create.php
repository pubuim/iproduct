<?php

namespace Web;

use Model;

class Create extends Web
{
    public function get()
    {
        $this->render('create.php');
    }

    public function post()
    {
        $data = $this->input->data;

        $post = Model\Post::dispense()
            ->create(array('user_id' => $this->login->id) + $data);

        $post->save();

        $this->redirect('/posts/' . $post->id);
    }
}