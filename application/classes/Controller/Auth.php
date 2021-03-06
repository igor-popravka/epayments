<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Page {
    public function action_login () {
        if ($this->auth->logged_in()) {
            $this->goHome();
        }

        if ($this->isSubmit()) {
            $data = Arr::extract($_POST, ['username', 'password', 'remember']);
            try {
                $status = Auth::instance()->login($data['username'], $data['password'], !empty($data['remember']));

                if ($status) {
                    $this->goHome();
                } else {
                    $this->alertError('Wrong username or password');
                }
            } catch (\Exception $e) {
                $this->alertError($e->getMessage());
            }
        }

        $this->page->content(
            View::factory('auth/login')->bind('data', $data)
        );
    }

    public function action_register () {
        if ($this->isSubmit()) {
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
                $this->goHome();
            } catch (ORM_Validation_Exception $e) {
                $this->alertError($e->errors('auth'));
            }
        }

        $this->page->content(
            View::factory('auth/register')->bind('data', $data)
        );
    }

    public function action_logout () {
        if ($this->auth->logout()) {
            $this->goHome();
        }
    }
}