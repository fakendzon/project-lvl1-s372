<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

function run()
{
    $question[] = function () {
        return rand(1, 100);
    };

    game(function ($userAnswer, $checkedNumber) {
        $rightAnswer =  isEven($checkedNumber) ? ANSWER_POSITIVE : ANSWER_NEGATIVE;

        return [
            'right'        => strcasecmp($rightAnswer, $userAnswer) == 0 ? true : false,
            'right_answer' => $rightAnswer
        ];
    }, $question);
}

function isEven($number)
{
    return  $number % 2 === 0 ? true : false;
}
