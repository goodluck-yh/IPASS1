/**
 * Created by Administrator on 2016/4/14 0014.
 */
$(".seat").change(function() {
    var length = $(".seat:checked").length;
    $("#number").html(length);
    if(this.checked == true){
        $("input[name='"+this.name+"']").removeAttr('disabled');
    }else{
        $("input[name='"+this.name+"']").attr('disabled', 'disabled');
        $("#"+this.id).removeAttr('disabled');
    }
});

function back(){
    window.history.back();
};


function book(){
    var length = $(".seat:checked").length;
    if(length == 0){
        alert("Please choose your seat");
        return false;
    }else{
        document.getElementById("formid").submit();
    }
};