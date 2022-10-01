<?php include('page/auth.php'); ?>


<div class="main-body">
    <h3 class="title">Make payments</h3>

    <div class="row no-p password">
        <div class="col-xs-12 no-p box" style="height:200px;">
            <form action="payment2" method="POST">
                <div class="inner">
                    <p class="text">Select Company:</p>
                    <select name="companyId" required>
                        <option>Choose</option>
                        <?php 
                            $tblquery = "SELECT companies.name, companies.amt, payment.pmt_id FROM companies INNER JOIN payment ON companies.company_id = payment.com_id WHERE status != 'Paid'";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                                $_SESSION['company_name'] = $name;
                                ?>
                                <?php
                                echo "
                                    <option value='$pmt_id'>$name $amt</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
                <input type="submit" name="submit" class="submit-btn" value="Submit">
            </form>
        </div>
    </div>
</div>