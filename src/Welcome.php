<?php

namespace BrainGames\Welcome;

use function BrainGames\Cli\welcome as welcomeCli;
use function BrainGames\Cli\askUserName;

function welcome()
{
    welcomeCli();
    askUserName();
}
