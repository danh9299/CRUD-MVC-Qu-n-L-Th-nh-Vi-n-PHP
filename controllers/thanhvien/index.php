<?php

$controller = isset($_GET['controller'])?$_GET['controller']:'index';
$action     = isset($_GET['action'])?$_GET['action']:'index';

$noti_addnew = array();
switch($action){
    case 'add':{
        $name = '';
        if(isset($_POST['add_user'])){
            $hoten = $_POST['hoten'];
            $namsinh = $_POST['namsinh'];
            $quequan = $_POST['quequan'];
            $db->insertData($hoten, $namsinh, $quequan);
            $name = $hoten;
            
        }
        require_once('views/thanhvien/add_user.php');
        echo "<p style='color:pink; text-center'>Thêm thành công ".$name."</p>";
        break;
        
    } 
    case 'edit':{
        if(isset($_GET['id'])){
           
            $id = $_GET['id'];
            $tbl = "thanhvien";
            $datas = $db->getData($tbl,$id);

            if(isset($_POST['edit_user'])){
                $hoten = $_POST['hoten'];
                $namsinh = $_POST['namsinh'];
                $quequan = $_POST['quequan'];
                $db->updateData($id, $hoten, $namsinh, $quequan);
                header("location: index.php?action=list");
            }
        }
        
        require_once('views/thanhvien/edit_user.php');
        break;
    }
    case 'delete':{
        if(isset($_GET['id'])){
           
            $id = $_GET['id'];
            $tbl = "thanhvien";
            $datas = $db->getData($tbl,$id);
            
            if(isset($_POST['delete_user'])){
            $db->deleteData($id);
            header("location: index.php?action=list");
            };
        }


        require_once('views/thanhvien/delete_user.php');
        break;
    }
    case 'list':{
        $tbl = "thanhvien";
        $datas = $db->getAllData($tbl);

        require_once('views/thanhvien/list_user.php');
        break;
    }
    default:{
        $tbl = "thanhvien";
        $datas = $db->getAllData($tbl);
        require_once('views/thanhvien/list_user.php');
        break;
    }
}

//$controllerPath = 'controllers/thanhvien/'.$controller.'.php';

// if(!file_exists($controllerPath)){
//     die('Tệp tin không tồn tại');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điều hướng Controller</title>
</head>
<body>
    <p style="color: orange"><b>Lựa chọn chức năng theo yêu cầu:</b></p>
    <form  method="GET">
        <table>
            <tr>
                 <td><p2>Thêm thành viên mới: </p2></td>
                 <td><input type="submit" name="action" value="add"></td>
            </tr>
            <tr>
                <td><p2>Xem danh sách thành viên: </p2></td>
                <td><input type="submit" name="action" value="list"></td>
            </tr>
    </table>
    </form>
</body>
</html>
