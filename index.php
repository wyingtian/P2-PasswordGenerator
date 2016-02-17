<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Secure Password Generator </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--    jquery and js file for comic display module-->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/display_pic.js"></script>
    <!--    import the password generator file-->
    <?php require 'pw_generator.php' ?>
</head>
<body>
<div class="container">
    <!--    if submit button clicked diplay the password-->
    <?php if (isset($_POST['submit'])) : ?>
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-success ">
                    <div class="panel-heading"><h3 class="panel-title">Here Is Your Password</h3></div>
                    <div class="panel-body">
                        <?php if ($result != ''): ?>

                            <div>
                                <p id="display_password"> <?php echo $result; ?>
                                </p>
                            </div>

                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!--        if not clicked display the introductory info-->
    <?php else: ?>
        <div class="row">
            <div class="  col-md-12">
                <div class="panel panel-success ">
                    <div class="panel-heading"><h3 class="panel-title"> Password Generator Guide</h3></div>
                    <div class="panel-body">
                        <p>xkcd Password Generator is to generate a random secure password consisting a few words and characters.
                            <br>You have the following options:
                            <br>
                            1. How many words to use <br>
                            2. Choose a separator between words <br>
                            3. Upper case or lower case <br>
                            4. Add special character or number </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--    This is the form module-->

    <div class="row">
        <div class="col-md-7 ">
            <div class="panel panel-primary ">
                <div class="panel-heading"><h3 class="panel-title">Customize Your Password</h3></div>
                <div class="panel-body">
                    <!--    The form for use input, using POST method-->
                    <form action="index.php" method="POST">
                        <!--                    Choose how many words-->
                        <div class="form-group">
                            <h4>How Many Words?   (Range: 3 - 9)</h4>
                            <p id="note">(If input invalid, use default value 5)</p>
                            <input class="form-control" name="num_words" type="text" value=<?= $num_words ?>>
                        </div>
                        <hr>
                        <!--                        choose the separator-->
                        <div class="form-group">
                            <h4>Choose a Separator! </h4>
                            <select name="separator" class="form-control">
                                <option value="-" <?php if ($separator === "-") {
                                    echo "selected";
                                } ?>>-
                                </option>
                                <option value="~" <?php if ($separator === "~") {
                                    echo "selected";
                                } ?> >~
                                </option>
                                <option value="_" <?php if ($separator === "_") {
                                    echo "selected";
                                } ?>>_
                                </option>
                                <option value=" " <?php if ($separator === " ") {
                                    echo "selected";
                                } ?>>whitespace
                                </option>

                            </select>
                        </div>
                        <hr>
                        <!--                        choose the letter style-->
                        <div class="form-group ">
                            <h4>Choose Your Letter Case Style!</h4>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="case"
                                           value="all_lowercase" <?php if ($letter_case === "all_lowercase") {
                                        echo "checked";
                                    } ?>> All
                                    Lowercase
                                </label>
                            </div>
                            <div class="radio">
                                <label class="radio">
                                    <input type="radio" name="case"
                                           value="all_uppercase" <?php if ($letter_case === "all_uppercase") {
                                        echo "checked";
                                    } ?>> All Uppercase
                                </label>
                            </div>
                            <div class="radio">
                                <label class="radio">
                                    <input type="radio" name="case"
                                           value="first_uppercase" <?php if ($letter_case === "first_uppercase") {
                                        echo "checked";
                                    } ?>> First Letter
                                    Uppercase
                                </label>
                            </div>
                        </div>
                        <hr>
                        <!--                        chose extra number or character-->
                        <div class="form-group checkbox">
                            <div class="checkbox ">
                                <h4>Add Extra!</h4>
                                <label>
                                    <input type="checkbox" name="add_special_char"
                                           value="checked" <?= $add_special_char ?> > Start with random character ( ! @
                                    # $ % ^ & * )
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_random_number"
                                           value="checked" <?= $random_number_end ?> > End with random
                                    number ( 0 - 9 )
                                </label>
                            </div>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-default" name="submit">
                    </form>
                </div>
            </div>
        </div>
        <!--        This is a module to display some funny commics, can use prev and next button to show new ones-->
        <div class="col-md-5 ">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading"><h3 class="panel-title"> Everyone Loves Comics!</h3></div>
                    <div class="panel-body">
                        <div id="slide_cont">
                            <img class=" center-block img-rounded" src="images/image1.jpg" id="slideshow_image"
                                 alt="comic-image">
                            <div class=" col-md-offset-3 col-md-1 col-sm-offset-3 col-sm-1 col-xs-offset-3 col-xs-1">
                                <input type="image" id="prev_image" src="images/previous.png" alt="next button">
                            </div>
                            <div
                                class=" col-md-offset-2 col-md-1 col-sm-offset-2 col-sm-1 col-sm-1 col-xs-offset-3 col-xs-1">
                                <input type="image" id="next_image" src="images/next.png" alt="next button">
                            </div>
                        </div>

                        <input type="hidden" id="img_no" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

