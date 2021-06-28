<?php
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$textarea = htmlspecialchars( $_POST['textarea'] );
$required = $_POST['required'];
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

<script>
history.pushState(null, null, null);
$(window).on("popstate", function (event) {
    if (!event.originalEvent.state) {
        history.pushState(null, null, null);
        return;
    }
});

$(function(){
    $('button[type="submit"]').on('click',function(){
        $(this).parents('form').attr('action', $(this).data('action'));
        $(this).parents('form').submit();
    });
});
</script>

<h2>confirm</h2>
<ul>
    <li><?php echo $name; ?></li>
    <li><?php echo $email; ?></li>
    <li><?php echo nl2br($textarea); ?></li>
</ul>

<form action="send_mail.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>" />
    <input type="hidden" name="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="textarea" value="<?php echo $textarea; ?>" />
    <input type="hidden" name="required[]" value="<?php echo $requiredVal; ?>" />
    <button type="submit" id="submit" data-action="send_mail.php">決定</button>
    <button type="submit" id="back" data-action="contact.php">戻る</button>
</form>
