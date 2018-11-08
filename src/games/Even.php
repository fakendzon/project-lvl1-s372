<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;
use function BrainGames\Cli\welcome;
use function \cli\line;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

function run()
{
    welcome();
    line("Find the greatest common divisor of given numbers.");

    $generateQuestion = function () {
        return rand(1, 10);
    };

    $getRightAnswer = function ($question) {
        return isEven($question) ? ANSWER_POSITIVE : ANSWER_NEGATIVE;
    };

    game($getRightAnswer, $generateQuestion);
}

function isEven($number)
{
    return  $number % 2 === 0;
}
