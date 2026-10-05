<?php

namespace App\Actions;

class GenerateRandomPassword
{
    private const ANIMALS = [
        'kucing', 'anjing', 'babi', 'kambing', 'sapi', 'ayam', 'bebek',
        'kelinci', 'ular', 'ikan', 'kuda', 'kerbau', 'rusa', 'monyet',
        'gajah', 'harimau', 'singa', 'beruang', 'zebra',
    ];

    private const PLANTS = [
        'apel', 'mangga', 'jeruk', 'pisang', 'anggur', 'semangka',
        'melon', 'nanas', 'kelapa', 'jambu', 'durian', 'sirsak',
        'rambutan', 'manggis', 'salak', 'dukun', 'persik', 'leci',
        'delima', 'markisa',
    ];

    public function handle(int $length = 8): string
    {
        $words = array_merge(self::ANIMALS, self::PLANTS);
        $word = $words[array_rand($words)];

        $numberLength = max(1, $length - strlen($word));
        $min = (int) str_repeat('1', $numberLength);
        $max = (int) str_repeat('9', $numberLength);
        $number = random_int($min, $max);

        return $word.$number;
    }
}
