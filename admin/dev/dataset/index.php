<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Entrypoint to dataset administration
   *
   * Copyright (c) 2008-2009 Sergey I. Sharybin <g.ulairi@gmail.com>
   *
   * This program can be distributed under the terms of the GNU GPL.
   * See the file COPYING.
   */

  include '../../../globals.php';
  require_once $DOCUMENT_ROOT.'/inc/include.php';

  Main (dirname ($_SERVER['PHP_SELF']), false);
?>
