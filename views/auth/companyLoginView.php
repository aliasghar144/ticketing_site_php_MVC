
<link rel="stylesheet" href="<?php echo URL ?>public/css/login.css">
<body class="align">

<div class="grid">

    <form id="signup_form_user" action="<?php echo URL ?>auth/login_user" method="POST" class="form login">
        <div class="signup-heading">Login as company</div>

        <div class="form__field">
            <input autocomplete="username" id="login__username" type="email" name="email" class="form__input"
                   placeholder="Email" required>
        </div>

        <div class="form__field">
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Password"
                   required>
        </div>

        <input type="text" name="type" value="company" hidden>

        <div class="form__field">
            <input type="submit" value="Sign In">
        </div>
    </form>

    <p class="text--center">you dont have account <a href="<?php echo URL . 'auth/companyregister' ?>"> Register now</a></p>
    <a class="btn btn-primary" href="<?php echo URL . 'auth/userlogin' ?>" role="button">login as user</a>
</div>

</body>