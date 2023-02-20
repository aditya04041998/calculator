   $("#display").keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9 + - * / .]/g)) return false;
    });
    function add_value(num){
        var display = $('#display').val();
        var concatnate = display+num; 
        $('#display').val(concatnate);
    }
    function add_opt(opt){
        var display = $('#display').val();
        var len = display.length;
        if(len != 0){
            if(display[len-1] == '+' || display[len-1] == '-' || display[len-1] == '*' || display[len-1] == '/' || display[len-1] == '.' ){
                console.log('Operator not added');
            }else{
               var concatnate = display+opt; 
               $('#display').val(concatnate);
            }
            
        }
    }
    function del_value(){
      $disply =$('#display').val('');
    }
    function calculate_value(){
        var str = $('#display').val();
        if(str==''){
            str='0';
        }
        var data = splitMultiple(str);
        
        var len =data.length;
        for(var i=0; i<len; i++){
                var pos = data.indexOf('/');
                var firstPos=parseFloat(data[pos-1]);
                if(parseFloat(data[pos+1])){
                    var secondPos=parseFloat(data[pos+1]);
                }else{
                    var secondPos = parseFloat('1');
                }
                var newval = firstPos/secondPos;
                newval = newval.toFixed(2);
                if(pos != -1){
                    data[pos-1]=newval;
                    data.splice(pos,1);
                    data.splice(pos,1);
                
               }
            
        }
        for(var i=0; i<data.length; i++){
            var pos = data.indexOf('*');
            var firstPos=parseFloat(data[pos-1]);
                if(parseFloat(data[pos+1])){
                    var secondPos=parseFloat(data[pos+1]);
                }else{
                    var secondPos = parseFloat('1');
                }
                var newval = firstPos*secondPos;
                newval.toFixed(2);
            if(pos != -1){
                data[pos-1]=newval;
                data.splice(pos,1);
                data.splice(pos,1);
            }
            
        }
        for(var i=0; i<data.length; i++){
            var pos = data.indexOf('+');
            var firstPos=parseFloat(data[pos-1]);
                if(parseFloat(data[pos+1])){
                    var secondPos=parseFloat(data[pos+1]);
                }else{
                    var secondPos = parseFloat('0');
                }
                var newval = firstPos+secondPos;
               newval.toFixed(2);
            if(pos != -1){
                data[pos-1]=newval;
                data.splice(pos,1);
                data.splice(pos,1);
            }
            
        }
        for(var i=0; i<data.length; i++){
            var pos = data.indexOf('-');
            var firstPos=parseFloat(data[pos-1]);
                if(parseFloat(data[pos+1])){
                    var secondPos=parseFloat(data[pos+1]);
                }else{
                    var secondPos = parseFloat('0');
                }
                var newval = firstPos-secondPos;
              newval.toFixed(2);
            if(pos != -1){
                data[pos-1]=newval;
                data.splice(pos,1);
                data.splice(pos,1);
            }
            
        }
        $('#display').val(data);
    }


const splitMultiple = (str) => {

var operators = str.split(/\d+/).filter(function(op) { return op !== ""; });
var arr_str = [];
var operands = str.split(/[-+*/]/);
    for (var i = 0; i < operands.length; i++) {
    var operand = operands[i];
        arr_str.push(operand);
    var operator = operators[i];
     if(i < (operands.length-1)){
        if(operator == '.'){
            operator = operators[i+1];
        }else{
            operator = operators[i];
        }
        arr_str.push(operator);
     }
    }
return arr_str;
};

