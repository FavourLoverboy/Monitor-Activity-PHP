<div class="main-body">
    <h3 class="title">Available Courses</h3>

    <div class="row no-p course" style="margin-top:50px;">

        <?php 
        
            $tblquery = "SELECT * FROM courses ORDER BY title";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                echo "
                    <div class='col-md-4 box no-p' style='margin-bottom:20px;'>
                        <div class='box-inner no-p'>
                            <div class='head'>
                                $title
                            </div>
                            <div class='body'>
                                <img src='./upload/$image' title='course-image'>
                            </div>
            
                            <div class='col-xs-6 no-p btn'>
                                <form action='course' method='POST'>
                                    <input type='hidden' name='id' value='$course_id'>
                                    <input type='submit' name='register' class='btn btn-primary' value='Register For Course'>
                                </form>
                            </div>
                        </div>
                    </div>
                ";
            }
        
        ?>

    </div>
</div>

<?php 

    if($_POST['register']){
        extract($_POST);
        $_SESSION['course_id'] = $id;
        echo '<script> window.location="http://localhost/elearnpayment/courses_proceed"; </script>';
    }

?>
<!-- ========== Popup Area ========== -->
<?php 
        
    $tblquery = "SELECT * FROM courses WHERE course_id = '$_SESSION[course_id]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
        $string = substr($description, 0, 1000)
        ?>
        <?php
        echo "
            <div class='container-fluid withdraw-popup-payment popup-bank-withdrawal'>
                <div class='main-box' style='height:auto;margin-top:180px;'>
                    <div class='head' style='height:auto'>
                        <div class='row no-p'>
                            <div class='col-xs-11'>
                                <h4>$title</h4>
                            </div>
                            <div class='col-xs-1 close' onclick='popupBankWithdrawal()'>
                                <a href='approve'><h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class='bottom' style='height:400px'>
                        <form action='approve_proceed' method='POST'>
                            <div style='text-align:center;'>
                                <img src='./upload/$image' height='50px' width='50px' title='course_image' style='border-radius:50%;margin:5px;'>
                            </div>
                            <textarea>$string</textarea>
                            <input type='text' name='amt' value='N$amount' required>
                            <input type='submit' name='approve' class='btn' value='Approve'>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }

?>

<?php
    if($_POST['approve']){
        extract($_POST);

        $tblquery = "UPDATE courses SET status = :status WHERE course_id = :id";
        $tblvalue = array(
            ':status' => 'Seen',
            ':id' => $_SESSION['course_id']
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
    
        echo '<script> window.location="http://localhost/elearnpayment/approve"; </script>';
       
    }
?>