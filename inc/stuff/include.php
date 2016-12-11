<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Stuff modules includer
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  global $IFACE;

  if ($IFACE != "SPAWNING NEW IFACE") {
    print ('HACKERS?');
    die;
  }


    require_once $DOCUMENT_ROOT.'/inc/stuff/dbase.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/debug.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/hook.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/file.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/mail.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/ipc.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/linkage.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/redirect.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/editor.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/log.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/iframe/iframe.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/calendar.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/image/image_validator.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/handler.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/db_pack.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/sock.php';
?>
