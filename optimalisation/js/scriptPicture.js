var clicks = 0;
function function1() {
    if (clicks % 2 == 1) {
        document.getElementById("img1").style.position = "fixed";
        document.getElementById("img1").style.top = "0";
        document.getElementById("img1").style.left = "0";
        document.getElementById("img1").style.right = "0";
        document.getElementById("img1").style.bottom = "0";
        document.getElementById("img1").style.margin = "auto";


        var size = document.getElementById("img1").style.height;
        var sizeInt = parseInt(size, 10);
        sizeInt *= 2;
        document.getElementById("img1").style.height = sizeInt + "vh";
    }

    else if (clicks %2 == 0) {
        document.getElementById("img1").style.position = "relative";
        document.getElementById("img1").style.top = "null";
        document.getElementById("img1").style.left = "null";
        document.getElementById("img1").style.right = "null";
        document.getElementById("img1").style.bottom = "null";
        document.getElementById("img1").style.margin = "null";


        var size = document.getElementById("img1").style.height;
        var sizeInt = parseInt(size, 10);
        sizeInt = sizeInt / 2;
        document.getElementById("img1").style.height = sizeInt + "vh";
    }
}

function functionChangeMargin() {
    if (window.innerWidth < 501) {
        document.getElementById("sekcia_row2").style.marginTop = "0vh";
    }

     if (window.innerWidth < 750) {
            var el = document.getElementById("sekcia_row");
         el.style.marginTop = "10vh";
         document.getElementById("sekcia_row2").style.marginBottom = "0";
         document.getElementById("sekcia_row2").style.flexWrap = "nowrap";

    }
    if (window.innerWidth < 751 && window.innerWidth > 500) {
        document.getElementById("p1").style.paddingTop = "4vh";
    }

}

function functionChangeStyle() {

    document.getElementById("zmena-js-funkcia").style.fontSize = "15vh";
    document.getElementById("sekcia_zmena").style.fontSize = "4vh";
    document.getElementById("greyBox").style.fontSize = "4vh";
    document.getElementById("bulb").style.height = "8vh";
    document.getElementById("img1").style.height = "30vh";
    document.getElementById("UXh1").style.fontSize = "15vh";

    if (window.innerWidth < 751) {
        document.getElementById("sekcia_row2").style.marginTop = "20vh";
        document.getElementById("sekciaObrUX").style.height = "150vh";
    }
  
    if (window.innerWidth < 501) {
        console.log("0");
        document.getElementById("sekcia_row2").style.marginTop = "20vh";
        document.getElementById("sekciaObrUX").style.height = "100vh";
    }


}

