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
$data = [];
$select = $pdo->prepare("SELECT tid,name,psg,qst,opt1,opt2,opt3,opt4,img FROM `$table` ORDER BY tid ASC LIMIT 20");
                $select->execute();
                while($row = $select->fetch(PDO::FETCH_ASSOC)){
                   // $data += $row;
                    array_push($data, $row);
                }


                $dataj = json_encode($data);
                
                header('Content-Type: application/json');
                echo $dataj;

