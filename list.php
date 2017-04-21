 <?php
 $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "uwialumni";
    $conn = new mysqli($host,$username,$password,$database);
    function get($db){
        $student=[];
        $getsql="SELECT * FROM graduates Order by year_of_graduation DESC";
        $res=$db->query($getsql);
        if($res){
            $row=$res->fetch_array(MYSQLI_ASSOC);
            while($row!=null){
                $student[]=$row;
                $row=$res->fetch_array(MYSQLI_ASSOC);
            }
        }
        return $student;
    }
    $all=get($conn);
    display($all);
    
    function display($student){
        echo"<table border='1'>
        <thead>
        <tr><th>Year</th>
        <th>Graduate</th>
        </tr>
        </thead>
        <tbody>";
        $prev=0;
        foreach($student as $key=>$c){
        echo "<tr>";
        if($c['year_of_graduation']==$prev){
            echo "<td>"."</td>";
        }else{
        echo "<td>". $c['year_of_graduation']. "</td>";
        }
        echo "<td>". $c['first_name']." ". $c['last_name']."</td>";
        echo "</tr>";
        $prev=$c['year_of_graduation'];
	}
	echo "</table>";
    }
    
?>

</body>