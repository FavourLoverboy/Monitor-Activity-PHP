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
                                                    <input type='submit' class='btn btn-primary' value='edit'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bitcoin Cash -->
<div class="container-fluid withdraw-popup popup-bitcoin-cash-withdrawal" style="display:block;">
    <div class="main-box" style="height:auto;margin-top:180px;">
        <div class="head" style="height:auto">
            <div class="row no-p">
                <div class="col-xs-11">
                    <h4>Edit Company Info</h4>
                </div>
                <div class="col-xs-1 close">
                    <h4>
                        <a href="companies">
                            <span><i class='fa fa-times' aria-hidden='true'></i></span>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="bottom" style="height:470px">
            <form action="companies_edit" method="POST">
                <?php
                    $tblquery = "SELECT * FROM companies WHERE company_Id = '$_SESSION[company_id]'";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                            echo "
                                <input type='text' name='name' value='$name' required>
                                <input type='email' name='email' value='$email' required>
                                <input type='text' name='number' value='$p_number' required>
                                <input type='text' name='location' value='$location' required>
                                <input type='number' name='amt' value='$amt' required>
                                <input type='submit' name='submit' class='btn' value='Submit'>
                            ";
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<?php 

    if($_POST['submit']){
        extract($_POST);

        $tblquery = "UPDATE companies SET name = :name, email = :email, p_number = :p_number, location = :location, amt = :amt WHERE company_Id = '$_SESSION[company_id]'";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($name)),
            ':email' => htmlspecialchars($email),
            ':p_number' => htmlspecialchars($number),
            ':location' => htmlspecialchars(ucwords($location)),
            ':amt' => htmlspecialchars($amt)
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
            $tblvalue = array(
                ':not_id' => null,
                ':user_id' => $_SESSION['myId'], 
                ':msg' => "'$name' was updated",
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
        $_SESSION['course_id'] = $id;
        echo '<script> window.location="http://localhost/elearnpayment/courses_edit"; </script>';
    }

?>