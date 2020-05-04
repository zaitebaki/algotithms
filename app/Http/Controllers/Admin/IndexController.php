<?php

namespace App\Http\Controllers\Admin;

use App\Algorithm;
use App\Group;
use App\Http\Controllers\SuperController;
use App\Services\GithubApi;
use Illuminate\Http\Request;
use Validator;

class IndexController extends SuperController
{
    private $propsData = [];

    public function __construct()
    {
        parent::__construct();
        $this->title = 'Администрирование';
        $this->layout = "route.main";
    }

    /**
     *
     */
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

        $this->propsData['addGroupRoute'] = route('addGroup');
        $this->propsData['addAlgorithmRoute'] = route('addAlgorithm');

        if (session()->has('errors')) {
            $this->propsData['errors'] = session('errors');
        }
        if (session()->has('status')) {
            $this->propsData['status'] = session('status');
        }

        $this->content = view('admin', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
    }

    public function addGroup(Request $request)
    {
        return redirect()->route('adminPage');
    }

    /**
     * Добавить новый алгоритм
     * @param Request $request
     *
     * @return int
     */
    public function addAlgorithm(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'groupId' => 'bail|required|exists:App\Group,id',
            'nameAlgorithm' => 'bail|required|max:255',
            'codeTextArea' => 'bail|required|max:2000',
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
            return redirect()->route('adminPage');
        }

        $groupId = $data['groupId'];
        $nameAlgorithm = $data['nameAlgorithm'];
        $codeTextArea = $data['codeTextArea'];

        $markdown = GithubApi::getMarkdown($codeTextArea);

        if ($markdown !== null) {
            $algorithm = new Algorithm;
            $algorithm->name = $nameAlgorithm;
            $algorithm->code = $markdown;

            $group = Group::find((int) $groupId);
            $algorithm->group()->associate($group);
            $algorithm->save();

            session()->flash('status', 'Алгоритм успешно добавлен!');
        }

        return redirect()->route('adminPage');
    }
}
