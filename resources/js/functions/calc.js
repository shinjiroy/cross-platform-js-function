const argObjCalc = {
    val1: 0,
    val2: 0,
    kusoDekaString: null
};

/**
 * 計算します
 * 
 * @param {argObjCalc} argObj 
 * @returns 
 */
export const calc = (argObj) => {
    if (argObj.kusoDekaString) {
        console.log(argObj.kusoDekaString.length); // 通信が発生することによるオーバーヘッドの確認用
    }
    return argObj.val1 + argObj.val2;
};
