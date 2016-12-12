<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Reset status of half-tested solutions
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


    function WT_ResetStatus () {
      if (!WT_IPC_CheckLogin ()) {
        return;
      }

      db_update ('tester_solutions', array ('status' => 0), '`status`=1');
    }

    ipc_register_function ('reset_status', WT_ResetStatus);

?>
