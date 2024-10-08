<?php

class SubjectController {

  public function addSubject() {
    if ($_POST['REQUEST_METHOD'] === 'POST') {
      $subjectName = $_POST['subject_name'];
      $examineDay = $_POST['examine_day'];
      $goalStudyTime = $_POST['goalStudyTime'];

      echo "##############################".$subjectName;

      // 処理後にリダイレクト
      header('Location: /list');
      exit();
    }
  }
  
}