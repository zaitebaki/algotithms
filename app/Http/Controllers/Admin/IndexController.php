<?php

namespace App\Http\Controllers\Admin;

use App\Algorithm;
use App\Group;
use App\Http\Controllers\SuperController;
use App\Language;
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
     * Отправить страницу админки
     * Обработать GET-запрос /admin-ft17
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

        $languages = Language::all();

        foreach ($languages as $language) {
            $this->propsData['languages'][] =
                [
                'id' => $language->id,
                'name' => $language->name,
                'keyword' => $language->keyword,
            ];
        }

        $this->propsData['addAlgorithmRoute'] = route('addAlgorithm');

        if (session()->has('errors')) {
            $this->propsData['errors'] = session('errors');
        }
        if (session()->has('errorMessage')) {
            $this->propsData['errors'][] = session('errorMessage');
        }
        if (session()->has('status')) {
            $this->propsData['status'] = session('status');
        }

        $this->content = view('admin', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
    }

    /**
     * Добавить новый алгоритм
     * Обработать POST-запрос /add-algorithm
     * @param Request $request
     *
     * @return int
     */
    public function addAlgorithm(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'groupId' => 'bail|required|exists:App\Group,id',
            'languageId' => 'bail|required|exists:App\Language,id',
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
        $language = Language::find($data['languageId'])->keyword;

        $markdown = GithubApi::getMarkdown($codeTextArea, $language);

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
