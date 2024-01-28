<?php declare(strict_types=1);

namespace Kata;

class TennisScoreCalculator
{
    public function score(int $punchplayer, int $otherPlayer): string
    {
        if ($punchplayer === 15 && $otherPlayer === 15) {
            return '15 - 15';
        }

        return '15 - 0';
    }
}
