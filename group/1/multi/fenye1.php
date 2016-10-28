<?php
/**
 * User: zhang
 * Date: 10/28/16
 * Time: 8:55 PM
 */
$num_rec_per_page=1;   // 每页显示数量
mysql_connect('localhost','zhang','zhang');  // 数据库连接
mysql_select_db('learning');  // 数据库名
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $num_rec_per_page;
$sql = "SELECT * FROM activity LIMIT $start_from, $num_rec_per_page";
$rs_result = mysql_query ($sql); // 查询数据
?>
    <table>
        <tr><td>Name</td><td>Phone</td></tr>
        <?php
        while ($row = mysql_fetch_assoc($rs_result)) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>
            <?php
        };
        ?>
    </table>
<?php
$sql = "SELECT * FROM activity";
$rs_result = mysql_query($sql); //查询数据
$total_records = mysql_num_rows($rs_result);  // 统计总共的记录条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

echo "<a href='hello1.php?page=1'>".'|<'."</a> "; // 第一页

for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='hello1.php?page=".$i."'>".$i."</a> ";
};
echo "<a href='hello1.php?page=$total_pages'>".'>|'."</a> "; // 最后一页
?>