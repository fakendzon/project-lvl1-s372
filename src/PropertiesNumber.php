<?php

namespace BrainGames\PropertiesNumber;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

function getProperties($num)
{
    return [
        'isPrime' => isPrime($num) ? ANSWER_POSITIVE : ANSWER_NEGATIVE,
        'isEven'  => isEven($num)
    ];
}

function isPrime($number)
{
    if ($number == 1) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function isEven($number)
{
    return  $number % 2 === 0;
}
