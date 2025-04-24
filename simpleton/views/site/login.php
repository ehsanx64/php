<?php
$this->pageTitle = $title;

?>
<div class="container">
<form class="login-form" method="post" action="<?php echo Url::getBaseUrl('user/login'); ?>">
    <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" />
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control"  type="password" name="password" />
    </div>

    <div class="form-group">
        <input class="form-control btn btn-primary"  type="submit" value="Login" />
    </div>
</form>
</div>
