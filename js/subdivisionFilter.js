/**
 * Created by AZIZUL on 4/27/2017.
 */


var data = document.getElementById("dom-target").textContent;
var lines = data.split("\n");

var divs = ["fake"]
var subdivs = ["fake"]
var index = 0;
for( var i=0; i<lines.length; i++){
    var temp = lines[i].split("#");
    window.divs[index] = temp[0];
    window.subdivs[index] = temp[1];
    index = index + 1;
}

function updatesubdivision(selecteddivision){
    var subdivistionList = document.getElementById("subdivisionid");
    var disp = selecteddivision;
    var val = selecteddivision;
    var opind = 0;
    for (i=0; i<index; i++) {
        if (selecteddivision == divs[i]) {
            subdivistionList.options[opind] = new Option(subdivs[i], subdivs[i]);
            opind = opind + 1;
        }
    }
}

