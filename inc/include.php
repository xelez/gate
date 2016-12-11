<?php
  /**
   * Gate - Wiki engine and web-interface for WebTester Server
   *
   * Includes of main modules
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

  require_once $DOCUMENT_ROOT.'/inc/stuff/parsers.php';
  require_once $DOCUMENT_ROOT.'/inc/config.php';
  require_once $DOCUMENT_ROOT.'/inc/common/config.php';
  require_once $DOCUMENT_ROOT.'/inc/content.php';
  require_once $DOCUMENT_ROOT.'/inc/common/CVirtual.php';
  require_once $DOCUMENT_ROOT.'/inc/service.php';
  require_once $DOCUMENT_ROOT.'/inc/logick/wiki/include.php';
  require_once $DOCUMENT_ROOT.'/inc/stuff/include.php';
  require_once $DOCUMENT_ROOT.'/inc/stuff/security/include.php';
  require_once $DOCUMENT_ROOT.'/inc/stencil/include.php';
  require_once $DOCUMENT_ROOT.'/inc/linkage.php';
  require_once $DOCUMENT_ROOT.'/inc/settings.php';
  require_once $DOCUMENT_ROOT.'/inc/dev.php';
  require_once $DOCUMENT_ROOT.'/inc/builtin.php';
  require_once $DOCUMENT_ROOT.'/inc/template.php';
  require_once $DOCUMENT_ROOT.'/inc/stencil.php';
  require_once $DOCUMENT_ROOT.'/inc/xpfs.php';
  require_once $DOCUMENT_ROOT.'/inc/main.php';
?>
