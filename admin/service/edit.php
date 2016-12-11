<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Service edtit form generator
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  global $id;
  $d = manage_spawn_service ($id);
  formo ('title=Информация о сервисе;');
?>
<script language="JavaScript" type="text/javascript">
  function check (frm) {
    var name = getElementById ('name').value;

    if (qtrim (name) == '') {
      alert ('Нельзя сменить имя сервиса на пустое.');
      return false;
    }

    frm.submit ();
  }
</script>

<form action=".?action=save&id=<?=$id;?>" method="post" onsubmit="check (this); return false;">
  Название сервиса:
  <input type="text" id="name" name="name" value="<?=$d->GetName ();?>" class="txt block"><div id="hr"></div>
  <div class="formPast">
    <button class="submitBtn" type="button" onclick="nav ('.');">Назад</button>
    <button class="submitBtn" type="submit">Сохранить</button>
  </div>
</form>
<?php
  formc ();
?>
