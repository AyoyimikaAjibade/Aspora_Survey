function aspora_recg1() {
	var labels2 = ["Agree", "Disagree", "Prefer not to say"]
//data collected
var data2 = [521, 459, 20]
var tableName2 = "Have you ever heard about Aspora?"
var colors2 = ["#72a2c0", "#93a806", "green"]
var myChart2 = document.getElementById("barChart1").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2

}


function aspora_recg2() {
	var labels2 = ["Agree", "Disagree", "Prefer not to say"]
//data collected
var data2 = [367, 543, 90]
var tableName2 = "Have you ever used an Aspora product?"
var colors2 = ["#72a2c0", "#93a806", "green"]
var myChart2 = document.getElementById("barChart2").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function aspora_recognition() {
	aspora_recg1();
	aspora_recg2();

}

 


function sport_exp3() {
    var slides1 = document.getElementsByClassName('slide')[0];
var canvas = document.createElement("canvas");
var att = document.createAttribute("id");
att.value = "barChart3";
canvas.setAttributeNode(att);
slides1.appendChild(canvas);
	var labels2 = ["Agree", "Disagree", "Prefer not to say"]
//data collected
var data2 = [456, 417, 127]
var tableName2 = "Do you currently play any kind of sport?"
var colors2 = ["#72a2c0", "#93a806", "white"]
var myChart2 = document.getElementById("barChart3").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function sport_exp4() {
var slides2 = document.getElementsByClassName('slide')[1];
var canvas = document.createElement("canvas");
var att = document.createAttribute("id");
att.value = "barChart4";
canvas.setAttributeNode(att);
slides2.appendChild(canvas);
	var labels2 = ["Agree", "Disagree", "Prefer not to say"]
//data collected
var data2 = [456, 417, 127]
var tableName2 = "Would you use these trainers for sporting activities?"
var colors2 = ["#72a2c0", "#93a806", "green"]
var myChart2 = document.getElementById("barChart4").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function sport_exp5() {
    var slides3 = document.getElementsByClassName('slide')[2];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart5";
    canvas.setAttributeNode(att);
    slides3.appendChild(canvas);
	var labels2 = ["Agree", "Disagree", "Prefer not to say"]
//data collected
var data2 = [456, 417, 127]
var tableName2 = "Would you use these trainers for non-sporting activities?"
var colors2 = ["#72a2c0", "#93a806", "green"]
var myChart2 = document.getElementById("barChart5").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function sport_experience() {
    sport_exp3();
    sport_exp4();
    sport_exp5();
}


function lace_laceless() {
    var slides1 = document.getElementsByClassName('slide')[0];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart6";
    canvas.setAttributeNode(att);
    slides1.appendChild(canvas);
	var labels2 = ["Laced", "Laceless", "Both"]
//data collected
var data2 = [420, 346, 234]
var tableName2 = "Do you want these shoes to be laced/laceless"
var colors2 = ["#72a2c0", "#93a806", "green"]
var myChart2 = document.getElementById("barChart6").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function shoe_sizes() {
    var slides1 = document.getElementsByClassName('slide')[0];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart7";
    canvas.setAttributeNode(att);
    slides1.appendChild(canvas);
	var labels2 = ["38-40", "41-43", "44-46", "47 and above"]
//data collected
var data2 = [138, 262, 370, 230]
var tableName2 = "What shoe size range would you personally like for the shoe to come in?"
var colors2 = ["#72a2c0", "#93a806", "green", "white"]
var myChart2 = document.getElementById("barChart7").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function shoe_prices() {
    var slides1 = document.getElementsByClassName('slide')[0];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart8";
    canvas.setAttributeNode(att);
    slides1.appendChild(canvas);
	var labels2 = ["2,000-5,000", "6,000-10,000", "11,000-15,000", "16,000-20,000", "21,000-or-more"]
//data collected
var data2 = [186, 307, 295, 162, 50]
var tableName2 = "What price range do you believe that these shoes will cost upon release?"
var colors2 = ["#72a2c0", "#93a806", "green", "yellow", "#AE0607"]
var myChart2 = document.getElementById("barChart8").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function prod_int9() {
    var slides1 = document.getElementsByClassName('slide')[0];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart9";
    canvas.setAttributeNode(att);
    slides1.appendChild(canvas);
	var labels2 = ["Very Likely", "Likely", "Neutral", "Unlikely", "Very Unlikely"]
//data collected
var data2 = [189, 285, 345, 96, 85]
var tableName2 = "Would you be interested in buying/using this product upon its release?"
var colors2 = ["#72a2c0", "#93a806", "#72a2c0", "#93a806", "#72a2c0",]
var myChart2 = document.getElementById("barChart9").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function prod_int10() {
    var slides2 = document.getElementsByClassName('slide')[1];
    var canvas = document.createElement("canvas");
    var att = document.createAttribute("id");
    att.value = "barChart10";
    canvas.setAttributeNode(att);
    slides2.appendChild(canvas);
	var labels2 = ["Very Likely", "Likely", "Neutral", "Unlikely", "Very Unlikely"]
//data collected
var data2 = [294, 326, 207, 106, 67]
var tableName2 = "Would you be willing to recommend this product to friends/family?"
var colors2 = ["#72a2c0", "#93a806", "#72a2c0", "#93a806", "#72a2c0",]
var myChart2 = document.getElementById("barChart10").getContext("2d")
var chart2 = new Chart(myChart2, {
    type: "bar",
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2
        }]
    },
    options: {
        title: {
            text: tableName2,
            display: true
        },
        legend: {
            display: false
        }
    }
})
return chart2
}

function product_interest() {
   prod_int9();
   prod_int10();
}