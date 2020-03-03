<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Page extends Controller_App
{
    /**
     * @var Page
     */
    public $page;

    /**
     * @var Validation object of _POST
     */
    public $post;

    /**
     * Loads the template [View] object.
     */
    public function before()
    {
        parent::before();

        View::set_global('user', $this->user);

        $this->post = Validation::factory($_POST);
        $this->page = new Page($this->request->controller());
    }

    /**
     * Assigns the template [View] as the request response.
     */
    public function after()
    {
        if ($this->request->is_initial() && !$this->request->is_ajax()) {
            $this->response->body($this->page->render());
        }

        parent::after();
    }

    public function alertSuccess ($message) {
        $this->alert($message, 'success');
    }

    public function alertError ($message) {
        $this->alert($message, 'danger');
    }

    public function alertWarning ($message) {
        $this->alert($message, 'warning');
    }

    public function alertInfo ($message) {
        $this->alert($message, 'info');
    }

    protected function isSubmit (): bool {
        return $this->post->rule('submit', 'not_empty')->check();
    }

    private function alert ($message, string $type) {
        if (is_string($message)) {
            $message = [$message];
        } elseif (!is_array($message)) {
            return;
        }

        foreach ($message as $value) {
            $this->page->alert(HTML::block($value, ['class' => 'alert alert-' . $type, 'role' => 'alert']));
        }
    }
}