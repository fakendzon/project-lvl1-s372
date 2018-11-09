<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;

const OPERATIONS = ['-', '+', '*'];

function run()
{
    $description = "What is the result of the expression?";

    $generateQuestion = function () {
        $num1      = rand(1, 10);
        $num2      = rand(1, 10);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $question  = "{$num1} {$operation} {$num2}";
        return [$question, eval("return {$question};")];
    };

    game($generateQuestion, $description);
}
