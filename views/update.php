<?php
// uncomment this to see the structure of $data

// echo "<pre>";
// print_r($data);
// echo "</pre>";
if (isset($data['result']) && $data['result'] === TRUE) {
?>
    <div class="row">
        <div class="col s12">
            <strong>Success!</strong> Editing of a contact info was a success.
        </div>
    </div>

<?php
} elseif (isset($data['result']) && $data['result'] === FALSE) {
?>
    <div class="row">
        <div class="col s12">
            <strong>Error!</strong> Invalid Input!
        </div>
    </div>
<?php
}
?>

<form class="col s12" method="post" action="<?php echo $data['this_url'] . "?id=" . $data['contact_id']; ?>">
    <div class="row">
        <div class="input-field col s12">
            <input id="name" type="text" name="contact_name" value="<?php echo $data['contact_name']; ?>">
            <label for="name">Full Name</label>
            <span class="helper-text" data-error="wrong" data-success="right">
                Accepts Alphabets Only, <?php echo $data['MIN_CHAR_LIMIT'] . "-" . $data['MAX_CHAR_LIMIT'] ?>
                Characters
            </span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="number" type="number" name="contact_number" value="<?php echo $data['contact_number']; ?>">
            <label for="number">Contact Number</label>
            <span class="helper-text" data-error="wrong" data-success="right">
                Accepts Only Numbers, <?php echo $data['MIN_CHAR_LIMIT_NUMBER'] . "-" . $data['MAX_CHAR_LIMIT_NUMBER'] ?>
                Digits
            </span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" name="contact_email" value="<?php echo $data['contact_email']; ?>">
            <label for="email">Email Address</label>
            <span class="helper-text" data-error="wrong" data-success="right">
                Accepts Valid Email Format, <?php echo $data['MIN_CHAR_LIMIT_EMAIL'] . "-" . $data['MAX_CHAR_LIMIT_EMAIL'] ?>
                Characters
            </span>
        </div>
    </div>
    <button name="submit" type="submit" class="waves-effect waves-light btn" <?php echo isset($data['result']) && $data['result'] === TRUE ? "disabled" : ""; ?>>
        <i class="material-icons left">send</i>
        Submit
    </button>
    <a class="waves-effect waves-light btn blue" href="<?php echo $data['home_url']; ?>">
        <i class="material-icons left">home</i>
        Home
    </a>
</form>