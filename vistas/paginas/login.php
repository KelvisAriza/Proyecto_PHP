<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>CUL</b> BIENESTAR UNIVERSITARIO</a>
        </div>
        

        <div class="login-box-body">
            <p class="login-box-msg">Login</p>

            <form method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="log_user" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="log_pass" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ingresar</button>
                    </div>
                    
                </div>

                <?php 


                $ingreso=new ctrUsuarios();
                $ingreso->ctrIngresoUsuarios();


                ?>
            </form>
        </div>
    </div>
</body>

</html>