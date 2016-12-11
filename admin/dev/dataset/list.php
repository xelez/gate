<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Datatype list displaying script
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  formo ('title=Список существующих наборов данных');
?>
  <table class="list smb">
    <tr class="h"><th class="n first">№</th><th>Название</th><th width="48" class="last">&nbsp;</th></tr>
<?php
    for ($i = 0; $i < count ($list); $i++) {
      $r = $list[$i];
      $d = $r->RefCount () == 0;
?>
    <tr<?=(($i < count ($list) - 1) ? ('') : (' class="last"'))?>><td class="n"><?=($i+1);?>.</td><td><a href=".?action=edit&id=<?=$r->GetID ();?>"><?=$r->GetName ();?></a>&nbsp;(<?=$r->RefCount ();?>)</td><td align="right"><?ibtnav ('edit.gif', '?action=edit&id='.$r->GetID (), 'Изменить элемент');?><?ibtnav (($d)?('cross.gif'):('cross_d.gif'), ($d)?('?action=delete&id='.$r->GetID ()):(''), 'Удалить элемент', 'Удалить этот элемент?');?></td></tr>
<?php
    }
?>
  </table>
<?php
  formc ();
?>
