<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\game;

function run()
{
    $num1 = function () {
        return rand(1, 10);
    };
    $num2 = $num1;

    $question[] = $num1;
    $question[] = $num2;

    game(function ($userAnswer, $checkedValues) {
        $userAnswer  = (int)$userAnswer;

        $checkedValues = array_map(function ($value) {
            return (int)$value;
        }, $checkedValues);

        $rightAnswer = gmp_intval(gmp_gcd($checkedValues[0], $checkedValues[1]));

        return [
            'right'        => $rightAnswer === $userAnswer ? true : false,
            'right_answer' => $rightAnswer
        ];
    }, $question);
}
