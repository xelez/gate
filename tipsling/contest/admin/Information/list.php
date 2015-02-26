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

formo('title=Инфорация о командах и их ответственных;');

?>

<form action=".?action=save<?= (($page != '') ? ('&page=' . $page) : ('')); ?>" method="POST">
    <div style="padding-bottom: 6px;">
      <button class="submitBtn block" type="submit">Сохранить</button>
    </div>
    
<?php
$query = 'SELECT 
    team.id as "id", 
    concat(team.grade,".",team.number) as "Номер команды", 
    timezone.offset as "Часовой пояс",    
    team.contest_day as "День",
    team.smena as "Смена",
    GROUP_CONCAT(DISTINCT teacher.FIO ORDER BY teacher_team.number ASC SEPARATOR  \', \') as "ФИО учителя",
    concat(user.surname, " ", user.name, " ", user.patronymic) as "ФИО ответственного",
    user.email as "email ответственного", 
    user.phone as "Телефон ответственного",
    school.name as "Учебное заведение",
    team.payment_sum as "Оргвзнос",
    team.service as "Служебное"
FROM user, team, responsible, school, timezone, teacher, teacher_team
WHERE team.responsible_id = user.id
AND responsible.user_id = user.id
AND responsible.school_id = school.id
AND school.timezone_id = timezone.id
AND teacher_team.team_id = team.id
AND teacher.id = teacher_team.teacher_id
AND team.contest_id ='.$current_contest.
' GROUP BY team.id
ORDER BY team.grade ASC, team.number';

$list = arr_from_query($query);
if (count($list) > 0) {
  global $page;

  $perPage = 150;
  
  $pages = new CVCPagintation ();
  $pages->Init('', 'bottomPages=false;skiponcepage=true;');
  $i = 0;
  $n = count($list);

  if ($page != '') {
    $pageid = '&page=' . $page;
  }

  while ($i < $n) {
    $c = 0;
    //$pageSrc = '<div>'.$query.'</div>';
    $pageSrc = '<table class="list">' . "\n";
    $pageSrc .= '<tr class="h"><th width="100" style="text-align: center;">Номер команды</th>
        <th style="text-align: center;">Часовой пояс</th>
        <th style="text-align: center;">День</th>
        <th style="text-align: center;">Смена</th>
        <th style="text-align: center;">ФИО учителя</th>
        <th style="text-align: center;">ФИО ответственного</th>
        <th style="text-align: center;">email ответственного</th>
        <th style="text-align: center;">Телефон ответственного</th>
        <th style="text-align: center;">Учебное заведение</th>
        <th style="text-align: center;">Оргвзнос</th>
        <th style="text-align: center;">Служебное</th>
        <th width="24" class="last">&nbsp;</th>
        </tr>' . "\n";
    while ($c < $perPage && $i < $n) {
      $it = $list[$i];
      $pageSrc .= 
      '<td class="center">' . $it["Номер команды"] . '</td>' .
      '<td class="center">' . ($it["Часовой пояс"]<0?$it["Часовой пояс"]:'+'. $it["Часовой пояс"]) . '</td>' .
      '<td class="center">' . $it["День"] . '</td>' .
      '<td class="center">' . ($it["День"]=="вс" ? "" : $it["Смена"]) . '</td>' .
      '<td align="center">' . $it["ФИО учителя"] . '</td>' .
      '<td align="center">' . $it["ФИО ответственного"] . '</td>' .
      '<td align="center">' . $it["email ответственного"] . '</td>' .
      '<td align="center">' . $it["Телефон ответственного"] . '</td>' .
      '<td align="center">' . $it["Учебное заведение"] . '</td>' .
      '<td align="center">' . $it["Оргвзнос"] . '</td>' .
      '<td align="center"><input type=text name="service['.$it['id'].']" value="' . $it['Служебное'] . '"/></td>' .
      '<td align="right">' .
        stencil_ibtnav('edit.gif', '/tipsling/contest/team/all?action=edit&id=' . $it['id'], 'Изменить информацию о команде') .
      '</td>'.
      '</tr>' . "\n";
      $c++;
      $i++;
    }
    $pageSrc .= '</table>' . "\n";
    $pages->AppendPage($pageSrc);
  }
  $pages->Draw();
} else {
  info('Нет команд.');
}
?>
    <div class="formPast">
      <button class="submitBtn block" type="submit">Сохранить</button>
    </div>
  </form>
<?php

formc ();
?>
