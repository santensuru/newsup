
<!-- Navigation -->
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav class="navigation-left">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </nav>
                    <nav class="navigation-right">
                        <li>
                            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <!-- <a href="#!" data-toggle="modal" data-target="#Login">Login</a> -->
                            <?php if ($is_login) {
                                ?>
                                    <a href="<?php echo base_url(); ?>home/logout"> Logout </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <a href="#" data-toggle="modal" data-target="#Login"> Login </a>
                                <?php
                            }
                            ?>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Login" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('home/login'); ?>
                        <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username"  required="required">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwd" class="form-control" id="pwd"  required="required">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>              
                </div>
                <div class="modal-footer">
                    <a href="#!" data-toggle="modal" data-target="#Register" data-dismiss="modal">Tidak punya akun ?</a>
                    <button type="submit" class="btn btn-default">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $('#Login').modal('show');
    </script>

    <div class="modal fade" id="Register" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register</h4>
                </div>
                <div class="modal-body">
                     <?php echo form_open('home/register'); ?>
                        <div class="radio">
                            <label><input type="radio" name="typeuser" required="required" value="0">Jurnalis</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="typeuser" required="required" value="1">Umum</label>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" name="password" class="form-control" id="pwd" required="required">
                        </div>
                </div>
                <div class="modal-footer">
                        <a href="#!" data-toggle="modal" data-target="#Login" data-dismiss="modal">Sudah punya akun ?</a> <button type="submit" class="btn btn-default">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">NewsUp</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse no-padding-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-right">
                    <li>
                        <a href="<?php echo base_url('home/index')?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('berita/index')?>">Berita</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('kolaborasi/index')?>">Karya</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('aspirasi/index')?>">Aspirasi Masyarakat</a>
                    </li>
                    <li>
                        <a href="#">Live</a>
                    </li>
                </ul>
            </div>
            <hr class="no-margin">
        </div>
    </nav>