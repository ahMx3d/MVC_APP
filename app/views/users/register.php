<!-- Header -->
<?php include_once('..\app\views\includes\header.inc.php');?>
    <!-- Row -->
    <div class="row">
        <!-- Col-6 -->
        <div class="col-md-7 mx-auto mt-4 mb-4">
            <!-- Display Messages -->
            <?php System::displayMsg();?>
            <!-- Card -->
            <div class="card card-body p-3 reg-box">
                <!-- Heading -->
                <h2>Create Account</h2>
                <span class="mb-2 text-center">Please fill in the needed info to create your account</span>
                <!-- Reg Form -->
                <form
                    action="<?php echo URL_ROOT; ?>users/register"
                    method="POST">
                        <!-- Reg Name -->
                        <div class="form-group">
                            <label for="reg-name">Name <sup>*</sup></label>
                            <input
                                type="text"
                                name="reg-name"
                                id="reg-name"
                                class="form-control form-control-lg 
                                <?php echo (!empty($data['nerr'])? 'is-invalid': ''); ?> 
                                <?php echo (!empty($data['name']&& empty($data['nerr']))? 'is-valid': ''); ?>"
                                value="<?php echo $data['name']; ?>"
                                placeholder="Registeration Name:"
                                aria-describedby="reg-name-help" />
                            <?php if (!empty($data['nerr'])):?>
                                <span class="invalid-feedback"><?php echo $data['nerr']; ?></span>
                            <?php elseif (!empty($data['name'])):?>
                                <span class="valid-feedback">Valid User Input</span>
                            <?php endif;?>
                            <?php if (empty($data['name'])&& empty($data['nerr'])):?>
                                <small id="reg-name-help" class="text-muted pull-right">Name Must be Valid</small>
                            <?php endif;?>
                        </div>
                        <!-- /Reg Name -->
                        <!-- Reg Email -->
                        <div class="form-group">
                            <label for="reg-mail">Email <sup>*</sup></label>
                            <input
                                type="email"
                                name="reg-mail"
                                id="reg-mail"
                                class="form-control form-control-lg <?php echo (!empty($data['merr'])? 'is-invalid': ''); ?>"
                                value="<?php echo $data['mail']; ?>"
                                placeholder="Registeration Email:"
                                aria-describedby="reg-mail-help" />
                            <?php if (empty($data['merr'])):?>
                            <small id="reg-mail-help" class="text-muted pull-right">Email Must be Valid</small>
                            <?php endif;?>
                            <span class="invalid-feedback"><?php echo $data['merr']; ?></span>
                        </div>
                        <!-- /Reg Email -->
                        <!-- Reg Password -->
                        <div class="form-group">
                            <label for="reg-pass">Password <sup>*</sup></label>
                            <input
                                type="password"
                                name="reg-pass"
                                id="reg-pass"
                                class="form-control form-control-lg <?php echo (!empty($data['perr'])? 'is-invalid': ''); ?>"
                                autocomplete="new-password"
                                value="<?php echo $data['pass']; ?>"
                                placeholder="Type Your Password:"
                                aria-describedby="reg-pass-help" />
                            <?php if (empty($data['perr'])):?>
                            <small id="reg-pass-help" class="text-muted pull-right">Password should be strong</small>
                            <?php endif;?>
                            <span class="invalid-feedback"><?php echo $data['perr']; ?></span>
                        </div>
                        <!-- /Reg Password -->
                        <!-- Reg Confirmation -->
                        <div class="form-group">
                            <label for="reg-conf">Confirm <sup>*</sup></label>
                            <input
                                type="password"
                                name="reg-conf"
                                id="reg-conf"
                                class="form-control form-control-lg <?php echo (!empty($data['cerr'])? 'is-invalid': ''); ?>"
                                autocomplete="new-password"
                                value="<?php echo $data['conf']; ?>"
                                placeholder="Confirm Your Password:"
                                aria-describedby="reg-conf-help" />
                            <?php if (empty($data['cerr'])):?>
                            <small id="reg-conf-help" class="text-muted pull-right">Must be Identical</small>
                            <?php endif; ?>
                            <span class="invalid-feedback"><?php echo $data['cerr']; ?></span>
                        </div>
                        <!-- /Reg Confirmation -->
                        <input
                            type="submit"
                            value="Register"
                            name="reg-submit"
                            id="reg-submit"
                            class="btn btn-success" />
                        <a
                            href="<?php echo URL_ROOT; ?>users/login"
                            class="text-primary">Have an account? Login</a>
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