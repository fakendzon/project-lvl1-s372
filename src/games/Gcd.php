<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\game;

const DESCRIPTION  = "Find the greatest common divisor of given numbers.";

function run()
{

    $generateQuestionAndAnswer = function () {
        $num1     = rand(1, 100);
        $num2     = rand(1, 100);
        $question = "{$num1} {$num2}";
        $answer   = gmp_intval(gmp_gcd($num1, $num2));

        return [$question, $answer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
