<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $generateQuestionAndAnswer = function () {
        $num = rand(1, 100);
        return [
            $num,
            isEven($num) ? ANSWER_POSITIVE : ANSWER_NEGATIVE
        ];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function isEven($number)
{
    return  $number % 2 === 0;
}
