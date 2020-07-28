    <!-- Nav-Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand"><?php echo ucfirst(APP_NAME); ?></span>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#nav-board"
                aria-controls="nav-board"
                aria-expanded="false"
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse"
                id="nav-board">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="<?php echo URL_ROOT; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#">NavLink</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-info">
                        <?php if(isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN'] == true):?>
                            <li class="nav-item">
                                <a
                                    class="nav-link mr-2 btn btn-outline-info"
                                    href="<?php echo URL_ROOT; ?>users/profile">
                                        <strong class="text-light">
                                            <span>Welcome, </span>
                                        </strong>
                                        <?php echo $_SESSION['USER_DATA']['name']; ?>
                                        <span> Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-outline-danger"
                                    href="<?php echo URL_ROOT; ?>users/logout">Logout</a>
                            </li>
                        <?php else:?>
                            <li class="nav-item">
                                <a
                                    class="nav-link mr-2 btn btn-outline-primary"
                                    href="<?php echo URL_ROOT; ?>users/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link btn btn-outline-success"
                                    href="<?php echo URL_ROOT; ?>users/register">Register</a>
                            </li>
                        <?php endif;?>
                    </ul>
            </div>
        </div>
    </nav>
    <!-- /Nav-Bar -->