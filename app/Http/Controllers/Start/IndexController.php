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

    /**
     * Обработать get-запрос для маршрута '\'
     */
    public function index()
    {
        $groups = Group::with('algorithms')->get();

        foreach ($groups as $group) {
            $algorithmData = [];
            foreach ($group->algorithms as $algorithm) {
                $algorithmData[] = [
                    'id' => $algorithm->id,
                    'name' => $algorithm->name,
                    'code' => $algorithm->code,
                ];
            }

            $this->propsData['groups'][] =
                [
                'id' => $group->id,
                'name' => $group->name,
                'algorithms' => $algorithmData,
            ];
        }

        $this->content = view('welcome', ['propsData' => $this->propsData])->render();
        return $this->renderOutput();
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
