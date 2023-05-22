<h1>Danh sách thành viên</h1>
<div class="danhsach">
    <table border="1px">
        <thead>
        <tr>
            <th>STT</th>
            <th>Họ Tên</th>
            <th>Năm Sinh</th>
            <th>Quê Quán</th>
            <th>Hành Động</th>
            
        </tr>
        </thead>
        <tbody>
        <?php foreach($datas as $data){?>
        <tr>
            <td><?=$data[0]?></td>
            <td><?=$data[1]?></td>
            <td><?=$data[2]?></td>
            <td><?=$data[3]?></td>
            <td>
                <a href="index.php?action=edit&id=<?=$data[0]?>">Sửa</a>
                <a href="index.php?action=delete&id=<?=$data[0]?>">Xóa</a>
            </td>
        
        </tr>
        </tbody>
        <?php }?>
    </table>
</div>