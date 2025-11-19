function kustuta(){
    let k=document.getElementById("kanva").getContext("2d");

    k.clearRect(0,0, 400, 300);
}

function joon(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.lineWidth="5";
    k.strokeStyle="red";

    k.moveTo(50,100); // alguspunkt
    k.lineTo(100,50); // kesk-punkt
    k.lineTo(150,100);
    k.lineTo(50,100); // lأµpp-punkt
    k.stroke(); // joon
    k.fillStyle="green"
    k.fill(); // taust
}

function ristkylik(){
    let k=document.getElementById("kanva").getContext("2d");
    let l=document.getElementById("laius").value;
    let kor=document.getElementById("korgus").value;
// ristkأ¼lik
    k.fillStyle="blue";
    k.fillRect(50, 50, l, kor); //x, y, laius, kأµrgus
}


function ring(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(100, 75, 50, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="green";
    k.fill();
}


function left_jalg(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(100, 80, 15, 500);
    k.fillRect(50, 145, 50, 6);
}

function right_jalg(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(160, 80, 15, 500);
    k.fillRect(175, 145, 50, 6);
}

function keha(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(95, 30, 85, 50);
}


function left_arm(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(40, 30, 15, 100);
    k.fillRect(50, 30, 50, 6);
}

function right_arm(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(225, 30, 15, 100);
    k.fillRect(180, 30, 50, 6);
}


function pea(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(109, 10, 60, 20);
}


function left_silm(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="pink";
    k.fillRect(109, 20, 23, 5);
}

function left_silmaymbrus(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="purple";
    k.fillRect(115, 20, 10, 5);
}


function right_silm(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="pink";
    k.fillRect(146, 20, 23, 5);
}


function right_silmaymbrus(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="purple";
    k.fillRect(153, 20, 10, 5);
}

function kokku(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="black";
    k.fillRect(100, 80, 15, 500);
    k.fillRect(50, 145, 50, 6);
    k.fillRect(160, 80, 15, 500);
    k.fillRect(175, 145, 50, 6);
    k.fillRect(95, 30, 85, 50);
    k.fillRect(40, 30, 15, 100);
    k.fillRect(50, 30, 50, 6);
    k.fillRect(225, 30, 15, 100);
    k.fillRect(180, 30, 50, 6);
    k.fillRect(109, 10, 60, 20);
    k.fillStyle="pink";
    k.fillRect(109, 20, 23, 5);
    k.fillRect(146, 20, 23, 5);
    k.fillStyle="purple";
    k.fillRect(115, 20, 10, 5);
    k.fillRect(153, 20, 10, 5);
}