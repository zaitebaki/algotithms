<?php

namespace App\Http\Controllers\Start;

use App\Group;
use App\Http\Controllers\SuperController;

class IndexController extends SuperController
{
    public function __construct()
    {
        parent::__construct();
        $this->title = 'Алгоритмы на PHP';
        $this->layout = "route.main";
    }

    public function index()
    {
        // $inputArray = [1, 4, 7, 8, 2, 5];
        // $resultArray = $this->bubbleSort($inputArray);

        $groups = Group::all();

        foreach ($groups as $group) {
            $this->propsData['groups'][] = $group->name;
        }

        $this->content = view('welcome', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();

        // $array = array(
        //     "text" => '```php\nfunction getData(int $parameter) {\n}\n```',
        //     "mode" => "gfm",
        //     "context" => "github/zaitebaki",
        // );

        // $ch = curl_init('https://api.github.com/markdown');
        // $agent = 'zaitebaki';

        // curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        // ));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $test = str_replace('\\\\', '\\', json_encode($array));

        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $test);
        // $result = curl_exec($ch);
        // curl_close($ch);

        // echo htmlentities($result);
    }

    private function bubbleSort($array)
    {
        $countArray = count($array);
        $flag = true;
        while ($flag) {
            $flag = false;
            for ($i = 0; $i < $countArray - 1; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    $dump = $array[$i];
                    $array[$i] = $array[$i + 1];
                    $array[$i + 1] = $dump;
                    $flag = true;
                }
            }
        }

        return $array;
    }
}
