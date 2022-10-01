<div class="main-body">
    <h3 class="title">Courses</h3>
    <a class="btn btn-info" onclick="popupBitcoinCashWithdrawal()">Add Course</a>

    <div class="row no-p notification">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Course Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $tblquery = "SELECT users.fn, users.ln, courses.title, courses.description,
                            courses.image, courses.amount, courses.course_id, courses.date FROM users INNER JOIN courses ON users.id = courses.user_id WHERE courses.status = 'Seen' ORDER BY courses.title";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                                $string = substr($description, 0, 200)
                                ?>
                                <?php
                                    echo "
                                        <tr>
                                            <td>$ln $fn</td>
                                            <td>$title</td>
                                            <td>$string...</td>
                                            <td><img src='./upload/$image' width='45px' height='45px' title='Course Image' style='border-radius:50%;'></td>
                                            <td>N$amount</td>
                                            <td>$date</td>
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
<div class="container-fluid withdraw-popup popup-bitcoin-cash-withdrawal">
    <div class="main-box" style="height:auto;margin-top:180px;">
        <div class="head" style="height:auto">
            <div class="row no-p">
                <div class="col-xs-11">
                    <h4>Add Courses</h4>
                </div>
                <div class="col-xs-1 close" onclick="popupBitcoinCashWithdrawal()">
                    <h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4>
                </div>
            </div>
        </div>
        <div class="bottom" style="height:470px">
            <form action="courses_admin" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Course Title" required>
                <input type="number" name="amt" placeholder="Course Amount" required>
                <input type="file" name="file" required>
                <textarea name="des" placeholder="Course Description"></textarea>
                <input type="submit" name="submit" class="btn" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php 

    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    // Choose where to save the Upload File
    $location = "upload/".$fileName;

    // Save the uploaded File to the local file system
    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    // Upload Image Name to DataBase
    if($_POST['submit']){
        extract($_POST);

        $tblquery = "INSERT INTO courses VALUES(:id, :user_id, :title, :description, :image, :amount, :course_id, :date, :status)";
        $tblvalue = array(
            ':id' => null,
            ':user_id' => $_SESSION['myId'],
            ':title' => htmlspecialchars(strtoupper($title)),
            ':description' => htmlspecialchars(ucfirst($des)),
            ':image' => htmlspecialchars($fileName),
            ':amount' => htmlspecialchars($amt),
            ':course_id' => time(),
            ':date' => date("Y-m-d"),
            ':status' => 'Unseen'
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/elearnpayment/courses_admin"; </script>';
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