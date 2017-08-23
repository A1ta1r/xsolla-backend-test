<?php

class Brackets
{
    #Алгоритм проходит по каждому символу строки 1 раз.
    #Если символ - открывающая скобка, то она добавляется в массив $arrayOfOpenings
    #Если символ - закрывающая скобка, то проверятся, является ли она парой последнему
    #Элементу в $arrayOfOpenings. Если да, этот элемент $arrayOfOpenings удаляется.
    #Если закрывающая скобка и последний символ не парны, то последовательность неверна => false.
    #Если все символы проверены и $arrayOfOpenings пуст - то все пары верны => true.
    #Если все символы проверены и $arrayOfOpenings не пуст - то есть лишние скобки => false
    #Сложность O(N)
    public function isBracketSequenceCorrect($str)
    {
        $chars = str_split($str);
        $arrayOfOpenings = array();

        foreach ($chars as $char) {
            if ($char !== ')' && $char !== '}' && $char !== ']' &&
                $char !== '(' && $char !== '{' && $char !=='[')
                return false;

            if ($char == '(' || $char == '{' || $char =='[')
                array_push($arrayOfOpenings, $char);
            else {
                if (count($arrayOfOpenings) > 0) {
                    $lastOpening = $arrayOfOpenings[count($arrayOfOpenings) - 1];
                    if ($lastOpening == '(' && $char == ')' ||
                        $lastOpening == '{' && $char == '}' ||
                        $lastOpening == '[' && $char == ']'
                    )
                        array_pop($arrayOfOpenings);
                    else
                        return false;
                } else
                    return false;
            }
        }
        if (count($arrayOfOpenings) == 0)
            return true;
        else
            return false;
    }
}