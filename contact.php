<?php
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$textarea = htmlspecialchars( $_POST['textarea'] );
$required = $_POST['required'];

// check required
if(in_array('required',$required)){ $requiredCheck = 'checked';}
?>



<!-- display form -->
<h2>お問い合わせ</h2>
<form action="contact_check.php" method="post">
    <ul>
        <li>
            <label for="name">name</label>
            <input type="text" name="name" placeholder="name" id="name" value="<?php echo $name; ?>" required /></li>
        <li>
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" required /></li>
        <li>
            <label for="message">message</label>
            <textarea name="textarea" id="message" required><?php echo $textarea; ?></textarea>
        </li>
        <li>
            <label>
                <input type="checkbox" name="required[]" value="required" required="" php="" echo="" requiredcheck="" />
                確認
            </label>
        </li>
        <li>
            <button type="submit">確認</button>
        </li>
    </ul>
</form>
