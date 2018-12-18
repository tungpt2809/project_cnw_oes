<?php
    include_once('config/core.php');
    include('controllers/c_exam.php');
    $c_exam = new C_exam();
    $allExams = $c_exam->allExams();
    $exam = $allExams["exams"];
    function whatSubject($subject_id){
        switch($subject_id){
            case 1:
                return '<i class="fas fa-calculator"></i> Math';
            case 2:  
                return '<i class="fas fa-comments"></i> English';
            case 3:
                return '<i class="fas fa-cogs"></i> Physical';
            case 4: 
                return '<i class="fas fa-vial"></i> Chemistry';
            case 5:
                return '<i class="fas fa-leaf"></i> Biological';
            case 6:
                return '<i class="fas fa-globe-asia"></i> Geography';
            case 7:
                return '<i class="fas fa-landmark"></i> History';
            case 8:
                return '<i class="fas fa-desktop"></i> Informatics';
            case 9:
                return '<i class="fab fa-android"></i> Technology';
        }    
    }
    
?>
<?php    
    include_once('public/layout/layout_head.php'); 
?>

<div id="content" class="container">
    <div class="fixed-sidebar col-md-2">
        <span class="label">Subject</span>
        <ul class="sidebar">
            <?php for($i=1; $i<=9; $i++){?>
            <li>
                <div class="subj-item">
                    <?php echo whatSubject($i);?>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>    
    <div class="col-md-8 quiz-set">
        <?php for($i=0; $i<count($exam); $i++){?>
        <div class="quiz-item">
            <div class="container">
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-12">
                        <?php echo whatSubject($exam[$i]->subject_id).' | '.$exam[$i]->duration.' minutes'?>
                    </div>
                </div>
                <div class="row" style="margin:20px 0;">
                    <div class="container">
                        <div class="col-md-12">
                            <a href="" style="text-decoration:none; color:#00F; font-size: 20px;">
                                <?php echo $exam[$i]->exam_name?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="far fa-question-circle"></i>
                        <?php echo ' '.$exam[$i]->number_of_questions.' questions'?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include_once('public/layout/layout_foot.php') ?>