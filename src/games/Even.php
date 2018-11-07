<?php

namespace BrainGames\Games\Even;

use function \cli\line;
use function \cli\prompt;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';

function even($name = 'noname')
{
    $flag = 3;
    while ($flag) {
        $number = rand(1, 1000);
        line("Question: {$number}");

        $answer      = prompt('Your answer');
        $rightAnswer = getRightAnswer($number);

        line("Your answer: %s!", $answer);

        if (strcasecmp($rightAnswer, $answer) == 0) {
            line("Correct!");
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $rightAnswer);
            line('Let\'s try again, %s!', $name);
            break;
        }

        $flag --;

        if ($flag === 0) {
            line('Congratulations, %s!', $name);
        }
    }
}

function getRightAnswer($number)
{
    return $number % 2 === 0 ? ANSWER_POSITIVE : ANSWER_NEGATIVE;
}
