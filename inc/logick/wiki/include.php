<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Includer of Wiki stuff
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

      require_once $DOCUMENT_ROOT.'/inc/logick/wiki/linkage.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/wiki/content.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/wiki/wiki.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/wiki/menu.php';
?>
