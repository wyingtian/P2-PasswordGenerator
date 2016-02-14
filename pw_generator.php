<?php
// initialize variables and set their default
// $result is the password need to be returned
$result = "";
$DEFAULT_NUM_WORDS = 5;
$MIN_NUM_WORDS = 3;
$MAX_NUM_WORDS = 9;
//default separator
$DEFAULT_SEPARATOR = '-';
$num_words = $DEFAULT_NUM_WORDS;
$separator = $DEFAULT_SEPARATOR;
//default letter case
$letter_case = "all_lowercase";
//default random char to be added in the end
$add_special_char = "";

//Default is not add random number at the begining
$random_number_end = "";

// once recieve form submission
if (isset($_POST['submit'])) {
    // form input validation, if invalid set to default number
    if (is_numeric($_POST["num_words"]) AND $_POST["num_words"] >= $MIN_NUM_WORDS AND $_POST["num_words"] <= $MAX_NUM_WORDS) {
        $num_words = $_POST["num_words"];
    }
    $separator = $_POST["separator"];
    $letter_case = $_POST["case"];
    if (array_key_exists("add_random_number", $_POST)) {
        $random_number_end = $_POST["add_random_number"];
    }

    if (array_key_exists("add_special_char", $_POST)) {
        $add_special_char = $_POST["add_special_char"];
    }
    // call the passwordGenerator method to get the result
    $result = passwordGenerator($num_words, $separator, $letter_case, $random_number_end, $add_special_char);
}
// this is the function have the logic to generate a password
function passwordGenerator($num_words, $separator, $letter_case, $random_number_end, $add_special_char)
{
    $wordList = file("words.txt", FILE_IGNORE_NEW_LINES);
    $words_total_num = sizeof($wordList);
    $rand_words = "";
    //array contains specail chars
    $SPECIAL_CHARS = ['!', '@', '#', '$', '%', '^', '&', '*'];

    for ($i = 1; $i <= $num_words; $i++) {
        $rand_word_index = rand(0, $words_total_num);
        $rand_word_to_add = $wordList[$rand_word_index];

        // call adjustCase function to adjust case as required
        $rand_word_to_add = adjustCase($letter_case, $rand_word_to_add);
        $rand_words .= $rand_word_to_add;

        //add the separator
        $rand_words .= $separator;
    }
    // decide if add random special char
    if ($add_special_char === "checked") {
        $rand_words = $SPECIAL_CHARS[rand(0, 7)] . $rand_words;
    }
    // decide if add number
    if ($random_number_end === "checked") {
        $rand_words = $rand_words . rand(0, 9);
    }
    $password = $rand_words;
    return $password;
}
//helper function called by passwordGenerator to change case
function adjustCase($letter_case, $word){
    if ($letter_case === "first_uppercase") {
        return ucfirst($word);
    } else if ($letter_case === "all_uppercase") {
        return strtoupper(($word));
    } else return $word;
}

?>