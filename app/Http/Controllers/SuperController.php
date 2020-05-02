<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

class SuperController extends Controller
{
    /**
     * Имя шаблона макета
     * @var string
     */
    protected $layout;

    /**
     * Заголовок страницы.
     * @var string
     */
    protected $title;

    /**
     * Массив переменных, которые передаются в шаблон.
     * @var array
     */
    protected $vars;

    /**
     * Контент отображаемого вида.
     * @var string
     */
    protected $content = '';

    public function __construct()
    {
    }

    /**
     * Сгенерировать вид
     * @return type
     */
    public function renderOutput()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);

        // передать в шаблон контентной части
        if ($this->content) {
            $this->vars = Arr::add($this->vars, 'content', $this->content);
        }

        return view($this->layout)->with($this->vars);
    }
}
