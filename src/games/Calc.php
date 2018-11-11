<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS  = ['-' => 'minus', '+' => 'plus', '*' => 'multiplication'];

function run()
{
    $generateQuestionAndAnswer = function () {
        $num1      = rand(1, 10);
        $num2      = rand(1, 10);

        $previewOperations = array_keys(OPERATIONS);
        $operation = $previewOperations[array_rand($previewOperations)];
        $question  = "{$num1} {$operation} {$num2}";

        return [$question, call_user_func(__NAMESPACE__ . '\\' . OPERATIONS[$operation], $num1, $num2)];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function minus($num1, $num2)
{
    return $num1 - $num2;
}

function plus($num1, $num2)
{
    return $num1 + $num2;
}

function multiplication($num1, $num2)
{
    return $num1 * $num2;
}
