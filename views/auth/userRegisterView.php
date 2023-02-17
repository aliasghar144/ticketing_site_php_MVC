<link rel="stylesheet" href="<?php echo URL ?>/public/css/userregister.css">
<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Register as User</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form method="post" action="<?php echo URL ?>auth/register_user" id="signup_form_student">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="fullname" placeholder="FullName" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-mobile"></i></span>
                        <input type="text" name="mobile" placeholder="Mobile" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="duplicate_password" placeholder="Re-type Password" required />
                    </div>

                    <input type="text" name="type" value="user" hidden>
                    <input class="button" type="submit" value="Register" />
                </form>
            </div>
        </div>
    </div>
</div>