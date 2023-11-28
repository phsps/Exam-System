<?php

require_once 'conn.php';

$subject = $_GET['sub'];
$short = $_GET['short'];
$class = 'SSS Three';

function tableByClassExam($class, $short)
{
    if ($class == 'Pre Nursery') {
        $table = 'exam_pn_'.$short;
    } elseif ($class == 'Nursery One') {
        $table = 'exam_n1_'.$short;
    } elseif ($class == 'Nursery Two') {
        $table = 'exam_n2_'.$short;
    } elseif ($class == 'Basic One') {
        $table = 'exam_p1_'.$short;
    } elseif ($class == 'Basic Two') {
        $table = 'exam_p2_'.$short;
    } elseif ($class == 'Basic Three') {
        $table = 'exam_p3_'.$short;
    } elseif ($class == 'Basic Four') {
        $table = 'exam_p4_'.$short;
    } elseif ($class == 'Basic Five') {
        $table = 'exam_p5_'.$short;
    } elseif ($class == 'Basic Six') {
        $table = 'exam_p6_'.$short;
    } elseif ($class == 'JSS One') {
        $table = 'exam_j1_'.$short;
    } elseif ($class == 'JSS Two') {
        $table = 'exam_j2_'.$short;
    } elseif ($class == 'JSS Three') {
        $table = 'exam_j3_'.$short;
    } elseif ($class == 'SSS One') {
        $table = 'exam_s1_'.$short;
    } elseif ($class == 'SSS Two') {
        $table = 'exam_s2_'.$short;
    } elseif ($class == 'SSS Three') {
        $table = 'exam_s3_'.$short;
    } else {
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

