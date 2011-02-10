<?php

/**
 * Gate - Wiki engine and web-interface for WebTester Server
 *
 * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
 *
 * This program can be distributed under the terms of the GNU GPL.
 * See the file COPYING.
 */
global $IFACE;

if ($IFACE != "SPAWNING NEW IFACE" || $_GET['IFACE'] != '') {
  print ('HACKERS?');
  die;
}

if ($_team_included_ != '#team_Included#') {
  $_team_included_ = '#team_Included#';
  $user_infos = array();

  function team_list($responsible_id = -1) {
    if ($responsible_id == '') {
      $responsible_id = -1;
    }

    if ($responsible_id < 0) {
      return arr_from_query('SELECT * FROM `team` ORDER BY `number`');
    }

    return arr_from_query('SELECT `team`.* FROM `team` ' .
            'WHERE `team`.`responsible_id`=' . $responsible_id .
            ' ORDER BY `number`');
  }

  /**
   * Проверка корректности заполнения полей
   */
  function team_check_fields($grade, $teacher_full_name, $pupil1_full_name, $update=false, $id=-1) {
    if ($update) {
      $team = team_get_by_id($id);
      if ($team['is_payment'] > 0) {
        add_info("Данная команда не доступна для редактирования");
        return false;
      }
      if ($team['responsible_id']!= user_id()){
          add_info('Вы не можете редактировать эту команду');
          return false;
      }

    }
    if ($grade==''){
        add_info('Поле "Класс" является обязательным для заполнения');
        return false;
    }

    if (!isIntNumber($grade)){
        add_info('"Класс" должен быть целым числом');
        return false;
    }

    if ($teacher_full_name==''){
        add_info('Поле "Полное имя учителя" является обязательным для заполнения');
        return false;
    }

    if ($grade==''){
        add_info('Поле "Полное имя 1-го участника" является обязательным для заполнения');
        return false;
    }

    $max_comment_len = opt_get('max_comment_len');
    if (strlen($comment) > $max_comment_len) {
      add_info('Поле "Комментарий" не может содержать более ' . $max_comment_len . ' символов');
      return false;
    }
    return true;
  }

  /**
   * Создание новой команды
   * @param <type> $number - Номер команды
   * @param <type> $responsible_id - ID Ответственного
   * @param <type> $contest_id - ID конкурса
   * @param <type> $payment_id - ID платежа
   * @param <type> $grade - Класс участников
   * @param <type> $teacher_full_name - Полное имя учителя
   * @param <type> $pupil1_full_name - Полное имя первого ученика
   * @param <type> $pupil2_full_name - Полное имя второго ученика
   * @param <type> $pupil3_full_name - Полное имя третьего ученика
   * @param <type> $is_payment - Флаг оплаты участия
   * @return <type> Вернет true если команда успешно создана, в противном случае
   *                вернет false
   */
  function team_create($number, $responsible_id, $contest_id, $payment_id, $grade, $teacher_full_name, $pupil1_full_name, $pupil2_full_name, $pupil3_full_name, $is_payment) {
    if (!team_check_fields($grade, $teacher_full_name, $pupil1_full_name)) {
      return false;
    }

    // Checking has been passed
    $number = db_string($number);
    $grade = db_string($grade);
    $teacher_full_name = db_string($teacher_full_name);
    $pupil1_full_name = db_string($pupil1_full_name);
    $pupil2_full_name = db_string($pupil2_full_name);
    $pupil3_full_name = db_string($pupil3_full_name);
    db_insert('team', array('number' => $number,
        'responsible_id' => $responsible_id,
        'contest_id' => $contest_id,
        'payment_id' => $payment_id,
        'grade' => $grade,
        'teacher_full_name' => $teacher_full_name,
        'pupil1_full_name' => $pupil1_full_name,
        'pupil2_full_name' => $pupil2_full_name,
        'pupil3_full_name' => $pupil3_full_name,
        'is_payment' => $is_payment));

    return true;
  }

  function team_create_received() {
    // Get post data
    $grade = stripslashes(trim($_POST['grade']));
    $teacher_full_name = stripslashes(trim($_POST['teacher_full_name']));
    $pupil1_full_name = stripslashes(trim($_POST['pupil1_full_name']));
    $pupil2_full_name = stripslashes(trim($_POST['pupil2_full_name']));
    $pupil3_full_name = stripslashes(trim($_POST['pupil3_full_name']));
    $payment_id = stripslashes(trim($_POST['payment_id']));
    //TODO Make it more universally
    $contest_id = 1;
    $c = db_count('team', "`grade`=$grade AND `contest_id`=$contest_id") + 1;
    $number = $grade . '.' . $c;
    $responsible_id = user_id();
    $is_payment = 0;
    if (team_create($number, $responsible_id, $contest_id, $payment_id, $grade,
                    $teacher_full_name, $pupil1_full_name, $pupil2_full_name,
                    $pupil3_full_name, $is_payment)) {
      $_POST = array();
      return true;
    }

    return false;
  }

  function team_update($id, $payment_id, $grade, $teacher_full_name, $pupil1_full_name, $pupil2_full_name, $pupil3_full_name, $is_payment, $number) {
    if (!team_check_fields($grade, $teacher_full_name, $pupil1_full_name, true, $id)) {
      return false;
    }

    $grade = db_string($grade);
    $teacher_full_name = db_string($teacher_full_name);
    $pupil1_full_name = db_string($pupil1_full_name);
    $pupil2_full_name = db_string($pupil2_full_name);
    $pupil3_full_name = db_string($pupil3_full_name);

    $update = array('payment_id' => $payment_id,
        'grade' => $grade,
        'teacher_full_name' => $teacher_full_name,
        'pupil1_full_name' => $pupil1_full_name,
        'pupil2_full_name' => $pupil2_full_name,
        'pupil3_full_name' => $pupil3_full_name,
        'is_payment' => $is_payment,
        'number' => $number);

    db_update('team', $update, "`id`=$id");

    return true;
  }

  function team_update_received($id, $is_payment = 0) {
    // Get post data
    $grade = stripslashes(trim($_POST['grade']));
    $teacher_full_name = stripslashes(trim($_POST['teacher_full_name']));
    $pupil1_full_name = stripslashes(trim($_POST['pupil1_full_name']));
    $pupil2_full_name = stripslashes(trim($_POST['pupil2_full_name']));
    $pupil3_full_name = stripslashes(trim($_POST['pupil3_full_name']));
    $payment_id = stripslashes(trim($_POST['payment_id']));
    $team = team_get_by_id($id);
    if ($team['grade'] != $grade) {
      //TODO Make it more universally
      $contest_id = 1;
      $c = db_count('team', "`grade`=$grade AND `contest_id`=$contest_id") + 1;
      $number = $grade . '.' . $c;
    }

    if (team_update($id, $payment_id, $grade, $teacher_full_name,
                    $pupil1_full_name, $pupil2_full_name, $pupil3_full_name,
                    $is_payment, $number)) {
      $_POST = array();
    }
  }

  function team_can_delete($id) {
      $team = team_get_by_id($id);
      if ($team['is_payment'] > 0) {
        add_info("Данную команду нельзя удалить");
        return false;
      }
      if ($team['responsible_id']!= user_id()){
          add_info('Вы не можете удалять эту команду');
          return false;
      }
    return true;
  }

  function team_delete($id) {
    if (!team_can_delete($id)) {
      return false;
    }

    return db_delete('team', 'id=' . $id);
  }

  function team_get_by_id($id) {
    return db_row_value('team', "`id`=$id");
  }

  function teams_count_is_payment($id) {
    return db_count('teams', '`payment_id`=' . $id . 'AND `is_payment`=1');
  }

}
?>
