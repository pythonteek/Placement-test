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
    i(th) question:
    $q[i][0] --> id
    $q[i][1] --> exam_id
    $q[i][2] --> question
    $q[i][3] --> answer
    $q[i][4] --> code: Some questions may contain several lines of code
    $q[i][5] --> image path: The question may have an image
    
    $q[i][6] --> op1
    $q[i][7] --> op2
    $q[i][8] --> op3
    $q[i][9] --> op4
    
    $q[i][10] --> lable: Hard, Easy, etc...
    $q[i][11] --> tag: python, functions, variable, etc...
    $q[i][12] --> score
    
    */
    
    print_r($q);

?>
