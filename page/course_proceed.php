<div class="main-body">
    <h3 class="title">Available Courses</h3>

    <div class="row no-p course" style="margin-top:50px;">

        <?php 
        
            $tblquery = "SELECT users.fn, users.ln, courses.title, courses.description,
            courses.image, courses.amount, courses.course_id, courses.date FROM users INNER JOIN courses ON users.id = courses.user_id WHERE courses.status = 'Seen' ORDER BY courses.title";
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
                            <div class='head'>
                                Author: $ln $fn
                            </div>
                            <div class='body'>
                                <img src='./upload/$image' title='course-image'>
                            </div>
                            <div class='head'>
                                $date
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
        
    $tblquery = "SELECT users.fn, users.ln, courses.title, courses.description,
    courses.image, courses.amount, courses.course_id, courses.date FROM users INNER JOIN courses ON users.id = courses.user_id WHERE courses.course_id = '$_SESSION[course_id]'";
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
                                <a href='course'><h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class='bottom' style='height:400px'>
                        <form action='course_proceed' method='POST'>
                            <div style='text-align:center;'>
                                <img src='./upload/$image' height='50px' width='50px' title='course_image' style='border-radius:50%;margin:5px;'>
                            </div>
                            <textarea>$string</textarea>
                            <input type='text' name='amt' value='N$amount' required>
                            <input type='submit' name='approve' class='btn' value='Enroll'>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }

?>

