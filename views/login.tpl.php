<!DOCTYPE html>
<html lang="en">
<?php
include_once "conf/header.php";
?>
<body>

<div id="content">
    <div class="container table-block">
        <div class="row table-cell-block">
            <div class="col-sm-6 col-md-4 col-md-offset-4">

                <p class="form-error"><?php echo $pageData['message']; ?></p>
                <h1 class="text-center login-title">Вход в учётную запись</h1>
                <div class="account-wall">
                    <img class="profile-img" src="images/login.png"
                         alt="">
                    <form class="form-signin" id ="form-signin" method="post" action="/cabinet/login">
                        <input type="text" class="form-control" name = "login" id = "login" placeholder="Логин" required autofocus>
                        <input type="password" class="form-control" name = "password" id = "password" placeholder="Пароль" required>
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
                            Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>

</footer>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/angular.min.js"></script>
<script src="/js/script.js"></script>


</body>
</html>