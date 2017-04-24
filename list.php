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
        
        $prev=0;
        foreach($student as $key=>$c){
       
        if($c['year_of_graduation']==$prev){
             echo  "<li>".  $c['first_name']." ". $c['last_name']. "</li>";
        }else{
            echo $c['year_of_graduation'];
            echo "<li>". $c['first_name']." ". $c['last_name']."</li>";
        }
       
        $prev=$c['year_of_graduation'];
	}
    
    }
    
?>

<style >
    li {
        list-style-type: none;
        background:white;
        margin-left: 20px;
        padding:2px

    }
    </style>
