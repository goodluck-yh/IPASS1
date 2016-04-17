$(document).ready(function(){
    var availableTags = [
        "Sydney",
        "Canberra",
        "Newcastle",
        "Broken Hill",
        "Melbourne",
        "Bendigo",
        "Adelaide",
        "Darwin",
        "Alice Springs",
        "Perth",
        "Albany",
        "Kalgoorlie",
        "Broome",
        "Launceston",
        "Hobart",
        "Brisbane",
        "Mt Isa",
        "Rockhampton",
        "Cairns",
        "Pt Augusta"
    ];
    $( "#from" ).autocomplete({
        source: availableTags
    });
    $( "#to" ).autocomplete({
        source: availableTags
    });

    
});

function formsubmit(){
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    if(from == "" &&  to==""){
        alert("please enter information");
        return false;
    }else{
        document.getElementById("formid").submit();
    }

};