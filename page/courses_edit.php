<div class="main-body">
    <h3 class="title">Courses</h3>
    <a class="btn btn-info" onclick="popupBitcoinCashWithdrawal()">Add Course</a>

    <div class="row no-p notification">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $tblquery = "SELECT * FROM courses ORDER BY title";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                                $string = substr($description, 0, 200)
                                ?>
                                <?php
                                    echo "
                                        <tr>
                                            <td>$title</td>
                                            <td>$string...</td>
                                            <td><img src='./upload/$image' width='45px' height='45px' title='Course Image' style='border-radius:50%;'></td>
                                            <td>N$amount</td>
                                            <td>$date</td>
                                            <td>
                                                <form action='courses_admin' method='POST'>
                                                    <input type='hidden' name='id' value='$course_id'>
                                                    <input type='submit' name='edit' class='btn btn-info btn-sm' value='edit'>
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
                <div class='container-fluid withdraw-popup-payment popup-bitcoin-cash-withdrawal'>
                    <div class='main-box' style='height:auto;margin-top:180px;'>
                        <div class='head' style='height:auto'>
                            <div class='row no-p'>
                                <div class='col-xs-11'>
                                    <h4>Edit Courses</h4>
                                </div>
                                <div class='col-xs-1 close' onclick='popupBitcoinCashWithdrawal()'>
                                    <a href='courses_admin'><h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4></a>
                                </div>
                            </div>
                        </div>
                        <div class='bottom' style='height:470px'>
                            <form action='courses_edit' method='POST' enctype='multipart/form-data'>
                                <input type='text' name='title' value='$title' required>
                                <input type='number' name='amt' value='$amount' required>
                                <input type='file' name='file'>
                                <input type='hidden' name='image' value='$image' required>
                                <textarea name='des'>$description</textarea>
                                <input type='submit' name='edit' class='btn' value='Submit'>
                            </form>
                        </div>
                    </div>
                </div>
            ";
    }

?>

<?php 

    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    if($_POST['edit']){
        extract($_POST);

        $pic = '';
        if($fileName == ''){
            $pic = $image;
        }else{
            $pic = $fileName;

            // Choose where to save the Upload File
            $location = "upload/".$fileName;

            // Save the uploaded File to the local file system
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
        }

        $tblquery = "UPDATE courses SET title = :title, description = :description, image = :image, amount = :amount WHERE course_id = '$_SESSION[course_id]'";
        $tblvalue = array(
            ':title' => htmlspecialchars(strtoupper($title)),
            ':description' => htmlspecialchars(ucfirst($des)),
            ':image' => htmlspecialchars($pic),
            ':amount' => htmlspecialchars($amt)
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/elearnpayment/courses_admin"; </script>';
        }
    }

?>