<!DOCTYPE html>
<html>

<head>
  <title>dicom</title>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="no-cache" http-equiv="cache-control">
  <meta content="no-cache" http-equiv="pragma">
  <meta content="0" http-equiv="expires">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

  <link rel="stylesheet" type="text/css" href="{{url('assets')}}/css/vr.css">
  <link rel="stylesheet" type="text/css" href="{{url('js')}}/app.css">
  <link rel="icon" href="{{url('assets')}}/image/icon/title/bluelight.png" type="image/x-icon" />

  <script src="{{url('assets')}}/scripts/external/other/lodash.min.js"></script>
  <script src="{{url('assets')}}/scripts/external/other/interact.js"></script>

  
  <script src="{{url('assets')}}/scripts/external/cornerstone/cornerstone.min.js"></script>
  <script src="{{url('assets')}}/scripts/external/cornerstone/dicomParser.js"></script>
  <script src="{{url('assets')}}/scripts/external/cornerstone/dataDictionary.js"></script>

  <script src="{{url('assets')}}/scripts/external/cornerstone/cornerstoneWADOImageLoader.bundle.min.js"></script>

  <script src="{{url('assets')}}/scripts/external/threejs/initializeWebWorkers.js"></script>


  <script src="{{url('assets')}}/scripts/toolfunction.js"></script>
  <script src="{{url('assets')}}/scripts/variable.js"></script>
  <script src="{{url('assets')}}/scripts/mark.js"></script>

  <script src="{{url('assets')}}/scripts/eventmanager.js"></script>

  <script src="{{url('assets')}}/scripts/plugin/table.js"></script>

  <script src="{{url('assets')}}/scripts/viewer.js"></script>
  <script src="{{url('assets')}}/scripts/common.js"></script>
  <script src="{{url('assets')}}/scripts/other.js"></script>
  <script src="{{url('assets')}}/scripts/readsome.js"></script>
  <script src="{{url('assets')}}/scripts/onload.js"></script>
  <script src="{{url('assets')}}/scripts/label.js"></script>
  <script src="{{url('assets')}}/scripts/mtss.js"></script>
  <script src="{{url('assets')}}/scripts/play_video.js"></script>
  <script src="{{url('assets')}}/scripts/html.js"></script>
  <script src="{{url('assets')}}/scripts/newscript/mousetool.js"></script>
  <script src="{{url('assets')}}/scripts/newscript/scroll.js"></script>
  <script src="{{url('assets')}}/scripts/newscript/windowlevel.js"></script>
  <script src="{{url('assets')}}/scripts/newscript/zoom.js"></script>
  <script src="{{url('assets')}}/scripts/newscript/rotate.js"></script>



  <script src="{{url('assets')}}/scripts/external/other/html2canvas.min.js"></script>

  <style>
    .img {
      flex: 0 0 4.0%;
      max-width: calc(min(4.0%, 50px));
      min-width: 35px;
      width: 100%;
      height: 100%;
    }

    .innerLabel {
      font-size: calc(0.4rem + 0.1*((5vw)));
    }
  </style>
</head>

<body style="background-color:#3E5E9F33;" onmousewheel="/*return false;*/">
  <input type="hidden" id="assets" value="{{url('assets')}}">
  <input type="hidden" id="baseURL" value="{{url('')}}">
  <header class="page-header" id="page-header">
    <span id="icon-list">
      <span id="openFile_span" style="display: none;"><img class="img" type="file" alt="開檔" id="openFile"
          src="{{url('assets')}}/image/icon/black/openfile.png" width="50" height="50"></span>
      <span id="MouseOperation_span" style="display: none;"><img class="img VR MPR SEG" alt="平移與縮放" id="MouseOperation"
          src="{{url('assets')}}/image/icon/black/b_Pan.png" width="50" height="50"></span>
      <span id="b_Scroll_span" style="display: none;"><img class="img MPR" alt="b_Scroll" id="b_Scroll" src="{{url('assets')}}/image/icon/black/b_Scroll.png"
          width="50" height="50"></span>
      <span id="annotation1_span">
        <span alt="annotation1" id="annotation1" class="material-icons material-icons-round img"> grid_view </span>
      </span>
      <span id="MouseRotate_span">
        <span id="MouseRotate" class="material-icons material-icons-round img MPR">refresh</span>
      </span>
      <span id="WindowRevision_span">
          <span id="WindowRevision" class="material-icons material-icons-round img VR MPR SEG">brightness_6</span>
      </span>
      <span id="zoom_span">
        <span id="zoom" class="material-icons material-icons-round img">search</span>
      </span>
      <span id="horizontal_flip_span">
        <span id="horizontal_flip" class="material-icons material-icons-round img">360</span>
      </span>
      <span id="vertical_flip_span">
        <span id="vertical_flip" id="horizontal_flip" class="material-icons material-icons-round img" style="transform: rotate(90deg)">360</span>
      </span>
      <span id="color_invert_span">
        <span id="color_invert" class="material-icons material-icons-round img">invert_colors</span>
      </span>
      <span id="unlink_span">
        <span id="unlink" class="material-icons material-icons-round img">link</span>
      </span>
      <span style="position:relative;">
        <span id="openMeasureImg" class="material-icons material-icons-round img">square_foot</span>
        <div id="openMeasureDIv" style="position:absolute;left: 0;top: 50px; white-space:nowrap;z-index: 100; width: 500; display: none;background: #80a2e8; padding: 5px; border-radius: 5px;">
          <span id="removeRuler_span">
            <span id="removeRuler" class="material-icons material-icons-round"> disabled_by_default </span>
          </span>
          <span id="MeasureRuler_span">
            <span id="MeasureRuler" class="material-icons material-icons-round">straighten</span>
          </span>
          <span id="AngleRuler_span">
            <span id="AngleRuler" class="material-icons material-icons-round">square_foot</span>
          </span>
        </div>
      </span>

      <span id="playvideo_span" style="display: none;"><img class="img" alt="播放" id="playvideo" src="{{url('assets')}}/image/icon/black/b_CinePlay.png"
          width="50" height="50"></span>
      <span id="MarkButton_span"><img class="img VR MPR" alt="標記" id="MarkButton" src="{{url('assets')}}/image/icon/black/fist0.png"
          width="50" height="50"></span>
      <span id="annotation_span"><img class="img" alt="標籤" id="annotation" src="{{url('assets')}}/image/icon/black/b_Annotation.png"
          width="50" height="50"></span>
      <span id="MarkupImg_span"><img class="img VR MPR" alt="AIM" id="MarkupImg"
          src="{{url('assets')}}/image/icon/black/b_ShowReport.png" width="50" height="50"></span>
    </span>
    <span id="rwdImgTag_span"> <img class="img VR MPR XML PEN" alt="RWD" id="rwdImgTag"
        src="{{url('assets')}}/image/icon/black/b_CineTools.png" style="display:none;" width="50" height="50"></span>

    <div id="GraphicStyleDiv" style="background-color:#30306044;">
      <label style="color: #ffffff;" id="GraphicColorLabel">Color：</label>
      <select id="GraphiccolorSelect" style="background-color:#929292;font-weight:bold;font-size:16px;">
        <!--<option id="Graphicselected" selected="selected">Auto</option>-->
        <option id="GraphicBlackSelect" style="color: #000000;font-weight:bold;">Black(T7)</option>
        <option id="GraphicBlueSelect" style="color: #0000FF;font-weight:bold;" selected="selected">Blue(T8)</option>
        <option id="GraphicBrownSelect" style="color: #844200;font-weight:bold;">Brown(T9)</option>
        <option id="GraphicCyanSelect" style="color: #00FFFF;font-weight:bold;">Cyan(T10)</option>
        <option id="GraphicGreenSelect" style="color: #00FF00;font-weight:bold;">Green(T11)</option>
        <option id="GraphicMagentaSelect" style="color: #FF00FF;font-weight:bold;">Magenta(T12)</option>
        <option id="GraphicOrangeSelect" style="color: #FFA500;font-weight:bold;">Orange(L1)</option>
        <option id="GraphicPurpleSelect" style="color: #663399;font-weight:bold;">Purple(L2)</option>
        <option id="GraphicRedSelect" style="color: #FF0000;font-weight:bold;">Red(L3)</option>
        <option id="GraphicYellowSelect" style="color: #FFFF00;font-weight:bold;"> Yellow(L4)</option>
        <option id="GraphicWhiteSelect" style="color: #FFFFFF;font-weight:bold;">White(L5)</option>
      </select>
    </div>
    <div id="MarkStyleDiv" style="background-color:#00306044;">
      <label style="color: #ffffff;" id="markColorLabel">Color：</label>
      <select id="MarkcolorSelect">
        <option selected="selected">Auto</option>
        <option id="WhiteSelect">White</option>
        <option id="RedSelect">Red</option>
        <option id="BlueSelect">Blue</option>
        <option id="GreenSelect">Green</option>
        <option id="YellowSelect">Yellow</option>
        <option id="BrownSelect">Brown</option>
        <option id="OrangeSelect">Orange</option>
        <option id="PurpleSelect">Purple</option>
      </select>
      <label style="color: #ffffff;" id="markAlphaLabel">Alpha<input type="text" id="markAlphaText"
          value="35" /></label>
      <label style="color: #ffffff;" id="markSizeLabel">Size<input type="text" id="markSizeText" value="0.45" /></label>
      <label style="color: #ffffff;" id="markFillLabel">Fill<input type="checkbox" checked="true" name="markFillLabel"
          id="markFillCheck"></label>
      <label style="color: #ffffff;" id="TableLabel">Table：</label>
      <select id="TableSelect">
        <option id="TableSelectNone" selected="selected">None</option>
        <option id="DICOMTagsSelect">DICOMTags</option>
        <option id="AIMSelect">AIM</option>
      </select>
      <button id="ExportButton" sytle="">Export Image</button>
      <button id="ExportButton2" sytle="">Export Dicom</button>
      <button id="ClearMarkupButton" sytle="">Clear Markup</button>
    </div>

    <div id="SplitViewportDiv" style="background-color:#4D000044;">
      <font color="white">1x1:<input type="radio" class="split_radio" name="split_radio" id="radio_1x1" checked="true" />　</font>
      <font color="white">1x2:<input type="radio" class="split_radio" name="split_radio" id="radio_1x2" />　</font>
      <font color="white">2x1:<input type="radio" class="split_radio" name="split_radio" id="radio_2x1" />　</font>
      <font color="white">2x2:<input type="radio" class="split_radio" name="split_radio" id="radio_2x2" />　</font>
      <font color="white">3x3:<input type="radio" class="split_radio" name="split_radio" id="radio_3x3" />　</font>
      <font color="white">4x4:<input type="radio" class="split_radio" name="split_radio" id="radio_4x4" />　</font>
    </div>
    <span id="WindowLevelDiv_span">
      <div id="WindowLevelDiv" style="background-color:#33666644;">
        <font color="white" id="myWC">WC：</font><input type="text" id="textWC" value="520" />
        <font color="white" id="myWW">WW：</font><input type="text" id="textWW" value="50" />
        <select id="WindowLevelSelect">
          <option id="WindowDefault" selected="selected">Default</option>
          <option id="WindowCustom">Custom</option>
          <option class="WindowSelect" id="WindowAbdomen" wc="60" ww="400">Abdomen(60,400)</option>
          <option class="WindowSelect" id="WindowAngio" wc="300" ww="600">Angio(300,600)</option>
          <option class="WindowSelect" id="WindowBone" wc="300" ww="1500">Bone(300,1500)</option>
          <option class="WindowSelect" id="WindowBrain" wc="40" ww="80">Brain(40,80)</option>
          <option class="WindowSelect" id="WindowChest" wc="40" ww="400">Chest(40,400)</option>
          <option class="WindowSelect" id="WindowLungs" wc="-400" ww="1500">Lungs(-400,1500)</option>
        </select>
      </div>
    </span>
    <font color="white" id="labelZoom">Zoom：</font><input type="text" id="textZoom" value="200" />
    <font color="white" id="labelPlay">fps：</font><input type="text" id="textPlay" value="15" />

    <input type="file" id="myfile" multiple="multiple" style='display:none'>
  </header>
  <div class="form-group" id="form-group">
    <!-- <label class="control-label col-sm-1" for="wadoURL">URL</label> -->
    <div class="container">
      <div id="LeftPicture"
        style="overflow-y: scroll;display: flex;flex-direction: column;position: absolute;z-index: 9;height:100%-50px;"
        width="100">
      </div>
    </div>
    <label id="MeasureLabel"
      style="display:none;color:red;z-index:20;position: absolute;pointer-events: none;-webkit-user-select: none; ">
      0cm
    </label>
    <label id="AngleLabel"
      style="display:none;color:red;z-index:20;position: absolute;pointer-events: none;-webkit-user-select: none; ">
      0cm
    </label>
    <div id="magnifierDiv" style="z-index:40;position: absolute;pointer-events: none;"><canvas
        id="magnifierCanvas"></canvas></div>
        <input type="file" multiple name="" id="wowwow">
  </div>
        <script type="module">
          import { decodeImageFrame1 } from "{{url('')}}/assets/scripts/external/cornerstone/decode/decodeImageFrame.js";
          decodeImageFrame = decodeImageFrame1;
        </script>
        <script src="{{url('assets')}}/scripts/external/threejs/customWebWorkersConfig.js"></script>
        <script src="{{url('assets')}}/scripts/plugin/plugin.js"></script>
        <script src="{{url('assets')}}/scripts/newscript/measure.js"></script>
        <script src="{{url('assets')}}/scripts/newscript/angle.js"></script>
        <script src="{{url('js')}}/dicomViewer.js"></script>
</body>

</html>