<div class="main-body">
    <h3 class="title">Available Courses</h3>

    <div class="row no-p course" style="margin-top:50px;">

        <?php 
            $tblquery = "SELECT users.fn, users.ln, courses.title, courses.description,
            courses.image, courses.amount, courses.course_id, courses.date FROM users INNER JOIN courses ON users.id = courses.user_id WHERE courses.status = 'Unseen' ORDER BY courses.title";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                echo "
                    <div class='col-md-4 box no-p' style='height:600px;margin-bottom:20px;'>
                        <div class='box-inner no-p' style='height:600px;'>
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
                                <form action='approve' method='POST'>
                                    <input type='hidden' name='id' value='$course_id'>
                                    <input type='submit' name='approve' class='btn btn-primary' value='Preview'>
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

    if($_POST['approve']){
        extract($_POST);
        $_SESSION['course_id'] = $id;
        echo '<script> window.location="http://localhost/elearnpayment/approve_proceed"; </script>';
    }

?>
