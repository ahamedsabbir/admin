<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="app/view/admin_login/css/style.css" media="screen" />
</head>
    <body>
        <div class="container">
            <section id="content">
                <form action="<?php echo BASE_URL; ?>admin_login_controller_class/signup_function" method="post">
                    <h1>Sign Up</h1>
                    <div>
                        <input type="text" placeholder="username" required="" name="admin_name"/>
                    </div>
                    <div>
                        <input type="text" placeholder="email" required="" name="admin_email"/>
                    </div>
                    <div>
                        <input type="text" placeholder="mobile" required="" name="admin_mobile"/>
                    </div>
                    <div>
                        <input type="text" placeholder="password" required="" name="admin_password"/>
                    </div>
                    <div>
                        <input type="submit" value="Sign Up" name="sign_up"/>
                    </div>
		          </form>		       
		          <div class="button">
                    <a href="<?php echo BASE_URL."admin_login_page_controller_class/forget_password_function";?>">Forget Password</a>
                    <a href="<?php echo BASE_URL."admin_login_page_controller_class";?>">Log In</a>
		          </div>
            </section>
        </div>
    </body>
</html>