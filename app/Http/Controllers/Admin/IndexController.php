<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SuperController;

class IndexController extends SuperController
{
    public function __construct()
    {
        parent::__construct();
        $this->title = 'Администрирование';
        $this->layout = "route.main";
    }

    public function index()
    {
        $this->content = view('admin')->render();
        return $this->renderOutput();
    }
}
