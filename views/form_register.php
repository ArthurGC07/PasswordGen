<?php $o = new form_model();?>

<body style="background-color: #212529;">
<!--End Navbar-->

<table id="table_main" style="margin-top: 5%">
        <tr>
            <td style="width: 100%">
                <div id="login">
                    <form class = 'formulario' method = 'POST' action = 'form.php'>
                        <div class="mb-3">
                            <label class="form-label">App Name</label><br>
                            <input required class="form-control" type = 'text' name = 'name' placeholder = 'App Name' value="<?php echo @$o->filled_form()['nm_app'];?>">
                            <input hidden class="form-control" type = 'number' name = 'id' value="<?php echo @$o->filled_form()['id_pw'];?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Login</label><br>
                            <input required class="form-control" type = 'text' name = 'login' placeholder = 'App Login' value="<?php echo @$o->filled_form()['app_login'];?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Size</label><br>
                            <input class="form-control" type = 'number' name = 'length' placeholder = 'Password length'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Already have a password?</label><br>
                            <input class="form-control" type = 'text' name = 'pw_exists' placeholder = 'Type your password' value="<?php echo @$o->filled_form()['pw'];?>">
                        </div>
                        <a href="user_home.php" class="btn btn-primary btn-sm">Back</a>
                        <input type="submit" class="btn btn-primary btn-sm" value="Save" />
                    </form><br>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>