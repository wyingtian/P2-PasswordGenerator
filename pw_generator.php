<?php
/**
 * Created by PhpStorm.
 * User: ying
 * Date: 1/29/16
 * Time: 1:27 PM
 */
function passwordGenerator($num_words,$separator,$letter_case,$random_number_end)
{
    $wordList = file("words.txt", FILE_IGNORE_NEW_LINES);
    $words_total_num = sizeof($wordList);
    $rand_words = "";

    for ($i = 1; $i <= $num_words; $i++) {
        $rand_word_index = rand(0, $words_total_num);
        $rand_word_to_add = $wordList[$rand_word_index];
        // call adjustCase function to adjust case as required
        $rand_word_to_add = adjustCase($letter_case, $rand_word_to_add);
        $rand_words .= $rand_word_to_add;

        //add the separator
        $rand_words .= $separator;
    }


    if ($random_number_end === "checked") {
        $rand_words = $rand_words . rand(0, 9);
    }
    $password = $rand_words;
    return "<br>|$password|";
}

function adjustCase($letter_case, $word)
{
    if ($letter_case === first_uppercase) {
        return ucfirst($word);
    } else if ($letter_case === all_uppercase) {
        return strtoupper(($word));
    } else return $word;
}

?>