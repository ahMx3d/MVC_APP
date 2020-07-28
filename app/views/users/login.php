<!-- Header -->
<?php include_once('..\app\views\includes\header.inc.php');?>
    <!-- Row -->
    <div class="row">
        <!-- Col-6 -->
        <div class="col-md-8 mx-auto mt-5">
            <!-- Display Messages -->
            <?php System::displayMsg();?>
            <!-- Card -->
            <div class="card card-body p-3 log-box">
                <!-- Heading -->
                <h2 class="text-center">User Login</h2>
                <!-- <span class="mb-2 text-center">Please fill in the needed info to log with your account</span> -->
                <!-- Reg Form -->
                <form
                    action="<?php echo URL_ROOT; ?>users/login"
                    method="POST">
                        <!-- Reg Email -->
                        <div class="form-group">
                            <label for="log-mail">Email <sup>*</sup></label>
                            <input
                                type="email"
                                name="log-mail"
                                id="log-mail"
                                class="form-control form-control-lg 
                                <?php echo (!empty($data['merr'])? 'is-invalid': ''); ?>
                                <?php echo (!empty($data['mail']&& empty($data['merr']))? 'is-valid': ''); ?>"
                                value="<?php echo $data['mail']; ?>"
                                placeholder="Type Your Email:"
                                aria-describedby="log-mail-help" />
                            <?php if (empty($data['merr'])):?>
                            <small id="log-mail-help" class="text-muted pull-right">User Registered Email</small>
                            <?php endif;?>
                            <span class="invalid-feedback"><?php echo $data['merr']; ?></span>
                        </div>
                        <!-- /Reg Email -->
                        <!-- Reg Password -->
                        <div class="form-group">
                            <label for="log-pass">Password <sup>*</sup></label>
                            <input
                                type="password"
                                name="log-pass"
                                id="log-pass"
                                class="form-control form-control-lg <?php echo (!empty($data['perr'])? 'is-invalid': ''); ?>"
                                autocomplete="new-password"
                                value="<?php echo $data['pass']; ?>"
                                placeholder="Type Your Password:"
                                aria-describedby="log-pass-help" />
                            <?php if (empty($data['perr'])):?>
                            <small id="log-pass-help" class="text-muted pull-right">User Registered Password</small>
                            <?php endif;?>
                            <span class="invalid-feedback"><?php echo $data['perr']; ?></span>
                        </div>
                        <!-- /Reg Password -->
                        <input
                            type="submit"
                            value="Login"
                            name="log-submit"
                            id="log-submit"
                            class="btn btn-primary" />
                        <a
                            href="<?php echo URL_ROOT; ?>users/register"
                            class="text-success">Haven't an account? Register</a>
                </form>
                <!-- /Reg Form -->
            </div>
            <!-- /Card -->
        </div>
        <!-- /Col-6 -->
    </div>
    <!-- /Row -->
<!-- Footer -->
<?php include_once('..\app\views\includes\footer.inc.php');?>