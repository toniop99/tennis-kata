<?php declare(strict_types=1);

namespace Kata;

class TennisScoreCalculator
{
    public function score(int $punchPlayer, int $otherPlayer): string
    {
        if ($punchPlayer === 1 && $otherPlayer === 1) {
            return '15 - 15';
        }

        if ($punchPlayer === 2 && $otherPlayer === 2) {
            return '30 - 30';
        }


        if ($punchPlayer === 0 && $otherPlayer === 2) {
            return '0 - 30';
        }

        return '15 - 0';
    }
}
