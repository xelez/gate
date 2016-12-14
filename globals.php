<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Some main global definitions
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  global $DOCUMENT_ROOT, $IFACE;

  $IFACE = 'SPAWNING NEW IFACE';
  $DOCUMENT_ROOT = __DIR__;

  $superglobals = array($_FILES, $_POST, $_GET);
  foreach ($superglobals as $superglobal) {
    extract($superglobal, EXTR_SKIP);
  }
?>
