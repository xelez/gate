<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Helper for executor of IPC commands
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


    global $ipc, $XPFS;

    /* Execute IPC command withot including all stuff  */

    /* Include required stuff */
    require_once $DOCUMENT_ROOT.'/inc/stuff/parsers.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/linkage.php';
    require_once $DOCUMENT_ROOT.'/inc/config.php';
    require_once $DOCUMENT_ROOT.'/inc/common/config.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/dbase.php';
    require_once $DOCUMENT_ROOT.'/inc/builtin.php';
    require_once $DOCUMENT_ROOT.'/inc/xpfs.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/security/user.php';
    require_once $DOCUMENT_ROOT.'/inc/stuff/ipc.php';

    db_connect (false);

    $XPFS = new XPFS ();
    $XPFS->createVolume ();
?>
