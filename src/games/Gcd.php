<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\game;

function run()
{
    $description = "Find the greatest common divisor of given numbers.";

    $generateQuestion = function () {
        $num1      = rand(1, 100);
        $num2      = rand(1, 100);
        $question  = "{$num1} {$num2}";
        return [$question, gmp_intval(gmp_gcd($num1, $num2))];
    };

    game($generateQuestion, $description);
}
