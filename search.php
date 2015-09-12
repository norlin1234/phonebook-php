<?php 
    
    include('connection.inc.php');
    if (isset($_GET['name'])) {
        $data = "%".$_GET['name']."%";
        $sql = 'SELECT * FROM admin_users WHERE reg_name like ? or email_id like ? or mobile like ?';
        $stmt = $dbConnection->prepare($sql);
        $results = $stmt->execute(array($data, $data, $data));
        $rows = $stmt->fetchAll();
    }
    if(empty($rows)) {
        echo "<tr>";
            echo "<td colspan='4'>There were no records matching</td>";
        echo "</tr>";
    }
    else {
			echo "<thead style='background-color: #575656;
    color: #fff;'>";
				echo "<td>Reg_Name</td>";
                echo "<td>Email</td>";
                echo "<td>Mobile</td>";
				echo "<td>Username</td>";
				echo "<td>Password</td>";
				echo "<td>Ip</td>";
				echo "<td>Profile Pic</td>";
            echo "</thead>";
        foreach ($rows as $row) {
            echo "<tr>";
                echo "<td>".$row['reg_name']."</td>";
                echo "<td>".$row['email_id']."</td>";
                echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['password']."</td>";
				echo "<td>".$row['ip']."</td>";
				echo "<td>".$row['profile_pic']."</td>";
            echo "</tr>";
        }
    }

?>