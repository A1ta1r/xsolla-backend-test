<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 08.08.2017
 * Time: 15:18
 */

namespace Xsolla_summer_school\Tasks;

use DateTime;

class MostVisitorsTimeFinder
{
    #Функция парсит строку в объекты DateTime и сравнивает их.
    #Если время ухода i-того человека больше времени прихода k-того человека
    #И меньше или равно времени ухода k-того человека, то их время пересекается
    #В max(in)-min(out).
    #Функция возвращает наибольшее число посетителей музея в один интервал времени
    #И этот интервал в формате 'G:i'-'G:i'.
    public function findMostVisitorsTime($pairs)
    {
        $pairsArray = explode(' ', $pairs);
        $ins = array();
        $outs = array();
        #Парсинг строки-аргумента в массивы DateTime
        foreach ($pairsArray as $pair) {
            $inAndOut = explode('-', $pair);
            $in = DateTime::createFromFormat('G:i', $inAndOut[0]);
            $out = DateTime::createFromFormat('G:i', $inAndOut[1]);
            $ins[] = $in;
            $outs[] = $out;
        }
        $maxVisitors = 0;
        $maxTimeIn = new DateTime();
        $minTimeOut = new DateTime();
        for ($i = 0; $i < count($outs); $i++) {
            $visitors = 0;
            $inTime = new DateTime();
            for ($j = 0; $j < count($ins); $j++) {
                if ($ins[$j] < $outs[$i] && $outs[$j] >= $outs[$i]) {
                    $visitors++;
                    $inTime = $ins[$j];
                }
            }
            if ($maxVisitors < $visitors) {
                $maxVisitors = $visitors;
                $maxTimeIn = $inTime;
                $minTimeOut = $outs[$i];
            }
        }
        return $maxVisitors . ' ' . $maxTimeIn->format('G:i') . '-' . $minTimeOut->format('G:i');
    }
}
