<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\game;

const DESCRIPTION      = "What number is missing in the progression?";
const PROGRESSION_LEN  = 10;

function run()
{

    $generateQuestionAndAnswer = function () {
        $step           = rand(1, 10);
        $iteration      = rand(1, 100);
        $secret         = rand(1, PROGRESSION_LEN);
        $progression[0] = $iteration;

        for ($i = 0; $i < PROGRESSION_LEN; $i++) {
            $iteration += $step;

            if ($i == $secret) {
                $progression[] = '..';
                $rightAnswer   = $iteration;
                continue;
            }

            $progression[] = $iteration;
        }

        $question  = implode(' ', $progression);
        return [$question, $rightAnswer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
