<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Front
{
    public function action_login()
    {
        if ($this->auth->logged_in()) {
            $this->goHome();
        }

        if ($this->isSubmit()) {
            $data = Arr::extract($_POST, ['username', 'password', 'remember']);
            $status = Auth::instance()->login($data['username'], $data['password'], !empty($data['remember']));

            if ($status) {
                $this->goHome();
            } else {
                $this->alerts[] = [Kohana::message('auth/user', 'no_user')];
            }
        }

        $this->content = View::factory('auth/login')
            ->bind('data', $data);
    }

    public function action_register()
    {
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
                $this->alerts = array_merge($this->alerts, $e->errors('auth'));
            }
        }

        $this->content = View::factory('auth/register')
            ->bind('data', $data);
    }

    public function action_logout()
    {
        if ($this->auth->logout()) {
            $this->goHome();
        }
    }

    protected function isSubmit(): bool
    {
        return $this->post->rule('submit', 'not_empty')->check();
    }
}