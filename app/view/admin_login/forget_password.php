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
                <form action="<?php echo BASE_URL; ?>admin_login_page_controller_class/update_password_function" method="post">
                    <h1>If Forget</h1>
                    <div>
                        <input type="text" placeholder="Admin Name" required="" name="name"/>
                    </div>
                    <div>
                        <input type="password" placeholder="Old Password" required="" name="old_password"/>
                    </div>
                    <div>
                        <input type="password" placeholder="New Password" required="" name="new_password"/>
                    </div>
                    <div>
                        <input type="submit" value="Change" name="Change"/>
                    </div>
		          </form>
		          <div class="button">
                      <a href="<?php echo BASE_URL."admin_login_page_controller_class";?>">Log In</a>
                    <a href="<?php echo BASE_URL."admin_login_page_controller_class/signup_function";?>">sign up</a>
		          </div>
            </section>
        </div>
    </body>
</html>