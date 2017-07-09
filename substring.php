<?php

class MaximumUniqueSubstring
{

    #Идея в том, чтобы двигаться по одному символу сначала строки
    #На каждом шаге добавлять к текущему символу следующие в строке, пока не найдем повторяющийся.
    #Если длина максимальной подстроки больше или равна числу оставшихся символов в строке,
    #То алгоритм завершается.
    #Сложность где-то в районе O(N^2)
    public function findMaximumUniqueSubstring($str)
    {
        $len = strlen($str);
        $maxSub = "";
        for ($i = 0; $i < $len &&
        strlen($maxSub) < $len - $i; $i++) {
            $sub = $str[$i];
            for ($j = $i + 1; $j < $len &&
            strpos($sub, $str[$j]) === false; $j++)
                $sub .= $str[$j];
            if (strlen($sub) > strlen($maxSub))
                $maxSub = $sub;
        }
        return $maxSub;
    }
}
