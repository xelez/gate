<?php
global $self, $wiki, $action, $history, $id;
$content=content_lookup (dirname (dirname ($self)));
if ($content!=null) {
?>
<?php
  if (!$content->GetAllowed ('EDIT')) {
    header ('Location: .');
  } else {
?>
<div id="navigator"><?=$content->GetName ();?><?=(($history!='')?(' ('.format_ltime ($cur_version['timestamp']).')'):(''));?></div>
<div class="contentSub">Журнал изменений</div>
${information}
<?php
      if (user_id ()<0) {
        add_info ('Вы не представились системе. Выйдите из этого раздела, если вы не нуждаетесь во внесении изменений в эту статью. '.
          'Так или иначае, Ваш IP-адрес протрассирован и сохранен, все Ваши действия журналируются. Если Вы совершите противозаконные действия, оговорённые УК РФ, то мы оставляем за собой право сообщить об этих действиях в правоохранительные органы.');
      }
      $content->Editor_DrawHistory ();
    }
} else {
  print ('${information}');
  add_info ('Невозмонжно отобразить страницу, так как запрашиваемый раздел поврежден или не существует. Извините.');
}
?>
