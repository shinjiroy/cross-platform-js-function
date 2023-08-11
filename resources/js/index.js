import { calc } from "./functions/calc.js";

(function(){
    const urlParams = new URLSearchParams(window.location.search);
    const val1 = urlParams.get("val1");
    const val2 = urlParams.get("val2");
    const result = calc({
        val1: parseInt(val1 ? val1 : 0),
        val2: parseInt(val2 ? val2 : 0)
    });
    const elem = document.getElementById("result");
    elem.innerText = result;
})();
