<?php
/**
 * Gate - Wiki engine and web-interface for WebTester Server
 *
 * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
 *
 * This program can be distributed under the terms of the GNU GPL.
 * See the file COPYING.
 */
if ($PHP_SELF != '') {
  print ('HACKERS?');
  die;
}

global $id, $page;
$team = team_get_by_id($id);
$pupils = pupil_list_by_team_id($id);
$teachers = teacher_list_by_team_id($id);
formo('title=Редактирование команды '.$team['grade'].'.'.$team['number'].' (номер при регистрации: '.$team['grade'].'.'.$team['reg_number'].');');
?>
<script language="JavaScript" type="text/javascript">
  function check (frm) {
    var grade  = getElementById ('grade').value;
    var pupil1_full_name   = getElementById ('pupil1_full_name').value;
    var $teachers = $('input[name="teachers[]"]');

    if (qtrim(grade)==''){
      alert('Укажите класс команды')
      return;
    }

    if (!isnumber(grade)){
      alert('Класс должен быть целым положительным числом от 1 до 17 (1-11 для школьников, 12-17 для студентов)');
      return;
    }

    if (grade<1||grade>17){
        alert('Класс должен быть целым положительным числом от 1 до 17 (1-11 для школьников, 12-17 для студентов)');
        return;
    }

    var isTeacherEmpty=true;
    for(var i=0; i<$teachers.length; i++){
        if (qtrim($teachers[i].value) != ''){
            isTeacherEmpty=false;
            break;
        }
    }
    if (isTeacherEmpty){
      alert('ФИО учителя не может быть пустым');
      return;
    }

    if (qtrim(pupil1_full_name)==''){
      alert('ФИО первого участника не может быть пустым');
      return;
    }
    frm.submit ();
  }

  function check_frm_grade() {
      var grade = getElementById ('grade').value;

      if (qtrim(grade)==''){
          show_msg ('grade_check_res', 'err', 'Укажите класс команды');
          return;
      }

      if (!isnumber(grade)){
          show_msg ('grade_check_res', 'err', 'Класс должен быть целым положительным числом от 1 до 17 <i>(1-11 для школьников, 12-17 для студентов)</i>');
          return;
      }

      if (grade<1 || grade>17){
          show_msg('grade_check_res','err','Класс должен быть целым положительным числом от 1 до 17 <i>(1-11 для школьников, 12-17 для студентов)</i>');
          return;
      }

      hide_msg('grade_check_res');
  }

  function check_frm_teacher() {
      var $teachers = $('input[name="teachers[]"]');
      
      for(var i=0; i<$teachers.length; i++){
          if (qtrim($teachers[i].value) != ''){
              hide_msg('teacher_check_res');      
              return;
          }
      }

      show_msg ('teacher_check_res', 'err', 'Это поле обзательно для заполнения');
  }

  function check_frm_pupil() {
      var pupil = getElementById ('pupil1_full_name').value;

      if (qtrim(pupil)=='') {
          show_msg ('pupil_check_res', 'err', 'Это поле обязательно для заполнения');
          return;
      }

      hide_msg('pupil_check_res');
  }

  function check_frm_comment() {
      var comment = getElementById ('comment').value;

      if (comment.length > <?=opt_get('max_comment_len');?>) {
          show_msg ('comment_check_res', 'err', 'Поле "Комментарий" не может содержать более <?=opt_get('max_comment_len');?> символов');
          return;
      }

      hide_msg('comment_check_res');
  }
  
  $(function (){
    var AddTeacherField = function(){
            $('#teachers').find('tr:last').after("<tr><td><input type='text' class='txt block' name='teachers[]' onblur='check_frm_teacher ();' value=''/><input type='hidden' name='teacher_team[]'/></td><td width='24' style='text-align:right;'><img class='btn' src='<?=config_get('document-root')?>/pics/cross.gif'/></td></tr>");
        },
        RemoveTeacherField = function(){
            $rows = $(this).parents('table:first').find('tr');
            if ($rows.length>1){
                $(this).parents('tr:first').remove();
            }
        };
    
    $('#addTeacher').on('click', AddTeacherField);
    $('#teachers').on('click', 'img',  RemoveTeacherField);
  });
</script>

<form action=".?action=save&id=<?= $id; ?>&<?= (($page != '') ? ('&page=' . $page) : ('')); ?>" method="POST" onsubmit="check (this); return false;">
    <table class="clear" width="100%">
        <tr><td width="275px">
                Класс участников: <span class="error">*</span>
                <br/><i>(Для ВУЗов: 1 курс = 12 класс, 2 курс = 13 и т.д.)</i>
            </td>
            <td style="padding: 0 2px;">
                <input type="text" class="txt block" id="grade" name="grade" onblur="check_frm_grade ();" <?=check_can_user_edit_teamgrade_field($team)?'':'readonly="readonly"' ?> value="<?= htmlspecialchars(stripslashes($team['grade'])); ?>">
            </td>
        </tr>
      </table>
      <div id="grade_check_res" style="display: none;"></div>
      <div id="hr"></div>      
      <table class ="clear" width="100%">
        <tr><td width="275px">
                Полное имя учителя: <span class="error">*</span>
            </td>
            <td style="padding: 0 2px;">
                <table width="100%" id="teachers">
                <?php
                    if (count($teachers)>0){
                        foreach ($teachers as $teacher) {
                            echo("<tr><td><input type='text' class='txt block' name='teachers[]' onblur='check_frm_teacher ();' value='".htmlspecialchars(stripslashes($teacher['FIO']))."'><input type='hidden' name='teacher_team[]' value='".$teacher['idOfTeacher_team']."'/></td><td width='24' style='text-align:right;'><img class='btn' src='".config_get('document-root')."/pics/cross.gif'/></td></tr>");
                        }
                    }
                    else {
                        echo("<tr><td><input type='text' class='txt block' name='teachers[]'/><input type='hidden' name='teacher_team[]'/></td><td width='24' style='text-align:right;'><img class='btn' src='".config_get('document-root')."/pics/cross.gif'/></td></tr>");                        
                    }
                ?>
                </table>
                <button id="addTeacher" type="button" class="submitBtn">Добавить</button>
            </td>
        </tr>
      </table>
      <div id="teacher_check_res" style="display: none;"></div>
      <div id="hr"></div>
      <table class ="clear" width="100%">
        <tr><td width="275px">
                Полное имя 1-го участника: <span class="error">*</span>
            </td>
            <td style="padding: 0 2px;">
                <input type="text" class="txt block" id="pupil1_full_name" name="pupils[]" onblur="check_frm_pupil ();" value="<?= htmlspecialchars(stripslashes($pupils[0]["FIO"])); ?>">
                <input type='hidden' name='pupil_team[]' value='<?=$pupils[0]['idOfPupil_team']?>'/>
            </td>
        </tr>
      </table>
      <div id="pupil_check_res" style="display: none;"></div>
      <div id="hr"></div>
      <table class ="clear" width="100%">
        <tr><td width="275px">
                Полное имя 2-го участника:
            </td>
            <td style="padding: 0 2px;">
                <input type="text" class="txt block" id="pupil2_full_name" name="pupils[]" value="<?= htmlspecialchars(stripslashes($pupils[1]["FIO"])); ?>">
                <input type='hidden' name='pupil_team[]' value='<?=$pupils[1]['idOfPupil_team']?>'/>
            </td>
        </tr>
      </table>
      <div id="hr"></div>
      <table class ="clear" width="100%">
        <tr><td width="275px">
                Полное имя 3-го участника:
            </td>
            <td style="padding: 0 2px;">
                <input type="text" class="txt block" id="pupil3_full_name" name="pupils[]" value="<?= htmlspecialchars(stripslashes($pupils[2]["FIO"])); ?>">
                <input type='hidden' name='pupil_team[]' value='<?=$pupils[2]['idOfPupil_team']?>'/>
            </td>
        </tr>
      </table>
      <div id="hr"></div>
      <table class ="clear" width="100%">
        <tr><td width="275px">
                В какую смену учится:
            </td>
            <td style="padding: 0 2px;">
                <select id="smena" name="smena" <?=check_can_user_edit_teamsmena_field($team)?'':'disabled' ?>>
                    <option value="1" <?= $team['smena']=='1'?'selected="selected"':'' ?>>1 смена (играет с 14 до 16 часов местного времени)</option>
                    <option value="2" <?= $team['smena']=='2'?'selected="selected"':'' ?>>2 смена (играет с 11 до 13 часов местного времени)</option>
                </select>
            </td>
        </tr>
      </table>
      <div id="hr"></div>
      <table class ="clear" width="100%">
        <tr><td width="275px">
                Примечание:
            </td>
            <td style="padding: 0 2px;">
                <input type="text" id="comment" name="comment" onblur="check_frm_comment ();" value="<?= htmlspecialchars(stripslashes($team['comment'])); ?>" class="txt block">
            </td>
        </tr>
      </table>
      <input type="hidden" value="<?=($team['is_payment'])?'1':'0'?>" id="is_payment_value" name="is_payment_value"></input>
      <div id="comment_check_res" style="display: none;"></div>

  <div class="formPast">
    <button class="submitBtn" type="button" onclick="nav ('.?<?= (($page != '') ? ('&page=' . $page) : ('')); ?>');">Назад</button>
    <button class="submitBtn" type="submit">Сохранить</button>
  </div>
</form>
<?php
    formc ();
?>
