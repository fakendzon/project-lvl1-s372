<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\game;

const DESCRIPTION = "Balance the given number.";

function run()
{
    $generateQuestionAndAnswer = function () {
        $verifiableNumber = rand(1, 10000);
        $answer           = toBalance($verifiableNumber);

        return [$verifiableNumber, $answer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function toBalance($num)
{
    $numbers = str_split($num);
    sort($numbers);

    while (true) {
        if (abs($numbers[0] - $numbers[count($numbers) - 1]) <= 1) {
            return implode($numbers);
        }

        $numbers[0] += 1;
        $numbers[count($numbers) - 1] -= 1;
        sort($numbers);
    }
}
