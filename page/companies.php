<div class="main-body">
    <h3 class="title">Companies</h3>
    <a class="btn btn-info" onclick="popupBitcoinCashWithdrawal()">Add Company</a>

    <div class="row no-p notification">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $tblquery = "SELECT * FROM companies ORDER BY name";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                                ?>
                                <?php
                                    if($_SESSION['level'] == 'User'){
                                        echo "
                                            <tr>
                                                <td>$name</td>
                                                <td>$email</td>
                                                <td>$p_number</td>
                                                <td>$location</td>
                                                <td>N$amt</td>
                                                <td>$date</td>
                                            </tr>
                                        ";
                                    }else{
                                        echo "
                                            <tr>
                                                <td>$name</td>
                                                <td>$email</td>
                                                <td>$p_number</td>
                                                <td>$location</td>
                                                <td>N$amt</td>
                                                <td>$date</td>
                                                <td>
                                                    <form action='companies' method='POST'>
                                                        <input type='hidden' name='id' value='$company_Id'>
                                                        <input type='submit' name='edit' class='btn btn-primary' value='edit'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                    
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bitcoin Cash -->
<div class="container-fluid withdraw-popup popup-bitcoin-cash-withdrawal">
    <div class="main-box" style="height:auto;margin-top:180px;">
        <div class="head" style="height:auto">
            <div class="row no-p">
                <div class="col-xs-11">
                    <h4>Add Company</h4>
                </div>
                <div class="col-xs-1 close" onclick="popupBitcoinCashWithdrawal()">
                    <h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4>
                </div>
            </div>
        </div>
        <div class="bottom" style="height:470px">
            <form action="companies" method="POST">
                <input type="text" name="name" placeholder="Enter Company Name" required>
                <input type="email" name="email" placeholder="Enter Company Email" required>
                <input type="text" name="number" placeholder="Enter Company Phone No" required>
                <input type="text" name="location" placeholder="Enter Company Location" required>
                <input type="number" name="amt" placeholder="Enter Revenue Amount" required>
                <input type="submit" name="submit" class="btn" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php 

    if($_POST['submit']){
        extract($_POST);

        $tblquery = "INSERT INTO companies VALUES(:company_Id, :name, :email, :p_number, :location, :amt, :date)";
        $tblvalue = array(
            ':company_Id' => null,
            ':name' => htmlspecialchars(ucwords($name)),
            ':email' => htmlspecialchars($email),
            ':p_number' => htmlspecialchars($number),
            ':location' => htmlspecialchars(ucwords($location)),
            ':amt' => htmlspecialchars($amt),
            ':date' => date("Y-m-d")
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
            $tblvalue = array(
                ':not_id' => null,
                ':user_id' => $_SESSION['myId'], 
                ':msg' => "added a company, '$name' to the platform",
                ':time' => date('h:i:s'),
                ':time2' => time(),
                ':date' => date("Y-m-d")
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            echo '<script> window.location="http://localhost/activitylog/companies"; </script>';
        }else{
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-dark text-center' role='alert'>
                    An error occur while performing this task.
                </div>
            ";
        }
    }

?>

<?php 

    if($_POST['edit']){
        extract($_POST);
        $_SESSION['company_id'] = $id;
        echo '<script> window.location="http://localhost/activitylog/companies_edit"; </script>';
    }

?>