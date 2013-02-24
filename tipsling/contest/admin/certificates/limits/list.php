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

formo('title=Список ограничений');

if (count($list) > 0) {
  global $page;

  $perPage = opt_get('user_count');
  if ($perPage <= 0) {
    $perpage = 10;
  }

  $pages = new CVCPagintation ();
  $pages->Init('', 'bottomPages=false;skiponcepage=true;');
  $i = 0;
  $n = count($list);
  if ($page != '') {
    $pageid = '&page=' . $page;
  }

  while ($i < $n) {
    $c = 0;
    $pageSrc = '<table class="list">' . "\n";
    $pageSrc .= '<tr class="h"><th style="text-align: center;">Название</th>
        <th width="72" class="last">&nbsp;</th></tr>' . "\n";

    while ($c < $perPage && $i < $n) {
      $it = $list[$i];
      $name = $it['name'];
      
      $pageSrc .= '<tr' . (($i == $n - 1 || $c == $perPage - 1) ? (' class="last"') : ('')) . '>' .
      '<td class="n"><a href=".?action=edit&id=' . $it['id'] . '">' . $name . '</td>' .
      '<td align="right">' .
        stencil_ibtnav('edit.gif', '?action=edit&id=' . $it['id'] . '&' . $pageid, 'Изменить ограничение') .
        stencil_ibtnav('cross.gif', '?action=delete&id=' . $it['id'] . '&' . $pageid, 'Удалить ограничение', 'Удалить это ограничени?') .
      '</td></tr>' . "\n";
      $c++;
      $i++;
    }
    $pageSrc .= '</table>' . "\n";
    $pages->AppendPage($pageSrc);
  }
  $pages->Draw();
} else {
  info('На данный момент нет ни одного ограничения');
}

formc ();
?>