/**
 * Created by AZIZUL on 4/27/2017.
 */




function updatesubdivisionAdd(selecteddivision){

    var subdivistionList = document.getElementById("form_subdivision");
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

