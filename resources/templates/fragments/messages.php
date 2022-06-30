<div id="messages">
    <?php
        $error_messages = $_REQUEST['error_messages'];
        $success_messages = $_REQUEST['success_messages'];
    ?>
    <?php if(!empty($error_messages)): ?>
        <?php foreach ($error_messages as $message): ?>
            <div class="materialert error">
                <div class="material-icons">error_outline</div>
                <?php echo $message; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if(!empty($success_messages)): ?>
        <?php foreach ($success_messages as $message): ?>
        <div class="materialert success">
            <div class="material-icons">check</div>
            <?php echo $message; ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>