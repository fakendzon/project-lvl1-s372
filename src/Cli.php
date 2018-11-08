<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    return $name;
}

function game($logicGame, $question)
{
    $name = run();

    $flag = 3;
    while ($flag) {
        $questionCalculate = array_map(function ($item) {
            if (is_callable($item)) {
                return $item();
            }

            return $item;
        }, $question);


        $questionStr = implode(' ', $questionCalculate);
        $number      = eval("return {$questionStr};");
        line("Question: {$questionStr}");

        $answer = prompt('Your answer');
        line("Your answer: %s!", $answer);

        $result = $logicGame($answer, $number);

        if (array_key_exists('right', $result) && $result['right'] === true) {
            line("Correct!");
        } elseif (array_key_exists('right_answer', $result)) {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $result['right_answer']);
            line('Let\'s try again, %s!', $name);
            break;
        } else {
            line('Error: bad request from game!');
            return false;
        }

        $flag --;

        if ($flag === 0) {
            line('Congratulations, %s!', $name);
        }
    }
}
