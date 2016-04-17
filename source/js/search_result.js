function back(){
    window.history.back();
};

function book(){
    var val=$('input:radio:checked').val();
    if(val==null){
        alert("Please choose on option!");
        return false;
    }else{
        document.getElementById("formid").submit();
    }

};