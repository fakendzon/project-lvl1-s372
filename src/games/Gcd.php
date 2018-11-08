<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\game;
use function BrainGames\Cli\welcome;
use function \cli\line;

function run()
{
    welcome();
    line("Find the greatest common divisor of given numbers.");

    $generateQuestion = function () {
        $num1      = rand(1, 10);
        $num2      = rand(1, 10);
        return "{$num1} {$num2}";
    };

    $getRightAnswer = function ($question) {
        $question = explode(' ', $question);
        return gmp_intval(gmp_gcd($question[0], $question[1]));
    };

    game($getRightAnswer, $generateQuestion);
}
