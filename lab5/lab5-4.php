<?php
function countLetters($word): array
{
    $letters = array();
    $word_chars = preg_split('//u', $word, - 1, PREG_SPLIT_NO_EMPTY);
    foreach ($word_chars as $char) {
        if (! array_key_exists($char, $letters)) {
            $letters[$char] = 1;
        } else {
            $letters[$char] ++;
        }
    }
    return $letters;
}

$word = "тест";
$letter_counts = countLetters($word);
foreach ($letter_counts as $letter => $count) {
    printf("%s\n", "'$letter' -> $count");
}