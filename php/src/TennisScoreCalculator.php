<?php declare(strict_types=1);

namespace Kata;

class TennisScoreCalculator
{
    public function score(int $punchPlayer, int $otherPlayer): string
    {
        $punchPlayerReadableScore = $this->readableScore($punchPlayer);
        $otherPlayerReadableScore = $this->readableScore($otherPlayer);

        return $punchPlayerReadableScore . ' - ' . $otherPlayerReadableScore;
    }

    private function readableScore(int $score): string
    {
        return match ($score) {
            0 => '0',
            1 => '15',
            2 => '30',
            3 => '40',
        };
    }
}
