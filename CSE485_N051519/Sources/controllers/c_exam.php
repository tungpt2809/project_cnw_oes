<?php
    include("models/m_exam.php");
    class C_exam
    {
        public function allExams()
        {
            $m_exam = new M_exam();
            $exams = $m_exam->getAllExams();
            return array('exams'=>$exams);
        }
    }
?>