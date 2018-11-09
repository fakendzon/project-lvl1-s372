<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

function run()
{
    $description = "Find the greatest common divisor of given numbers.";

    $generateQuestion = function () {
        $num = rand(1, 10);
        return [
            $num,
            isEven($num) ? ANSWER_POSITIVE : ANSWER_NEGATIVE
        ];
    };

    game($generateQuestion, $description);
}

function isEven($number)
{
    return  $number % 2 === 0;
}
