

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Secure Password Generator </title>
</head>
<body>
<form action="" class="input_boxes" method="post">
    <fieldset>
        <div>
        <label>Number of Words </label>
            <select name="num_words">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            </select>
        </div>
        <br>
        <div>
        <label>Separator </label>
            <select name="separator">
                <option value="-">-</option>
                <option value="_">_</option>
                <option value="@">@</option>
                <option value="#">#</option>
                <option value="$">$</option>
                <option value="%">%</option>
                <option value="^">^</option>
                <option value="&">&</option>
                <option value="*">*</option>
            </select>
        </div>
        <br>
        <div>
            <label> Case Sensitivity </label><br>
                <input type="radio" name = "case" value="all_uppercase" >Make All Letters Uppercase<br>
                <input type="radio" name = "case" value="all_lowercase" >Make All Letters Lowercase<br>
                <input type="radio" name = "case" value="first_uppercase" >Make First Letter Uppercase<br>
        </div>
        <br>
        <div>
                <input type="checkbox" name="add_random_number" value="checked"> Append random number to the end(1-10)
        </div>
        <input type="submit" name="submit">
    </fieldset>

</form>


</body>
</html>

<?php

/**
 * Created by PhpStorm.
 * User: ying
 * Date: 1/28/16
 * Time: 1:19 PM
 */
require 'pw_generator.php';

if(isset($_POST['submit'])){
    $num_words = $_POST["num_words"];
    $separator = $_POST["separator"];
    $letter_case = $_POST["case"];
    $random_number_end = $_POST["add_random_number"];
    $result_password=passwordGenerator($num_words, $separator, $letter_case, $random_number_end  );
    echo $result_password;
}
?>
