<?php

namespace App\Http\Controllers\Admin;

use App\Group;
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
        $groups = Group::all();

        foreach ($groups as $group) {
            $this->propsData['groups'][] =
                [
                'id' => $group->id,
                'name' => $group->name,
            ];
        }

        $this->content = view('admin', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
    }
}
