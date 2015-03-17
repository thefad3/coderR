<? require('header.php') ?>
    <form action="/sua"  enctype="multipart/form-data" method="post">
        <label>Username:</label>
        <input name="username" type="text">
        <label>Password:</label>
        <input name="password" type="password">
        <input type="submit">
    </form>
<? require('footer.php'); ?>