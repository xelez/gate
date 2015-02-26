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

formo('title=Список опросов;');

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
        <th width="75" style="text-align: center;">&nbsp;</th>
        <th width="48" class="last">&nbsp;</th></tr>' . "\n";
    
    while ($c < $perPage && $i < $n) {
      $it = $list[$i];
      $name = $it['vopros'];
      
      $pageSrc .= '<tr' . (($i == $n - 1 || $c == $perPage - 1) ? (' class="last"') : ('')) . '>' .
      '<td align="center"><a href=".?action=edit&id=' . $it['id'] . '">' . $name . '</a></td>' .
      '<td align="center"><a href=".?action=results&id=' . $it['id'] . '">Результаты</a></td>' .
      '<td align="right">' .
        stencil_ibtnav('edit.gif', '?action=edit&id=' . $it['id'] . '&' . $pageid, 'Изменить информацию о конкурсе') .
        stencil_ibtnav('cross.gif', '?action=delete&id=' . $it['id'] . '&' . $pageid, 'Удалить конкурс', 'Удалить этот конкурс?') .
      '</td></tr>' . "\n";
      $c++;
      $i++;
    }
    $pageSrc .= '</table>' . "\n";
    $pages->AppendPage($pageSrc);
  }
  $pages->Draw();
} else {
  info('У вас нет опросов');
}

formc ();
?>
