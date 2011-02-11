<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Main handlers for login page
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  if ($PHP_SELF!='') {
    print 'HACKERS?';
    die;
  }

  global $login, $passwd, $redirect;
  $authorized = false;

  if (trim ($login) != '') {
    if (user_authorize (stripslashes ($login), stripslashes ($passwd))) {
      $authorized = true;
      redirect ();
    }
  }

  if (!$authorized) {
    add_body_handler ('onload', 'getElementById ("login").focus');
?>
<div id="snavigator">Вход в систему</div>
<form action=".?redirect=<?=urlencode ($redirect);?>" method="POST" style="">
  <div class="form" style="width: 460px; margin: 0 auto;">
    <div class="content">
      <h3>Введите ваше имя пользователя и пароль</h3>
      <div style="height: 10px;"></div>
      <table width="100%">
        <tr>
          <td>
            <table width="100%" style="margin-left: 64px;">
              <tr>
                <td width="60">Ваш логин:</td>
                <td><input type="text" class="txt" value="" name="login" id="login" size="40"></td>
              </tr>
              <tr>
                <td width="60" style="padding-top: 4px;">Пароль:</td>
                <td style="padding-top: 4px;"><input type="password" class="passwd" name="passwd" size="40"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="padding-left: 32px;">
            <div style="margin: 6px 0;">Если у Вас нет логина, то вы можете <a href="<?=config_get ('document-root');?>/login/registration/?redirect=<?=get_redirection (true, true);?>">зарегистрироваться</a>.</div>
            <div style="margin: 6px 0;">Если Вы забыли свой пароль, то мы можем <a href="<?=config_get ('document-root');?>/login/restore">выслать новый пароль</a>.</div>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2" style="padding-top: 4px;">
            <button type="button" class="submitBtn" onclick="nav ('<?=redirector_get_backlink ();?>');">Назад</button>
            <button class="submitBtn" type="submit"><b>Представиться</b></button>
          </td>
        </tr>
      </table>
    </div>
    </div>
</form>
<?php
  }
?>
