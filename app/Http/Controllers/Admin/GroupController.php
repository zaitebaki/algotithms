<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\SuperController;
use Illuminate\Http\Request;
use Validator;

class GroupController extends SuperController
{
    private $propsData = [];

    public function __construct()
    {
        parent::__construct();
        $this->title = 'Добавить группу';
        $this->layout = "route.main";
    }

    /**
     * Отправить страницу "Добавить группу"
     * Обработать GET-запрос /add-group
     */
    public function index()
    {
        if (session()->has('errors')) {
            $this->propsData['errors'] = session('errors');
        }

        if (session()->has('status')) {
            $this->propsData['status'] = session('status');
        }

        $this->propsData['addGroupRoute'] = route('addGroup');

        $this->content = view('add-group-page', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
    }

    /**
     * Добавить новую группу
     * Обработать POST-запрос /add-group
     */
    public function addGroup(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nameGroup' => 'bail|required|alpha_num|max:255',
        ]);

        if ($validator->fails()) {
            $sessionErrors = [];
            $errors = $validator->errors()->messages();
            foreach ($errors as $error) {
                foreach ($error as $key => $value) {
                    $sessionErrors[] = $value;
                }
            }

            session()->flash('errors', $sessionErrors);
            return redirect()->route('groupPageIndex');
        }

        $group = new Group;
        $group->name = $data['nameGroup'];
        $group->save();

        session()->flash('status', 'Группа успешно добавлена!');

        return redirect()->route('groupPageIndex');
    }
}
