<?php if ($_CMHeadTag_!='#CMHeadTag_Included#') {$_CMHeadTag_='#CMMeta_Included#';
  class CMHeadTag extends CMVirtual {
    var $tag;
    var $closeTag;
    function CMHeadTag () { $this->SetClassName ('CMHeadTag'); }
    function Init ($tag, $params,$closeTag=false) {
      $this->SetDefaultSettings ();
      $this->tag=$tag;
      $this->closeTag=$closeTag;
      //print (unserialize_params ($params));
      $this->SetSettings (unserialize_params ($params));
    }
    function SetDefaultSettings () {$this->SetClassName ('CMHeadTag');}
    function Source () {
      $result='<'.$this->GetClassName ();
      foreach ($this->GetSettings () as $k=>$v) {
        if (trim ($v)!='')
          $result.=" $k=\"$v\""; else
          $result.=" $k";
      }
      $result.='>';
      $inner=$this->InnerHTML ();
      if ($inner!=''||$this->closeTag) $result=$result.$inner.'</'.$this->GetClassName ().'>';
      return $result;
    }
  }
  content_Register_MCClass ('CMHeadTag');
}
?>
