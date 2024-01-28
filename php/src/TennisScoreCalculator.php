<?php declare(strict_types=1);

namespace Kata;

class TennisScoreCalculator
{
    public function score(int $punchPlayer, int $otherPlayer): string
    {
        if ($punchPlayer === 4 && $otherPlayer === 0) {
            return 'Punch player wins';
        }

        if ($punchPlayer === $otherPlayer && $punchPlayer >= 3) {
            return 'Deuce';
        }

        if ($this->isAdvantage($punchPlayer, $otherPlayer)) {
            return $punchPlayer > $otherPlayer ? 'Advantage punch player' : 'Advantage other player';
        }

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

    private function isAdvantage(int $punchPlayer, int $otherPlayer): bool
    {
        return ($punchPlayer >= 4 && $punchPlayer - $otherPlayer === 1) ||
            ($otherPlayer >= 4 && $otherPlayer - $punchPlayer === 1);
    }
}
