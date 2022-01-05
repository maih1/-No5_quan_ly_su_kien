<?php
    require_once '../view/UserSearchView.php';
    require_once '../model/user.php';

    function userSearch(){
        global $_query, $classify, $d_count;
        
        if(isset($_GET['search'])){
            foreach ($_query as $row) { ?>
            <tr>
                    <td id="td1"><?php echo $row['id']; ?></td>
                    <td id="td2"><?php echo $row['name']; ?></td>
                    <td id="td3"><?php
                        foreach ($classify as $k => $v) {
                            if($row['type'] == $k){
                                echo "$v", PHP_EOL;  
                            }
                        }
                        ?></td>
                    <td id="td3"><?php echo $row['description']; ?></td>
                    <td id="td">
                        <button id="butt" type="submit" name="del">Xóa</button>
                        <button id="butt" type="submit" name="edit">Sửa</button>
                    </td>
            </tr>
            <?php
            }
        }
        if(isset($_GET['del'])) {
                //if($del === true) {
                    echo "xóa thành công";
                    header("location: ../view/user_search_view.php");
                //}
                if( !$d_count) echo "Deletion failed";
        }
    }
?>