<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;

const DESCRIPTION = "What is the result of the expression?";

function run()
{
    $generateQuestionAndAnswer = function () {
        $num1      = rand(1, 10);
        $num2      = rand(1, 10);

        $operations = [
            '-' => function ($num1, $num2) {
                return $num1 - $num2;
            },
            '+' => function ($num1, $num2) {
                return $num1 + $num2;
            },
            '*' => function ($num1, $num2) {
                return $num1 * $num2;
            },
        ];

        $previewOperations = array_keys($operations);
        $operation = $previewOperations[array_rand($previewOperations)];
        $question  = "{$num1} {$operation} {$num2}";

        return [$question, $operations[$operation]($num1, $num2)];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
