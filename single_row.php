<!-- <//?php 
    $sql = "SELECT * FROM leaderboard WHERE user_id = '$key[user_id]'";
    $info = $DB->read($sql)[0];
    
?> -->
<tr>
    <th><?php echo $i + 1 ?></th>
    <td><b><?php echo $result[$i]['username']?></b></td>
    <?php $date = explode("-",$result[$i]['date'])?>
    <td><?php echo $date[1] . "/" . $date[2]?></td>
    <td><?php echo $result[$i]['score']?></td>
</tr>