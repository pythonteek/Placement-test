<?php
    include('admin_class.php');
    
    $exam = new Exam;
    $ex = $exam->get_test_exam();
    
    /*
    
    $ex[0] --> id
    $ex[1] --> name
    $ex[2] --> creator
    $ex[3] --> time
    $ex[4] --> date_created
    
    
    */
    print_r($ex);
    
    
    
    
    $question = new Question;
    $q = $question->get_test_question(1);
    
    /*
    
    $q[0] --> id
    $q[1] --> exam_id
    $q[2] --> question
    $q[3] --> answer
    $q[4] --> code: Some questions may contain several lines of code
    $q[5] --> image path: The question may have an image
    
    $q[6] --> op1
    $q[7] --> op2
    $q[8] --> op3
    $q[9] --> op4
    
    $q[10] --> lable: Hard, Easy, etc...
    $q[11] --> tag: python, functions, variable, etc...
    $q[12] --> score
    
    */
    
    print_r($q);

?>
