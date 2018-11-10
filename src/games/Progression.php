<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\game;

const DESCRIPTION      = "What number is missing in the progression?";
const PROGRESSION_LEN  = 10;

function run()
{

    $generateQuestionAndAnswer = function () {
        $start = rand(1, 100);
        $step  = rand(1, 10);

        for ($i = 0; $i < PROGRESSION_LEN; $i++) {
            if () {

            }
        }

        $question  = "{$num1} {$num2}";
        return [$question, gmp_intval(gmp_gcd($num1, $num2))];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
