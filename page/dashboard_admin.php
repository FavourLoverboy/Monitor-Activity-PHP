<div class="main-body">
    <h3 class="title">Welcome, <?php echo $_SESSION['fn'];?>!</h3>

    <?php 
    
        echo $_SESSION['logins'];
        
    ?>

    <div class="dashboard-main-body">
        <div class="row dashboard-main-row combine">
            <div class="col-md-9">
                <div class="inner-left">
                    <div>
                        <h3 class="title-3">Overview</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 right">
                <div class="inner-right">
                    <div>
                        <h3 class="title-3">Notification Log</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dashboard-main-row combine-2">
            <div class="col-md-9">
                <div class="inner-left">
                    <div style="padding: 5px;">
                        <div class="row dashboard-main-row">
                            <div class="col-md-4 dashboard-box1">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(id) as total FROM users WHERE level != 'Admin'";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            echo "
                                                                <div class='col-xs-12 top'>Users</div>
                                                                <div class='col-xs-12 down'>$total</div>
                                                            ";
                                                        }
                                                    ?>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box2">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:green;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(id) as total FROM users WHERE level = 'Manager'";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Manager</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box3">
                                <div class="dashboard-box-inner1" style="background: #22242A;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:pink;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(id) as total FROM users WHERE level = 'User'";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Cashier</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dashboard-main-row" style="margin-top: 0.5%;">
                            <div class="col-md-4 dashboard-box4">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:blue;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(id) as total FROM users WHERE level != 'Admin' AND status = 'Active'";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Active</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box2">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:green;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(id) as total FROM users WHERE status != 'Active'";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Suspend</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box3">
                                <div class="dashboard-box-inner1" style="background: #22242A;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:pink;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(company_Id) as total FROM companies";
                                                        $tblvalue = array();
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Companies</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dashboard-main-row" style="margin-top: 0.5%;">
                            <div class="col-md-4 dashboard-box4">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:blue;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $todaysDate = date("Y-m-d");
                                                        $date = substr($todaysDate, 0, 7);
                                                        $tblquery = "SELECT count(pmt_id) as total FROM payment WHERE date = :date AND status = :status";
                                                        $tblvalue = array(
                                                            ':date' => $date, 
                                                            ':status' => 'Paid' 
                                                        );
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Paid</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box2">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:green;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $todaysDate = date("Y-m-d");
                                                        $date = substr($todaysDate, 0, 7);
                                                        $tblquery = "SELECT count(pmt_id) as total FROM payment WHERE status != :status AND date = :date";
                                                        $tblvalue = array(
                                                            ':status' => 'Paid',
                                                            ':date' => $date
                                                        );
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Not Paid</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 dashboard-box3">
                                <div class="dashboard-box-inner1" style="background: #22242A;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span style="color:pink;"><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(user_id) as total FROM payment WHERE balanced = :balanced AND paid_date = :paid_date";
                                                        $tblvalue = array(
                                                            ':balanced' => "Collected",
                                                            ':paid_date' => date('Y-m-d')
                                                        );
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Collected</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dashboard-main-row" style="margin-top: 0.5%;">
                        <div class="col-md-4 dashboard-box1">
                                <div class="dashboard-box-inner1" style="background: #22242A;width:98%;">
                                    <div class="row">
                                        <div class="col-xs-3 icon-box">
                                            <span><i class="fa fa-download" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-xs-9 parent-text-box">
                                            <div class="text-box">
                                                <div class="row">
                                                    <?php
                                                        $tblquery = "SELECT count(user_id) as total FROM payment WHERE balanced = :balanced AND paid_date = :paid_date";
                                                        $tblvalue = array(
                                                            ':balanced' => "Not",
                                                            ':paid_date' => date('Y-m-d')
                                                        );
                                                        $select = $collect->tbl_select($tblquery, $tblvalue);
                                                        foreach($select as $data){
                                                            extract($data);
                                                            ?>
                                                            <?php
                                                                echo "
                                                                    <div class='col-xs-12 top'>Not Collected</div>
                                                                    <div class='col-xs-12 down'>$total</div>
                                                                ";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="inner-right">
                    <div style="margin:4px;margin-top:0px" id="refresh-admin-notification-log">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
