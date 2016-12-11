<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Includer of WebTester's Web-interface
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

  if ($_WT_included_ != '###WT_included###') {
    $_WT_included_ != '###WT_included###';

    require_once $DOCUMENT_ROOT.'/inc/include.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/config/config.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/config/compilers.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/config/errors.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/config/ipc.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/config/wt.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/library.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/contest.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/security.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/linkage.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/compilers.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/gateway.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/ipc.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/util.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/wt.php';
    require_once $DOCUMENT_ROOT.'/inc/logick/tester/data_receiver.php';
  }
?>
