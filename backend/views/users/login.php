<!DOCTYPE html>
<html class="bg-primary">

    <body class="bg-primary">
        <div class="row">
            <div class="col-4 col-xs-12">
                <div class="box box-light-blue">
                    <div class="box-header">
                        <div class="box-title signika">
                            <b>Login to your account</b>
                        </div>
                    </div>
                    <div class="box-body bg-white">
                        <form action="#" method="post">
                            <div class="form-group"> 
                                <div class="input-group">
                                    <span class="input-group-addon control"><i class="fa fa-user"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Email or Username"/>                                
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="input-group">
                                    <span class="input-group-addon control"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>                                
                                </div>
                            </div>                            
                            <div class="form-group">                                
                                <input type="checkbox" name="remember"/> Remember me
                            </div>
                            <div class="form-group">                                
                                <button type="submit" name="submit" class="btn-block btn btn-light-blue">Login</button>
                            </div>

                        </form>
                        <p class="account-option">
                            <a href="index.php?controller=login&action=register" class="register">Register</a>
                            <a href="index.php?controller=login&action=resetPassword" class="forgot-password">Forgot your password?</a>
                        </p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        
        <div class="clearfix"></div>
    </body>
</html>