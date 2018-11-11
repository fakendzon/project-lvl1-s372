<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\game;

const DESCRIPTION        = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function run()
{

    $generateQuestionAndAnswer = function () {
        $step                  = rand(1, 10);
        $start                 = rand(1, 100);
        $hiddenElementPosition = rand(1, PROGRESSION_LENGTH);

        for ($i = 1; $i <= PROGRESSION_LENGTH; $i++) {
            $currentElement = $start + $i * $step;

            if ($i == $hiddenElementPosition) {
                $progression[] = '..';
                $rightAnswer   = $currentElement;
                continue;
            }

            $progression[] = $currentElement;
        }

        $question  = implode(' ', $progression);
        return [$question, $rightAnswer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
