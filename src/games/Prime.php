<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\game;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

const DESCRIPTION  = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $generateQuestionAndAnswer = function () {
        $verifiableNumber = rand(1, 100);
        $answer           = isPrime($verifiableNumber) ? ANSWER_POSITIVE : ANSWER_NEGATIVE;

        return [$verifiableNumber, $answer];
    };

    game($generateQuestionAndAnswer, DESCRIPTION);
}

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
