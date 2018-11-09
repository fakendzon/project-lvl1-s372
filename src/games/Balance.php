<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\game;

const DESCRIPTION = "Balance the given number.";

function run()
{
    $generateQuestionAndAnswer = function () {
        $num       = rand(1, 10000);
        return [$num, toBalance($num)];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function toBalance($num)
{
    $numbers = str_split($num);

    while (true) {
        if (abs($numbers[0] - $numbers[count($numbers) - 1]) <= 1) {
            return implode($numbers);
        }

        $numbers[0] += 1;
        $numbers[count($numbers) - 1] -= 1;
        sort($numbers);
    }
}
