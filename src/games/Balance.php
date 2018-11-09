<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\game;

function run()
{
    $description = "Balance the given number.";

    $generateQuestion = function () {
        $num       = rand(1, 10000);
        return [$num, toBalance($num)];
    };

    game($generateQuestion, $description);
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
