<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 08.08.2017
 * Time: 15:18
 */

namespace Xsolla_summer_school\Tasks;

class RepeatingWordsFinder
{
    #Выводит строку, из которой состоят все слова аргумента или false,
    #Если общей такой подстроки у слов не существует.
    #Каждая строка разбивается на равные подстроки. Если эти подстроки одинаковы,
    #То в $repeatingWords['подстрока'] прибавляется единица.
    #Для 'abcabc' такие подстроки — 'abc', 'abcabc'.
    #Если в каждом слове была найдена одинаковая подстрока, функция
    #Вернет ее. Иначе функция вернет false.
    public function findRepeatingWords($words)
    {
        $wordsArray = explode(' ',$words);
        $repeatingWords = array();
        foreach ($wordsArray as $word) {
            $divs = array(1, strlen($word));
            for ($i = 2; $i < strlen($word) / 2 + 1; $i++)
                if (strlen($word) % $i == 0) {
                    $divs[] = $i;
                }
            $k = 0;
            while ($k < count($divs)) {
                $i = strlen($word) / $divs[$k++];
                $chunks = str_split($word, $i);
                if (count(array_unique($chunks)) == 1) {
                    $repeatingWords[$chunks[0]] += 1;
                }
            }
        }
        if (in_array(count($wordsArray), $repeatingWords)) {
            return array_search(count($wordsArray), $repeatingWords);
        }
        else {
            return false;
        }
    }
}
