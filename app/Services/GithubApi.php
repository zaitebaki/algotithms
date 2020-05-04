<?php

namespace App\Services;

use Log;
use Storage;

class GithubApi
{
    const API_URL = 'https://api.github.com/markdown';
    const USER_AGENT = 'zaitebaki';
    const MODE = 'gfm';
    const CONTEXT = 'github/zaitebaki';
    const LANGUAGE = 'PHP';

    /**
     * Получить markdown-разметку кода
     * @param string $text
     *
     * @return ?string
     */
    public static function getMarkdown(string $text): ?string
    {
        $error = null;
        $postArray = array(
            "text" => '```' . self::LANGUAGE . '\n' . $text . '\n```',
            "mode" => self::MODE,
            "context" => self::CONTEXT,
        );

        $ch = curl_init(self::API_URL);

        curl_setopt($ch, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $postData = str_replace('\\\\', '\\', json_encode($postArray));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $markdownString = curl_exec($ch);

        // dd($markdownString);

        // проверить наличие ошибки curl
        if (curl_errno($ch)) {
            $error = 'Ошибка curl: ' . curl_error($ch);
            Log::critical($error);
            session()->flash('errorMessage', $error);
            curl_close($ch);
        } else {
            curl_close($ch);
            // проверить на ошибки ответ от github
            $pattern = '/^<div/';
            $result = preg_match($pattern, $markdownString);

            // получен неожиданный ответ
            if ($result !== 1) {

                $error = 'Неожиданный ответ от github: ' . $markdownString;
                Log::critical($error);
                session()->flash('errorMessage', $error);

                // ошибки не найдены
            } else {
                Storage::put('file.txt', $markdownString);
                return $markdownString;
            }
        }

        return null;
    }
}
