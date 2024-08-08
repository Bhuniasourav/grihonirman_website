<?php
function limitWords($text, $minWords = 150) {
    $words = explode(' ', $text);

    if (count($words) < $minWords) {
        // If there are fewer words than $minWords, pad with empty strings and add "..."
        $words = array_pad($words, $minWords, '');
        $text = implode(' ', $words);
        $text .= '...'; // Concatenate "..." at the end
    } else {
        // Slice to the required number of words and add "..."
        $text = implode(' ', array_slice($words, 0, $minWords)) . '...';
    }

    return $text;
}
?>
