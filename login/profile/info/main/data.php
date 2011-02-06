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
  print 'HACKERS?';
  die;
}

if (!user_authorized ()) {
  header('Location: ' . config_get('document-root') . '/login/profile');
}

global $DOCUMENT_ROOT, $redirect, $action;
include $DOCUMENT_ROOT . '/login/profile/inc/menu.php';
include '../menu.php';
$profile_menu->SetActive('info');
$info_menu->SetActive('main');

if ($action == 'save') {
  global $email, $surname, $name, $patronymic, $phone, $chpasswd_val;
  $email = stripslashes($email);
  $surname = stripslashes($surname);
  $name = stripslashes($name);
  $patronymic = stripslashes($patronymic);
  $phone = stripslashes($phone);

  $arr = array();

  $u = user_get_by_id(user_id());

  //TODO Add checking surname, name, patromynic and phone
  $arr['surname'] = db_string($surname);
  $arr['name'] = db_string($name);
  $arr['patronymic'] = db_string($patronymic);
  $arr['phone'] = db_string($phone);


  if ($u['email'] != '' && !check_email($email)) {
    add_info('Указанный E-Mail не выглядит корректным');
  } else if (user_registered_with_email($email, user_id())) {
    add_info('Такой E-Mail уже используется.');
  } else {
    $arr['email'] = db_string($email);
  }

  if ($chpasswd_val) {
    global $passwd, $passwd_confirm;
    if ($passwd != $passwd_confirm)
      add_info('Введенные пароли не совпадают. Пароль не был обновлен.'); else
      $arr['password'] = 'MD5("' . addslashes(user_password_hash(user_login(), stripslashes($passwd))) . '")';
  }

  if (count($arr) > 0) {
    db_update('user', $arr, '`id`=' . user_id ());
    if (isset($arr['password'])) {
      user_authorize(user_login(), stripslashes($passwd));
    }
  }
}

$u = user_get_by_id(user_id());

$f = new CVCForm ();
$f->Init('', 'action=.?action\=save' . (($redirect != '') ? ('&redirect=' . prepare_arg($redirect) . ';backlink=' . prepare_arg($redirect)) : ('')) . ';method=POST;add_check_func=check;');

$f->AppendLabelField('Логин', '', $u['login']);
$f->AppendCustomField(array('src' => '<table class="clear" width="100%"><tr><td width="30%">Фамилия</td><td><input id="surname" name="surname" type="text" class="txt block" value="' . htmlspecialchars($u['surname']) . '"></td></tr></table>'));
$f->AppendCustomField(array('src' => '<table class="clear" width="100%"><tr><td width="30%">Имя</td><td><input id="name" name="name" type="text" class="txt block" value="' . htmlspecialchars($u['name']) . '"></td></tr></table>'));
$f->AppendCustomField(array('src' => '<table class="clear" width="100%"><tr><td width="30%">Отчество</td><td><input id="patronymic" name="patronymic" type="text" class="txt block" value="' . htmlspecialchars($u['patronymic']) . '"></td></tr></table>'));

if ($u['email'] != '') {
  $f->AppendCustomField(array('src' => '<table class="clear" width="100%"><tr><td width="30%">E-Mail</td><td><input id="email" name="email" onblur="check_frm_email ();" type="text" class="txt block" value="' . htmlspecialchars($u['email']) . '"></td></tr></table><div id="email_check_res" style="display: none;"></div>'));
}

$f->AppendCustomField(array('src' => '<table class="clear" width="100%"><tr><td width="30%">Телефон</td><td><input id="phone" name="phone" onblur="check_frm_email ();" type="text" class="txt block" value="' . htmlspecialchars($u['phone']) . '"></td></tr><tr><td><i>Например: +79091234567</i></td></tr></table>'));

$f->AppendCustomField(array('title' => '<input type="checkbox" class="cb pointer" value="1" onclick="fchpasswd (this);" id="chpasswd" name="chpasswd_val"><span class="pointer" onclick="var e=getElementById (\'chpasswd\'); e.checked=!e.checked; fchpasswd (e);">Сменить пароль</span>',
    'src' => '<div id="passwd_block" class="invisible">' .
    '<table class="clear" width="100%"><tr><td width="85">Новый пароль</td><td style="padding-bottom: 2px;"><input type="password" class="txt block" id="passwd" name="passwd" onkeyup="check_passwd ();" onchange="check_passwd ();"></td></tr>' .
    '<tr><td>Подтверждение</td><td style="padding-top: 2px;"><input type="password" class="txt block" id="passwd_confirm" name="passwd_confirm" onkeyup="check_passwd ();" onchange="check_passwd ();"></td></tr>' .
    '</table><div id="passwd_msg"></div></div>'));
?>

<script language="JavaScript" type="text/JavaScript">
  var chp=false;

  function check_passwd () {
    var passwd  = getElementById ('passwd').value;
    var confirm = getElementById ('passwd_confirm').value;
    var widget  = getElementById ('passwd_msg');

    if (passwd == '' && confirm == '') {
      widget.innerHTML='';
      return;
    }

    if (passwd == confirm)
      widget.innerHTML='<span style="color: #006000">Пароль подтвержден</span>'; else
        widget.innerHTML='<span style="color: #600000">Ошибка подтверждения пароля</span>';
  }

  function check () {
<?php if ($u['email'] != '') { ?>
      if (!check_email (getElementById ('email').value)) {
        alert ('Адрес электронной не является корректным.');
        return false;
      }
<?php
}
?>
    if (chp) {
      var passwd = getElementById ('passwd').value;
      var passwd_confirm = getElementById ('passwd_confirm').value;
      if (passwd != passwd_confirm) {
        alert ('Ошибка подтверждения пароля.');
        return false;
      }
    }

    return true;
  }

  function fchpasswd (sender) {
    chp = sender.checked;
    if (sender.checked)
      getElementById ('passwd_block').className=''; else
        getElementById ('passwd_block').className='invisible';
  }

  function update_email_check (http_request) {
    if (http_request.readyState == 4) {
      if (http_request.responseText == '+OK')
        show_msg ('email_check_res', 'ok', 'Данный адрес электронной почты пользователя является корректным и Вы можете его использовать.'); else
          show_msg ('email_check_res', 'err', 'Вы не можете использовать этот адрес электронной почты, так как он уже используется.');
    }
  }

  function check_frm_email () {
    var email = getElementById ('email').value;

    if (!check_email (email)) {
      show_msg ('email_check_res', 'err', 'Указанный почтовый ящик не выглядит корректным. Его использование невозможно.');
      return false;
    }

    ipc_send_request ('/', 'ipc=check_email&skipId=<?= user_id (); ?>&email='+email, update_email_check);
  }
</script>

<div id="navigator">Мой профиль >> Основные сведения</div>
${information}
<div class="form">
  <div class="content">
    <?php
    $profile_menu->Draw();
    $info_menu->Draw();
    $f->Draw();
    ?>
  </div>
</div>