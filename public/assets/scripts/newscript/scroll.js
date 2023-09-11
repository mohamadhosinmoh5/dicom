
function scroll() {
    if (BL_mode == 'scroll') {
        DeleteMouseEvent();
        Mousedown = function (e) {
            switch (e.which) {
                case 1:
                    MouseDownCheck = true;
                    break;
                case 2:
                    break;
                case 3:
                    rightMouseDown = true;
                    break;
                default:
                    break
            }
            windowMouseX = GetmouseX(e);
            windowMouseY = GetmouseY(e);
            GetViewport().originalPointX = getCurrPoint(e)[0];
            GetViewport().originalPointY = getCurrPoint(e)[1];
        };

        Mousemove = function (e) {
            var currX = getCurrPoint(e)[0];
            var currY = getCurrPoint(e)[1];
            var labelXY = getClass('labelXY'); {
                let angle2point = rotateCalculation(e);
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
                windowMouseX = GetmouseX(e);
                windowMouseY = GetmouseY(e);

                var nextInstanceNumber = -1;
                var nextFramesNumber = -1;
                var sop = GetViewport().sop;
                let index = SearchUid2Index(sop);
                // if (!index) continue;
                let i = index[0],
                    j = index[1],
                    k = index[2];
                var Onum = parseInt(Patient.Study[i].Series[j].Sop[k].InstanceNumber);
                var list = sortInstance(sop);
                if (!(list.length <= 1)) {
                    var l = 0;
                    for (l = 0; l < list.length; l++) {
                        if (list[l].InstanceNumber == Onum) {
                            break;
                        }
                    }
                    if (Math.abs(currY - GetViewport().originalPointY) < Math.abs(currX - GetViewport().originalPointX)) {
                        if (currX < GetViewport().originalPointX - 3) {
                            nextFrame(viewportNumber, -1);
                            if (l - 1 < 0) nextInstanceNumber = list.length - 1;
                            else nextInstanceNumber = l - 1;
                        } else if (currX > GetViewport().originalPointX + 3) {
                            nextFrame(viewportNumber, 1);
                            if (list[l].InstanceNumber == Onum) {
                                if (l + 1 >= list.length) nextInstanceNumber = 0;
                                else nextInstanceNumber = l + 1;
                            }
                        }
                    } else {
                        if (currY < GetViewport().originalPointY - 3) {
                            nextFrame(viewportNumber, -1);
                            if (l - 1 < 0) nextInstanceNumber = list.length - 1;
                            else nextInstanceNumber = l - 1;
                        } else if (currY > GetViewport().originalPointY + 3) {
                            nextFrame(viewportNumber, 1);
                            if (l + 1 >= list.length) nextInstanceNumber = 0;
                            else nextInstanceNumber = l + 1;
                        }
                    }
                } else {
                    if (list.length == 1 && list[0].frames) {
                        if (GetViewport().framesNumber == undefined) GetViewport().framesNumber = 0;
                        var l = 0, NowframesNumber = GetViewport().framesNumber;
                        for (l = 0; l < list[0].frames.length; l++) {
                            if (l == NowframesNumber) {
                                break;
                            }
                        }
                        if (Math.abs(currY - GetViewport().originalPointY) < Math.abs(currX - GetViewport().originalPointX)) {
                            if (currX < GetViewport().originalPointX - 3) {
                                nextFrame(viewportNumber, -1);
                                if (l - 1 < 0) nextFramesNumber = list[0].frames.length - 1;
                                else nextFramesNumber = l - 1;
                            } else if (currX > GetViewport().originalPointX + 3) {
                                nextFrame(viewportNumber, 1);
                                if (NowframesNumber == l) {
                                    if (l + 1 >= list[0].frames.length) nextFramesNumber = 0;
                                    else nextFramesNumber = l + 1;
                                }

                            }
                        } else {
                            if (currY < GetViewport().originalPointY - 3) {
                                nextFrame(viewportNumber, -1);
                                if (l - 1 < 0) nextFramesNumber = list[0].frames.length - 1;
                                else nextFramesNumber = l - 1;
                            } else if (currY > GetViewport().originalPointY + 3) {
                                nextFrame(viewportNumber, 1);
                                if (l + 1 >= list[0].frames.length) nextFramesNumber = 0;
                                else nextFramesNumber = l + 1;
                            }
                        }
                    }
                }
                GetViewport().originalPointX = currX;
                GetViewport().originalPointY = currY;
            }
        }
        Mouseup = function (e) {
            var currX = getCurrPoint(e)[0];
            var currY = getCurrPoint(e)[1];
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
            if (TouchDownCheck == true && rightTouchDown == false) {
                //if (openChangeFile == true) 
                {
                    var nextInstanceNumber = -1;
                    var sop = GetViewport().sop;
                    let index = SearchUid2Index(sop);
                    // if (!index) continue;
                    let i = index[0],
                        j = index[1],
                        k = index[2];
                    var Onum = parseInt(Patient.Study[i].Series[j].Sop[k].InstanceNumber);
                    var list = sortInstance(sop);
                    for (l = 0; l < list.length; l++) {
                        if (list[l].InstanceNumber == Onum) {
                            break;
                        }
                    }
                    if (Math.abs(currY - GetViewport().originalPointY) < Math.abs(currX - GetViewport().originalPointX)) {
                        if (currX < GetViewport().originalPointX - 3) {
                            nextFrame(viewportNumber, -1);
                            if (l - 1 < 0) nextInstanceNumber = list.length - 1;
                            else nextInstanceNumber = l - 1;
                        } else if (currX > GetViewport().originalPointX + 3) {
                            nextFrame(viewportNumber, 1);
                            if (list[l].InstanceNumber == Onum) {
                                if (l + 1 >= list.length) nextInstanceNumber = 0;
                                else nextInstanceNumber = l + 1;
                            }
                        }
                    } else {
                        if (currY < GetViewport().originalPointY - 3) {
                            nextFrame(viewportNumber, -1);
                            if (l - 1 < 0) nextInstanceNumber = list.length - 1;
                            else nextInstanceNumber = l - 1;
                        } else if (currY > GetViewport().originalPointY + 3) {
                            nextFrame(viewportNumber, 1);
                            if (l + 1 >= list.length) nextInstanceNumber = 0;
                            else nextInstanceNumber = l + 1;
                        }
                    }
                    GetViewport().originalPointX = currX;
                    GetViewport().originalPointY = currY;
                }
            }
            // putLabel();
            //  for (var i = 0; i < Viewport_Total; i++)
            //     displayRuler(i);
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