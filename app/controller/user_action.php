<?php
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
                    <?php
                    if( isset($_GET['del']) ) {
                        if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) && $_GET['id'] > 0 )
                        {
                            $id = $_GET['id'];
                            $sql = "DELETE FROM users WHERE id =$id";
                            $del = $conn->prepare($sql);
                            $del->execute();
                            if($del === true) {
                                echo "xóa thành công";
                            }
                            if( ! $del->rowCount() ) echo "Deletion failed";
                        }
                    }
                    ?>
                    <button id="butt" type="submit" name="edit">Sửa</button>
                </td>
        </tr>
        <?php
        }
    }
    

?>