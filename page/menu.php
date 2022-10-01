<div class="side-menu-wrapper">
    <div class="dropdown-box-username">
        <div class="username" onclick="toggleDropDownBoxUsername()">
            <div class="left">
                <?php echo $_SESSION['fn'];?>
            </div>
            <div class="right">
                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="dropdown">
            <a href="profile">Account Setting</a>
        </div>
    </div>
</div>

<?php 
    if($_SESSION['level'] === 'User'){
        echo "
            <div class='side-menu-navigation-mobile'>
                <a href='companies'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Companies</span>
                        </div>
                    </div>
                </a>
                <a href='dashboard'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Dashboard</span>
                        </div>
                    </div>
                </a>
                <a href='payment'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Payment</span>
                        </div>
                    </div>
                </a>
            </div>
        ";
    }else if($_SESSION['level'] === 'Admin'){
        echo "
            <div class='side-menu-navigation-mobile'>
                <a href='balance_account'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Balance Account</span>
                        </div>
                    </div>
                </a>
                <a href='companies'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Companies</span>
                        </div>
                    </div>
                </a>
                <a href='registration.php'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Create User</span>
                        </div>
                    </div>
                </a>
                <a href='dashboard_Admin'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Dashboard</span>
                        </div>
                    </div>
                </a>
                <a href='payment'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Payment</span>
                        </div>
                    </div>
                </a>
                <a href='suspend'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Suspend</span>
                        </div>
                    </div>
                </a>
                <a href='upgrade'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Upgrade</span>
                        </div>
                    </div>
                </a>
            </div>
        ";
    }else if($_SESSION['level'] === 'Manager'){
        echo "
            <div class='side-menu-navigation-mobile'>
                <a href='balance_account'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Balance Account</span>
                        </div>
                    </div>
                </a>
                <a href='companies'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Companies</span>
                        </div>
                    </div>
                </a>
                <a href='registration.php'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Create User</span>
                        </div>
                    </div>
                </a>
                <a href='dashboard_mini'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Dashboard</span>
                        </div>
                    </div>
                </a>
                <a href='payment'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Payment</span>
                        </div>
                    </div>
                </a>
                <a href='suspend'>
                    <div class='row navigator'>
                        <div class='col-xs-3 icon'>
                            <span><i class='fa fa-home' aria-hidden='true'></i></span>
                        </div>
                        <div class='col-xs-9 navigator-text'>
                            <span>Suspend</span>
                        </div>
                    </div>
                </a>
            </div>
        ";
    }
?>