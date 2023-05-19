<?php
include("defaults.php");

class Exam{
    
    private $id;
    private $name;
    private $creator;
    private $legal_time;
    private $date_created;
    
    function db_connect($token){
        $defaults = new Defaults;
        $defaults->set($token);
        $data = $defaults->get();
        
        $conn = new mysqli($data[0], $data[1], $data[2], $data[3]);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return($conn);
        //echo "Connected successfully";
    }
    
    function set($id){
        $this->id = $id;
        $conn = $this->db_connect("1da1be00750588a48bb1d90cdbc266a1");
        
        $sql = "SELECT * FROM exam WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->creator = $row['creator'];
            $this->legal_time = $row['time'];
            $this->legal_time = $row['time'];
            $this->date_created = $row['date_created'];
          }
        }
        
    }
    
    function get_exam($id){
        
        $this->set($id);
        
        $id = $this->id;
        $name = $this->name;
        $creator = $this->creator;
        $time = $this->legal_time;
        $date_created = $this->date_created;
        
        $data = array();
        
        array_push($data, $id);
        array_push($data, $name);
        array_push($data, $creator);
        array_push($data, $time);
        array_push($data, $date_created);
        
        
        return($data);
        
    }
    
    function get_test_exam(){
        $data = array(
            "1",
            "آزمون تست",
            "مدرس تست",
            "20",
            "2023-05-19 09:15:35"
            );
            
        return($data);
    }
    
    
    
    function insert_exam($name, $creator, $time){
        
        $conn = $this->db_connect("1da1be00750588a48bb1d90cdbc266a1");
        
        $sql = "INSERT INTO exam(name, creator, time)VALUES('$name', '$creator', '$time')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }
}

class Question{
    private $id;
    private $exam_id;
    private $question;
    private $answer;
    
    private $op1;
    private $op2;
    private $op3;
    private $op4;
    
    private $lable;
    private $Tag;
    private $score;
    
    
    function db_connect($token){
        $defaults = new Defaults;
        $defaults->set($token);
        $data = $defaults->get();
        
        $conn = new mysqli($data[0], $data[1], $data[2], $data[3]);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return($conn);
        //echo "Connected successfully";
    }
    
    function set($exam_id){
        $this->exam_id = $exam_id;
        $conn = $this->db_connect("1da1be00750588a48bb1d90cdbc266a1");
        
        $sql = "SELECT * FROM exam_question WHERE exam_id=$exam_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $this->id = $row['id'];
            $this->question = $row['question'];
            $this->answer = $row['answer'];
            
            $this->op1 = $row['op1'];
            $this->op2 = $row['op2'];
            $this->op3 = $row['op3'];
            $this->op4 = $row['op4'];
            
            $this->lable = $row['lable'];
            $this->Tag = $row['tag'];
            $this->score = $row['score'];
          }
        }
        
    }
    
    function set_all($exam_id){
        $this->exam_id = $exam_id;
        $conn = $this->db_connect("1da1be00750588a48bb1d90cdbc266a1");
        
        $sql = "SELECT * FROM exam_question";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $this->id = $row['id'];
            $this->question = $row['question'];
            $this->answer = $row['answer'];
            
            $this->op1 = $row['op1'];
            $this->op2 = $row['op2'];
            $this->op3 = $row['op3'];
            $this->op4 = $row['op4'];
            
            $this->lable = $row['lable'];
            $this->Tag = $row['tag'];
            $this->score = $row['score'];
          }
        }
        
    }
    
    
    function get_question($exam_id){
        
        $this->set($exam_id);
        
        $id = $this->id;
        $exam_id = $this->exam_id;
        $question = $this->question;
        $answer = $this->answer;
        
        $op1 = $this->op1;
        $op2 = $this->op2;
        $op3 = $this->op3;
        $op4 = $this->op4;
        
        
        $lable = $this->lable;
        $tag = $this->Tag;
        $score = $this->score;
        
        $data = array();
        
        array_push($data, $id);
        array_push($data, $exam_id);
        array_push($data, $question);
        array_push($data, $answer);
        
        array_push($data, $op1);
        array_push($data, $op2);
        array_push($data, $op3);
        array_push($data, $op4);
        
        array_push($data, $lable);
        array_push($data, $tag);
        array_push($data, $score);
        
        
        return($data);
        
    }
    
    
    function get_test_question(){
        $q1 = array(
            "1",
            "1",
            "کدام یک از گزینه‌های زیر برای کامنت استفاده می‌شود؟",
            "3",
            "code script",
            "image path",
            
            "//",
            "/",
            "#",
            "-",
            
            "آسان",
            "کامنت",
            "2"
            );
            
        $q2 = array(
            "2",
            "1",
            "کدام یک بیشترین اولیت در محاسبه را دارد؟",
            "2",
            "code script",
            "image path",
            
            "ضرب",
            "پرانتز",
            "جمع",
            "تفریق",
            
            "آسان",
            "مجاسبه",
            "2"
            );
            
            
        $data = array();
        array_push($data, $q1);
        array_push($data, $q2);
            
        return($data);
    }
    
}

?>
