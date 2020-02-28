<?php

abstract class Controller_Front extends Controller_App
{
    /**
     * @var View page template
     */
    public $template = 'index';

    /**
     * @var string
     */
    public $title = 'EPayments';

    /**
     * @var View controller-generated output
     */
    public $content;

    /**
     * @var  boolean  auto render template
     **/
    public $auto_render = TRUE;

    /**
     * @var Validation object of _POST
     */
    public $post;

    /**
     * @var array
     */
    public $alerts;

    /**
     * @var array
     */
    public $styles;

    /**
     * @var array
     */
    public $scripts;

    /**
     * Loads the template [View] object.
     */
    public function before()
    {
        parent::before();

        if ($this->auto_render === TRUE)
        {
            View::set_global('user', $this->user);

            // Load the template
            $this->template = View::factory($this->template);
            $this->post = Validation::factory($_POST);

            $common = Kohana::$config->load('page')->get(true);
            $this->styles = Arr::get($common, 'styles', []);
            $this->scripts = Arr::get($common, 'scripts', []);
            $this->alerts = ['Some error events', 'oqwirfoqewroi00', 'oqwiufoiqrfr'];
        }
    }

    /**
     * Assigns the template [View] as the request response.
     */
    public function after()
    {
        if ($this->auto_render === TRUE)
        {
            $this->template->set(
                [
                    'title' => $this->title,
                    'menu' => View::factory('menu')->render(),
                    'post' => $this->post,
                    'alerts' => View::factory('alerts', ['alerts' => $this->alerts])->render(),
                    'styles' => View::factory('styles', ['styles' => $this->styles])->render(),
                    'scripts' => View::factory('scripts', ['scripts' => $this->scripts])->render(),
                    'footer' => View::factory('footer')->render(),
                ]
            );

            if ($this->request->is_initial() && !$this->request->is_ajax()) {
                $this->template->bind('content', $this->content);
                $this->response->body($this->template->render());
            } else {
                $this->response->body($this->content);
            }
        }

        parent::after();
    }

}