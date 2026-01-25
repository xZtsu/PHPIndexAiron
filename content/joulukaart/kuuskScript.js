function kuusk(){
    // määrame tahvli
    const tahvel=document.getElementById("tahvel");
    if(tahvel.getContext){
        let t=tahvel.getContext("2d"); //anname tahvlinimi on t
        //joon
        t.beginPath();
        t.strokeStyle="black";
        t.lineWidth = 1;


        t.lineTo(500,100);
        t.lineTo(400,150);
        t.lineTo(450,150);
        t.lineTo(350,200);
        t.lineTo(450,200);
        t.lineTo(300,250);
        t.lineTo(400,250);
        t.lineTo(250,300);


        t.lineTo(750,300);
        t.lineTo(450,300);
        t.lineTo(450,350);
        t.lineTo(550,350);
        t.lineTo(550,300);

        t.lineTo(750,300);

        t.lineTo(600,250);
        t.lineTo(700,250);
        t.lineTo(550,200);
        t.lineTo(650,200);
        t.lineTo(550,150);
        t.lineTo(600,150);
        t.lineTo(500,100);

        t.fillStyle="Green";
        t.fill();


        t.stroke();
}
}
function ehted(){
    // määrame tahvli
    const tahvel=document.getElementById("tahvel");
    if(tahvel.getContext){
        let t=tahvel.getContext("2d"); //anname tahvlinimi on t
        //joon
        const ornaments = [
            {x: 500, y: 130, color: "red"},
            {x: 420, y: 170, color: "gold"},
            {x: 580, y: 170, color: "blue"},
            {x: 370, y: 220, color: "purple"},
            {x: 500, y: 220, color: "red"},
            {x: 630, y: 220, color: "gold"},
            {x: 320, y: 270, color: "blue"},
            {x: 450, y: 270, color: "purple"},
            {x: 550, y: 270, color: "red"},
            {x: 680, y: 270, color: "gold"}
        ];

        ornaments.forEach(ornament => {
            t.beginPath();
            t.arc(ornament.x, ornament.y, 8, 0, Math.PI * 2);
            t.fillStyle = ornament.color;
            t.fill();
            t.strokeStyle = "black";
            t.lineWidth = 1;
            t.stroke();

            // Läige (shine effect)
            t.beginPath();
            t.arc(ornament.x - 3, ornament.y - 3, 2, 0, Math.PI * 2);
            t.fillStyle = "white";
            t.fill();
        });

        // Täht tippu (star on top)
        t.fillStyle = "gold";
        t.strokeStyle = "orange";
        t.lineWidth = 2;
        t.beginPath();
        for(let i = 0; i < 5; i++) {
            let angle = (i * 4 * Math.PI / 5) - Math.PI / 2;
            let x = 500 + Math.cos(angle) * 20;
            let y = 80 + Math.sin(angle) * 20;
            if(i === 0) t.moveTo(x, y);
            else t.lineTo(x, y);
        }
        t.closePath();
        t.fill();
        t.stroke();

        // Sädelused (sparkles)
        const sparkles = [
            {x: 340, y: 190}, {x: 660, y: 190},
            {x: 280, y: 240}, {x: 720, y: 240},
            {x: 380, y: 280}, {x: 620, y: 280}
        ];

        sparkles.forEach(sparkle => {
            t.strokeStyle = "yellow";
            t.lineWidth = 2;
            t.beginPath();
            t.moveTo(sparkle.x - 5, sparkle.y);
            t.lineTo(sparkle.x + 5, sparkle.y);
            t.moveTo(sparkle.x, sparkle.y - 5);
            t.lineTo(sparkle.x, sparkle.y + 5);
            t.stroke();
        })
    }
}
/*
function puhasta(){
    const tahvel=document.getElementById("tahvel");
    if(tahvel.getContext){
        let t=tahvel.getContext("2d");
        t.clearRect(0,0,1000,500);
    }
}

 */
function joulutekst(){
    const tahvel = document.getElementById("tahvel");
    if(tahvel.getContext) {
        let m = tahvel.getContext("2d");
        m.font = "50px serif";
        m.fillText("Ilusaid pühi!", 350, 50);
    }
}



let animationId = null;
let snowflakes = [];
let snowCanvas = null;
let snowContext = null;

function lumi(){
    const tahvel=document.getElementById("tahvel");

    // Loome eraldi canvas lume jaoks
    if(!snowCanvas){
        snowCanvas = document.createElement('canvas');
        snowCanvas.width = tahvel.width;
        snowCanvas.height = tahvel.height;
        snowCanvas.style.position = 'absolute';
        snowCanvas.style.left = tahvel.offsetLeft + 'px';
        snowCanvas.style.top = tahvel.offsetTop + 'px';
        snowCanvas.style.pointerEvents = 'none'; // Ei sega klikkimist
        tahvel.parentNode.appendChild(snowCanvas);
        snowContext = snowCanvas.getContext('2d');
    }

    // Loome lumehelbed ainult kui neid pole
    if(snowflakes.length === 0){
        for(let i = 0; i < 50; i++){
            snowflakes.push({
                x: Math.random() * snowCanvas.width,
                y: Math.random() * snowCanvas.height,
                radius: Math.random() * 3 + 1,
                speed: Math.random() * 2 + 1
            });
        }
    }

    // Animatsiooni funktsioon
    function animate(){
        // Puhastame lume canvas
        snowContext.clearRect(0, 0, snowCanvas.width, snowCanvas.height);

        // Joonistame ja liigutame lumehelbed
        snowflakes.forEach(flake => {
            flake.y += flake.speed;

            if(flake.y > snowCanvas.height){
                flake.y = -10;
                flake.x = Math.random() * snowCanvas.width;
            }

            snowContext.beginPath();
            snowContext.arc(flake.x, flake.y, flake.radius, 0, Math.PI * 2);
            snowContext.fillStyle = "white";
            snowContext.fill();
        });

        animationId = requestAnimationFrame(animate);
    }

    animate();
}

function puhasta(){
    const tahvel=document.getElementById("tahvel");
    if(tahvel.getContext){
        let t=tahvel.getContext("2d");

        // Peatame animatsiooni
        if(animationId){
            cancelAnimationFrame(animationId);
            animationId = null;
        }

        // Eemaldame lume canvas
        if(snowCanvas){
            snowCanvas.remove();
            snowCanvas = null;
            snowContext = null;
        }

        // Tühjendame lumehelbed
        snowflakes = [];

        // Puhastame põhi-tahvli
        t.clearRect(0, 0, tahvel.width, tahvel.height);
    }
}

