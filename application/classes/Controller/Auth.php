<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Base
{
    public function action_login()
    {
        if (Auth::instance()->logged_in()) {
            static::redirect('/');
        }

        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, ['username', 'password', 'remember']);
            $status = Auth::instance()->login($data['username'], $data['password'], !empty($data['remember']));

            if ($status) {
                static::redirect('/');
            } else {
                $errors = [Kohana::message('auth/user', 'no_user')];
            }
        }

        $this->template->jumbotron = '';
        $this->template->bind('errors', $errors);

        $this->template->content = View::factory('auth/login')
            ->bind('data', $data);
    }

    public function action_register()
    {
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, ['username', 'password', 'password_confirm', 'email']);
            $users = ORM::factory('user');

            try {
                $users->create_user(
                    $_POST,
                    [
                        'username',
                        'password',
                        'email',
                    ]
                );

                $role = ORM::factory('role')->where('name', '=', 'login')->find();
                $users->add('roles', $role);
                $this->action_login();
                static::redirect('/');

            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
            }
        }
        $this->template->jumbotron = '';
        $this->template->bind('errors', $errors);

        $this->template->content = View::factory('auth/register')
            ->bind('data', $data);
    }

    public function action_logout()
    {
        if (Auth::instance()->logout()) {
            static::redirect('/');
        }
    }
}