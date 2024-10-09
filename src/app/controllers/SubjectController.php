<?php

class SubjectController {

  public function addSubject() {
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
      $subjectName = $_POST['subject_name'];
      $examineDay = $_POST['examine_day'];
      $goalStudyTime = $_POST['goalStudyTime'];

      

      // 処理後にリダイレクト
      header('Location: /list');
      exit();
    }
  }
  
}