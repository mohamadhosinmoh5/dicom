//Viewport的總數量
const Viewport_Total = 16;
//Viewport的及時數量
let Viewport_row = 1;
let Viewport_col = 1;

//當前選擇的Viewport的canvas
//var canvas;
//var ctx;

//表示按住了滑鼠左鍵
var MouseDownCheck = false;
//表示按住了滑鼠右鍵
var rightMouseDown = false;
//表示按住了觸控
var TouchDownCheck = false;
//表示按住了滑鼠左鍵
var rightTouchDown = false;

//表示現在為開放用拖曳切換影像
var openChangeFile = false;
//表示按下WindowLevel調整
var openWindow = false;
//表示現在開啟放大鏡功能
var openZoom = false;
//表示Viewport為連接狀態
var openLink = false;
//表示左側的影像可以點擊
var openLeftImgClick = true;

//暫時移除的功能
var openPenDraw = false;
//表示目前正在使用量角器工具
var openAngle = 0;
//表示目前icon圖示的RWD收合功能為開啟狀態
var openRWD = true;

//紀錄滑鼠座標
var windowMouseX = 0,
  windowMouseY = 0;
var windowMouseX2 = 0,
  windowMouseY2 = 0;
var MousePointX = 0,
  MousePointY = 0;

//紀錄測量工具座標
var MeasureXY = [0, 0];
var MeasureXY2 = [0, 0];

//放大鏡預設長寬
var magnifierWidth0 = 200;
var magnifierHeight0 = 200;
//放大鏡設定長寬
var magnifierWidth = 200;
var magnifierHeight = 200;
//代表目前處於基本操作狀態
var openMouseTool = false;
//代表目前開放使用滾輪切換影像，無論處於什麼操作模式
var openWheel = false;
//代表病患資訊顯示狀態
var openAnnotation = true;
//代表正在使用測量工具
var openMeasure = false;
//代表正在使用旋轉工具
var openRotate = false;

//代表目前從左側面板拖曳中的影像的Series UID
var dragseries = "";
//代表原始影像，通常被用於放大鏡的參考
var originalCanvas;
var originalCtx;
//代表左側有幾個Study --*
var leftCanvasStudy = [];
//目前選取的Viewport是第幾個Viewport
var viewportNumber = 0;
//播放動畫用的計時器
var PlayTimer1 = [];

var openDisplayMarkup = false;
//數著這個Series有幾張影像
var SeriesCount = 0;

//代表目前載入影像的Series UID --*
//var NowSeries = "";
//邊框寬度
var bordersize = 5;
//label距離邊緣多遠
var labelPadding = 3;
var leftLabelPadding = labelPadding;
var rightLabelPadding = labelPadding;
var topLabelPadding = labelPadding;
var bottomLabelPadding = labelPadding;
//代表目前載入了多少次DICOM --*
var dicomImageCount = 0;

//輸入WindowCenter的text
var textWC = getByid("textWC");
//輸入WindowWidth的text
var textWW = getByid("textWW");
//顯示Window Center/Width的label
var labelWC = getClass("labelWC");
//顯示在左上角的label
var labelLT = getClass("labelLT");
//顯示在右上角的label
var labelRT = getClass("labelRT");
//顯示在右下角的label
var labelRB = getClass("labelRB");
//放大鏡元素
var magnifierDiv = getByid("magnifierDiv");
//代表現在視窗大小受到改變，須執行RWD
//var NowResize = false;
//裝DICOM階層樣式表等資訊的物件
var Patient = {};
//
var getPatientbyImageID = {};
//裝標記的物件
var PatientMark = [];
//裝DICOM Tags設定檔的物件
var DicomTags = {};
//裝伺服器設定檔的物件
var ConfigLog = {};
//代表config檔已經載入完畢 --*
var configOnload = false;
//decode function
let decodeImageFrame;
//代表按下ctrl
let KeyCode_ctrl = false;
let BL_mode = 'MouseTool';
let AddMouseEvent = function () {
  try {
    GetViewport().removeEventListener("touchstart", thisF, false);
    GetViewport().removeEventListener("mousedown", thisF, false);
    GetViewport().addEventListener("contextmenu", contextmenuF, false);
    GetViewport().addEventListener("mousemove", Mousemove, false);
    GetViewport().addEventListener("mousedown", Mousedown, false);
    GetViewport().addEventListener("mouseup", Mouseup, false);
    GetViewport().addEventListener("mouseout", Mouseout, false);
    GetViewport().addEventListener("touchstart", touchstartF, false);
    GetViewport().addEventListener("touchmove", touchmoveF, false);
    GetViewport().addEventListener("touchend", touchendF, false);
    GetViewport().addEventListener("wheel", Wheel, false);
  } catch (ex) { console.log(ex); }
}
let DeleteMouseEvent = function () {
  try {
    for (var i = 0; i < Viewport_Total; i++) {
      GetViewport(i).removeEventListener("contextmenu", contextmenuF, false);
      GetViewport(i).removeEventListener("mousemove", Mousemove, false);
      GetViewport(i).removeEventListener("mousedown", Mousedown, false);
      GetViewport(i).removeEventListener("mouseup", Mouseup, false);
      GetViewport(i).removeEventListener("mouseout", Mouseout, false);
      GetViewport(i).removeEventListener("wheel", Wheel, false);
      GetViewport(i).removeEventListener("mousedown", thisF, false);
      GetViewport(i).removeEventListener("touchstart", touchstartF, false);
      GetViewport(i).removeEventListener("touchend", touchendF, false);
      GetViewport(i).removeEventListener("wheel", Wheel, false);
      GetViewport(i).addEventListener("touchstart", thisF, false);
      GetViewport(i).addEventListener("mousedown", thisF, false);
      GetViewport(i).addEventListener("wheel", Wheel, false);
    }
  } catch (ex) { }
}

let set_BL_model = function (string) {
  BL_mode = string;

  if (!this.init) {
    set_BL_model.onchange1 = function () {
      return 0;
    }
    this.init = true;
  }
  set_BL_model.onchange1();
}
