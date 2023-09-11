
function measure() {
    if (BL_mode == 'measure') {
        DeleteMouseEvent();
        //cancelTools();
        //document.documentElement.onmousemove = displayMeasurelLabel;
        //document.documentElement.ontouchmove = displayMeasurelLabel;
        cancelTools();
        openMeasure = true;
        set_BL_model.onchange1 = function () {
            getByid("MeasureLabel").style.display = 'none';
            displayMark();
            openMeasure = false;
            document.documentElement.onmousemove = DivDraw;
            document.documentElement.ontouchmove = DivDraw;
            set_BL_model.onchange1 = function () { return 0; };
        }
        Mousedown = function (e) {
            if (e.which == 1) MouseDownCheck = true;
            else if (e.which == 3) rightMouseDown = true;

            windowMouseX = GetmouseX(e);
            windowMouseY = GetmouseY(e);
            GetViewport().originalPointX = getCurrPoint(e)[0];
            GetViewport().originalPointY = getCurrPoint(e)[1];

            //getByid("MeasureLabel").style.display = '';
            let angle2point = rotateCalculation(e);
            MeasureXY = angle2point;
            MeasureXY2 = angle2point;
            for (var i = 0; i < Viewport_Total; i++)
                displayMark(i);

        };

        Mousemove = function (e) {
            var currX = getCurrPoint(e)[0];
            var currY = getCurrPoint(e)[1];
            var labelXY = getClass('labelXY'); {
                let angle2point = rotateCalculation(e);
                MeasureXY2 = angle2point;
                labelXY[viewportNumber].innerText = "X: " + parseInt(angle2point[0]) + " Y: " + parseInt(angle2point[1]);
            }
            if (rightMouseDown == true) {
                scale_size(e, currX, currY);
            }
            if (openLink == true) {
                for (var i = 0; i < Viewport_Total; i++) {
                    GetViewport(i).newMousePointX = GetViewport().newMousePointX;
                    GetViewport(i).newMousePointY = GetViewport().newMousePointY;
                }
            }
            putLabel();
            for (var i = 0; i < Viewport_Total; i++)
                displayRuler(i);

            if (MouseDownCheck) {
                let Uid = SearchNowUid();
                var dcm = {};
                dcm.study = Uid.studyuid;
                dcm.series = Uid.sreiesuid;
                dcm.color = "#FF0000";
                dcm.mark = [];
                dcm.showName = "ruler";
                dcm.hideName = dcm.showName;
                dcm.mark.push({});
                dcm.sop = Uid.sopuid;
                //dcm.hideMark = function () { getClass("MeasureLabel").style.display = "none"; };
                //dcm.displayMark = function () { getClass("MeasureLabel").style.display = ""; };
                var DcmMarkLength = dcm.mark.length - 1;
                dcm.mark[DcmMarkLength].type = "MeasureRuler";
                dcm.mark[DcmMarkLength].markX = [];
                dcm.mark[DcmMarkLength].markY = [];
                dcm.mark[DcmMarkLength].markX.push(GetViewport().originalPointX);
                dcm.mark[DcmMarkLength].markY.push(GetViewport().originalPointY);
                dcm.mark[DcmMarkLength].markY.push(currY);
                dcm.mark[DcmMarkLength].markX.push(currX);
               
                dcm.mark[DcmMarkLength].Text = getMeasurelValue(e);
                PatientMark.push(dcm);
                refreshMark(dcm);
                //for (var i = 0; i < Viewport_Total; i++)
                //     displayMark(i);
                //  displayAngleRuler();
                PatientMark.splice(PatientMark.indexOf(dcm), 1);
                return;
            }
            /*if (MouseDownCheck) {
                windowMouseX = GetmouseX(e);
                windowMouseY = GetmouseY(e);

                let angle2point = rotateCalculation(e);
                MeasureXY2 = angle2point;
                for (var i = 0; i < Viewport_Total; i++)
                    displayMark(i);
                
                return;
            }*/
            GetViewport().originalPointX = currX;
            GetViewport().originalPointY = currY;
        }
        Mouseup = function (e) {
            var currX = getCurrPoint(e)[0];
            var currY = getCurrPoint(e)[1];

            let Uid = SearchNowUid();
            var dcm = {};
            dcm.study = Uid.studyuid;
            dcm.series = Uid.sreiesuid;
            dcm.color = "#FF0000";
            dcm.mark = [];
            dcm.showName = "ruler";
            dcm.hideName = dcm.showName;
            dcm.mark.push({});
            dcm.sop = Uid.sopuid;

            /*dcm.hideMark = function () {
                for (var m = 0; m < getClass("MeasureLabel" + dcm.sop).length; m++)
                    getClass("MeasureLabel" + dcm.sop)[m].style.display = "none";
            }
            dcm.displayMark = function () {
                for (var m = 0; m < getClass("MeasureLabel" + dcm.sop).length; m++)
                    getClass("MeasureLabel" + dcm.sop)[m].style.display = "";
            }
            dcm.deleteMark = function () {
                var MeasureLabelClass = getClass("MeasureLabel" + dcm.sop);
                for (var m = 0; m < MeasureLabelClass.length; m++) {
                    MeasureLabelClass[m].remove();
                }
            }*/

            var DcmMarkLength = dcm.mark.length - 1;
            dcm.mark[DcmMarkLength].type = "MeasureRuler";
            dcm.mark[DcmMarkLength].markX = [];
            dcm.mark[DcmMarkLength].markY = [];
            dcm.mark[DcmMarkLength].markX.push(GetViewport().originalPointX);
            dcm.mark[DcmMarkLength].markY.push(GetViewport().originalPointY);
            dcm.mark[DcmMarkLength].markY.push(currY);
            dcm.mark[DcmMarkLength].markX.push(currX);

            dcm.mark[DcmMarkLength].Text = getMeasurelValue(e);
            PatientMark.push(dcm);
            refreshMark(dcm);
            for (var i = 0; i < Viewport_Total; i++)
                displayMark(i);
            displayAngleRuler();
            Graphic_now_choose = {
                reference: dcm
            };



            if (openMouseTool == true && rightMouseDown == true)
                displayMark();
            MouseDownCheck = false;
            rightMouseDown = false;
            magnifierDiv.style.display = "none";

            if (openLink) {
                for (var i = 0; i < Viewport_Total; i++)
                    displayRuler(i);
            }
        }
        Touchstart = function (e, e2) {

            if (!e2) TouchDownCheck = true;
            else rightTouchDown = true;
            windowMouseX = GetmouseX(e);
            windowMouseY = GetmouseY(e);
            if (rightTouchDown == true && e2) {
                windowMouseX2 = GetmouseX(e2);
                windowMouseY2 = GetmouseY(e2);
            }
            GetViewport().originalPointX = getCurrPoint(e)[0];
            GetViewport().originalPointY = getCurrPoint(e)[1];
            if (rightTouchDown == true && e2) {
                GetViewport().originalPointX2 = getCurrPoint(e2)[0];
                GetViewport().originalPointY2 = getCurrPoint(e2)[1];
            }
            //if (openMeasure == true)
            {
                getByid("MeasureLabel").style.display = '';
                let angle2point = rotateCalculation(e);
                MeasureXY = angle2point;
                MeasureXY2 = angle2point;
                for (var i = 0; i < Viewport_Total; i++)
                    displayMark(i);

            }
            //if (openMeasure == true)
            {
                let angle2point = rotateCalculation(e);
                var currX11 = angle2point[0];
                var currY11 = angle2point[1];
                MeasureXY = [currX11, currY11];
                MeasureXY2 = [currX11, currY11];
                for (var i = 0; i < Viewport_Total; i++)
                    displayMark(i);

            }
        }
        Touchmove = function (e, e2) {
            if (openDisplayMarkup && (getByid("DICOMTagsSelect").selected || getByid("AIMSelect").selected)) return;

            var currX = getCurrPoint(e)[0];
            var currY = getCurrPoint(e)[1];
            if (e2) {
                var currX2 = getCurrPoint(e2)[0];
                var currY2 = getCurrPoint(e2)[1];
            }
            var labelXY = getClass('labelXY');
            labelXY[viewportNumber].innerText = "X: " + Math.floor(currX) + " Y: " + Math.floor(currY);
            //尚未完成
            if (TouchDownCheck == true && rightTouchDown == false) {
                // if (openMeasure == true) 
                {
                    // MeasureXY = [getCurrPoint(e)[0], getCurrPoint(e)[1]];
                    let angle2point = rotateCalculation(e);
                    var currX11 = angle2point[0];
                    var currY11 = angle2point[1];
                    MeasureXY2 = [currX11, currY11];
                    for (var i = 0; i < Viewport_Total; i++)
                        displayMark(i);

                    return;
                }
            }
        }
        Touchend = function (e, e2) {
            if (TouchDownCheck == true) {
                if (openAngle == 1) openAngle = 2;
                else if (openAngle == 2) openAngle = 3;
            }
            TouchDownCheck = false;
            rightTouchDown = false;

            magnifierDiv.style.display = "none";

        }
        AddMouseEvent();
    }
}

function getMeasurelValue(e, Label) {
    
    var value = parseInt(Math.sqrt(
        Math.pow(MeasureXY2[0] / GetViewport().PixelSpacingX - MeasureXY[0] / GetViewport().PixelSpacingX, 2) +
        Math.pow(MeasureXY2[1] / GetViewport().PixelSpacingY - MeasureXY[1] / GetViewport().PixelSpacingY, 2), 2)) +
        "mm";
    if (!Label) return value;
    if (document.body.scrollTop && document.body.scrollTop != 0) {
        var dbst = document.body.scrollTop;
        var dbsl = document.body.scrollLeft;
    } else {
        var dbst = document.getElementsByTagName("html")[0].scrollTop;
        var dbsl = document.getElementsByTagName("html")[0].scrollLeft;
    }
    var dgs = Label.style, y = e.clientY, x = e.clientX;
    if (!y || !x) { y = e.touches[0].clientY; x = e.touches[0].clientX; }
    if (MouseDownCheck == true || TouchDownCheck == true) {
        //dgs.top = y + dbst + y_out + "px";
        //dgs.left = x + dbsl + x_out + "px";
        dgs.top = y + dbst + "px";
        dgs.left = x + dbsl + "px";
    }

    if (parseInt(value) <= 1) return "";
    else return value;
}

function drawMeasureRuler(obj) {
    var canvas = obj.canvas, mark = obj.mark;
    if (mark.type != "MeasureRuler") return;
    var ctx = canvas.getContext("2d");
    ctx.globalAlpha = (parseFloat(getByid('markAlphaText').value) / 100);
    setMarkColor(ctx);
    if (mark.parent.color) ctx.strokeStyle = ctx.fillStyle = "" + mark.parent.color;
    for (var o = 0; o < mark.markX.length; o += 1) {
        ctx.beginPath();

        var x1 = mark.markX[o] * 1;
        var y1 = mark.markY[o] * 1;
        var x2 = mark.markX[o + 1] * 1;
        var y2 = mark.markY[o + 1] * 1;

        if (mark.RotationAngle && mark.RotationPoint) {
            [x1, y1] = rotatePoint([x1, y1], mark.RotationAngle, mark.RotationPoint);
            [x2, y2] = rotatePoint([x2, y2], mark.RotationAngle, mark.RotationPoint);
        }

        var tempAlpha2 = ctx.globalAlpha;
        ctx.globalAlpha = 1.0;
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.stroke();
        ctx.globalAlpha = tempAlpha2;
        ctx.closePath();
    }

    var tempAlpha2 = ctx.globalAlpha;
    ctx.globalAlpha = 1.0;
    ctx.strokeStyle = "#00FF00";
    ctx.fillStyle = "#00FF00";
    ctx.beginPath();
    ctx.arc(mark.markX[0], mark.markY[0], 3, 0, 2 * Math.PI);
    ctx.arc(mark.markX[mark.markX.length - 1], mark.markY[mark.markY.length - 1], 3, 0, 2 * Math.PI);
    ctx.fill();
    ctx.closePath();

    if (mark.Text) {
        ctx.beginPath();
        ctx.font = "" + (22) + "px Arial";
        ctx.fillStyle = "#FF0000";
        ctx.fillText("" + mark.Text, mark.markX[mark.markX.length - 1], mark.markY[mark.markY.length - 1]);
        ctx.closePath();
    }
    ctx.globalAlpha = tempAlpha2;
}
PLUGIN.PushMarkList(drawMeasureRuler);