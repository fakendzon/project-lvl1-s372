<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;

const OPERATIONS = ['-', '+', '*'];

function run()
{
    $num1 = function(){return rand(1, 10);};
    $num2 = $num1;
    $operation = function(){return OPERATIONS[array_rand(OPERATIONS)];};

    $question[] = $num1;
    $question[] = $operation;
    $question[] = $num2;

    game(function ($answer, $rightAnswer) {
        $answer      = (int)$answer;
        $rightAnswer = (int)$rightAnswer;

        return [
            'right'        => $rightAnswer === $answer ? true : false,
            'right_answer' => $rightAnswer
        ];

    }, $question);
}

