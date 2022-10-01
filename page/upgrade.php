<div class="main-body">
    <h3 class="title">Upgrade Users</h3>

    <div class="row no-p row-box" style="padding:30px;">
        <div class="col-xs-12 no-p">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Upgrade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $tblquery = "SELECT * FROM users WHERE level != 'Admin' ORDER BY ln";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                                ?>
                                <?php
                                    echo "
                                        <tr>
                                            <td>$ln $fn</td>
                                            <td>$level</td>
                                            <td>
                                                <form action='upgrade2' method='POST' style='margin:0px;padding:0px;'>
                                                    <input type='hidden' name='id' value='$id'>
                                                    <input type='hidden' name='level' value='$level'>
                                                    <input type='submit' name='change' value='change' class='btn btn-info'>
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
<div>