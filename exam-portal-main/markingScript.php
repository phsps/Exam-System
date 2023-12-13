<?php

require_once 'conn.php';

$subject = $_GET['sub'];
$short = $_GET['short'];
$class = 'SSS Three';

function tableByClassExam($class, $short)
{

    switch ($class) {

        case 'Pre Nursery':
            $table = 'exam_pn_'.$short;
            break;
        case 'Nursery One':
            $table = 'exam_n1_'.$short;
            break;
        case 'Nursery Two':
            $table = 'exam_n2_'.$short;
            break;
        case 'Basic One':
            $table = 'exam_p1_'.$short;
            break;
        case 'Basic Two':
            $table = 'exam_p2_'.$short;
            break;
        case 'Basic Three':
            $table = 'exam_p3_'.$short;
            break;
        case 'Basic Four':
            $table = 'exam_p4_'.$short;
            break;
        case 'Basic Five':
            $table = 'exam_p5_'.$short;
            break;
        case 'Basic Six':
            $table = 'exam_p6_'.$short;
            break;
        case 'JSS One':
            $table = 'exam_j1_'.$short;
            break;
        case 'JSS Two':
            $table = 'exam_j2_'.$short;
            break;
        case 'JSS Three':
            $table = 'exam_j3_'.$short;
            break;
        case 'SSS One':
            $table = 'exam_s1_'.$short;
            break;
        case 'SSS Two':
            $table = 'exam_s2_'.$short;
            break;
        case 'SSS Three':
            $table = 'exam_s3_'.$short;
            break;
          default:
          $table ='';
      }
      
    return $table;
}

$table = tableByClassExam($class,$short);

$chosen = [];
$correct = [];
$marks = 0;

// Retrieve the posted data
$postData = file_get_contents('php://input');

// If data was posted
if ($postData) {
  // Decode JSON data to a PHP array
  $data = json_decode($postData, true);

  // Process the received questions (in this case, just printing for demonstration)
  if (isset($data['answers'])) {

    foreach ($data['answers'] as $answer) {

        if($answer == "null")
            $answer = 1000;

        array_push($chosen, substr($answer, 3));
      }

      

    for($i = 1; $i <= count($chosen); $i++ ){
       
        $select=$pdo->prepare("SELECT ans FROM `$table` WHERE name='e$i'");
        $select->execute();
        $row=$select->fetch(PDO::FETCH_ASSOC);
        $ans = $row["ans"];
        
     array_push($correct, $ans);

    }

    for($i = 0; $i < count($chosen); $i++)
    {
        if($chosen[$i] == $correct[$i]){
            $marks++;
        }
    }

   
    
    $percentageExamx = ($marks /count($correct)) * 100;
    $percentageExam = round($percentageExamx);
    
    
    $session    = '2022/2023';
    $term       = 'First';
    $tyme2      = date('Y-m-d H:i:s');
    //$sscode = 'EarlSamm';
    
    
    $sql2="INSERT INTO result_cbt (marks,percent,tyme,subjects) VALUES (:aa, :bb, :cc, :dd)";
    $update=$pdo->prepare($sql2); 
        
        $update->bindParam(':aa',$marks);
        $update->bindParam(':bb',$percentageExam);
        $update->bindParam(':cc',$tyme2);
        $update->bindParam(':dd',$subject);
        
    if($update->execute()){
    
        echo "ok";
    }
// Here
  } else {
    echo "No answers received";
  }
} else {
  echo "No data received";
}