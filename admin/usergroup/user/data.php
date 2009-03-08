<?php
  if ($PHP_SELF!='') {print ('HACKERS?'); die;}
  if (!user_authorized () || !user_access_root ()) header ('Location: '.config_get ('document-root').'/admin');
  global $DOCUMENT_ROOT, $action, $id;
  include $DOCUMENT_ROOT.'/admin/inc/menu.php';
  include '../menu.php';
  $manage_menu->SetActive ('usergroup');
  $usergroup_menu->SetActive ('user');

  global $group;

  function get_filters () {
    global $group;
    return 'group='.$group;
  }

  if ($action=='create') user_create_received ();

  // Printing da page
  print ($manage_menu->InnerHTML ());
  print ($usergroup_menu->InnerHTML ());

  print ('${information}');

//  include 'list.php';

  if ($action=='edit')
    include 'edit.php'; else
    {
      if ($action=='save') user_update_received ($id); else
      if ($action=='delete') user_delete ($id);
      $list=user_authorized_list ($group);
      /*if (count ($list)>0) */include 'list.php';
      // Print the create form
      include 'create_form.php';
    }
?>
