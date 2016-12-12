<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Template for IPC configuration
   *
   * Rename this file to ipc.php
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


    config_set ('WT-IPC-Login',  'login');
    config_set ('WT-IPC-Pass-1', 'pass1');
    config_set ('WT-IPC-Pass-2', 'pass2');

?>
