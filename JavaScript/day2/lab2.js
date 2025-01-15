//  Digits Sum

function digitSum(num){
    if(num < 0 || isNaN(num)){throw Error("Only postive integers")}
    var result =0;
    while(num>0){
        result += num%10
        num = Math.floor( num/ 10)
    }
    console.log(result)
    return result
}

// ------------------------------------------------------------------------------------------
    // Vowels counter 

    function vowelNums(str){
        if (typeof str != 'string'){throw Error("Only Strings Available")}
        var vowels = {a:0,e:0,o:0,u:0,i:0}
        for(i = 0; i< str.length; i++){
            if (Object.keys(vowels).includes(str.charAt(i))){vowels[str.charAt(i)]+=1}
        }
        console.log(vowels)
        return vowels
    }

    //                  OR                  //

    // function vowelNums(str){
    //     if (typeof str != 'string'){throw Error("Only Strings Available")}
    //     str = str.split("")
    //     return str.reduce(function(vow,st){
    //         if(Object.keys(vow).includes(st)){vow[st]+=1}
    //         return vow
    //     },{a:0,e:0,o:0,u:0,i:0})
    // }

// ------------------------------------------------------------------------------------------------
// Number of Occurence

function numOfOccu(str,char){
    if (typeof str != 'string'){throw Error("Only Strings Available")}
    if (typeof char != 'string' || char.length !== 1){throw Error("Enter a valid Char")}
    var charAppeareance = 0
    for(i = 0; i< str.length; i++){
        if (str.charAt(i) === char){charAppeareance += 1}
    }
    console.log(charAppeareance)
    return charAppeareance
}

//------------------------------------------------------------------------------------------------
// Bouns Question

function calcAge(date){
    date = new Date(date)
    today = new Date()
    if( date == 'Invalid Date'){throw Error("Invalid Date")}
    if( date > today){throw Error("you're born in the future ????")}
    console.log(Math.floor((today - date)/(24*60*60*1000*365)))
    return Math.floor((today - date)/(24*60*60*1000*365))
}
