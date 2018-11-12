<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;
use function BrainGames\PropertiesNumber\getProperties;
use const BrainGames\PropertiesNumber\ANSWER_POSITIVE;
use const BrainGames\PropertiesNumber\ANSWER_NEGATIVE;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $generateQuestionAndAnswer = function () {
        $num = rand(1, 100);
        return [
            $num,
            getProperties($num)['isEven']() ? ANSWER_POSITIVE : ANSWER_NEGATIVE
        ];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}
