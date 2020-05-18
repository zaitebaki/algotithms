<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SuperController;
use App\Language;
use Illuminate\Http\Request;
use Validator;

class LanguageController extends SuperController
{
    private $propsData = [];

    public function __construct()
    {
        parent::__construct();
        $this->title = 'Добавить язык';
        $this->layout = "route.main";
    }

    /**
     * Отправить страницу "Добавить язык"
     * Обработать GET-запрос /add-language
     */
    public function index()
    {
        if (session()->has('errors')) {
            $this->propsData['errors'] = session('errors');
        }

        if (session()->has('status')) {
            $this->propsData['status'] = session('status');
        }

        $this->propsData['addLanguageRoute'] = route('addLanguage');

        $this->content = view('add-language-page', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
    }

    /**
     * Добавить новый язык
     * Обработать POST-запрос /add-language
     */
    public function addLanguage(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nameLanguage' => 'bail|required|alpha_num|max:255',
            'keyword' => 'bail|required|alpha_num|max:255',
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
            return redirect()->route('languagePageIndex');
        }

        $language = new Language;
        $language->name = $data['nameLanguage'];
        $language->keyword = $data['keyword'];
        $language->save();

        session()->flash('status', 'Язык успешно добавлен!');

        return redirect()->route('languagePageIndex');
    }
}
