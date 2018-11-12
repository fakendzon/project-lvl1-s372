<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS  = ['-', '+', '*'];

function run()
{
    $generateQuestionAndAnswer = function () {
        $num1        = rand(1, 10);
        $num2        = rand(1, 10);
        $operation   = OPERATIONS[array_rand(OPERATIONS)];
        $question    = "{$num1} {$operation} {$num2}";
        $rightAnswer = calculateAnswer($operation, $num1, $num2);

        return [$question, $rightAnswer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function calculateAnswer($operation, $num1, $num2)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}
