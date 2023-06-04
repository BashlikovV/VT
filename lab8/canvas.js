const colors = [
    "cyan", "red", "green", "blue", "magenta"
]

function initCanvas() {
    const canvas = document.getElementById('canvas'),
        context = canvas.getContext("2d");

    context.strokeColor = '#7142f4';

    return context;
}

function drawWedge(w,fill,stroke,strokewidth, ctx){
    ctx.beginPath();
    ctx.moveTo(w.cx, w.cy);
    ctx.arc(w.cx, w.cy, w.radius, w.startAngle, w.endAngle);
    ctx.closePath();
    ctx.fillStyle=fill;
    ctx.fill();
    ctx.strokeStyle=stroke;
    ctx.lineWidth=strokewidth;
    ctx.stroke();
}

function getValues() {
    
    return document.getElementById("nums").value
}

function castToArray() {
    let values = getValues();
    return values.split(',');
}

function gradToRad(grad) {
    return (Math.PI / 180) * grad
}

document.addEventListener('DOMContentLoaded', function() {
    const values = castToArray();
    let sum = values.reduce((partialSum, a) => Number(partialSum) + Number(a));
    let indices = [];
    for (let i = 0; i < values.length; i++) {
        indices.push((values[i] / sum) * 360);
    }
    let tmp = [];
    tmp.push(0);
    let t = 0;
    for (let i = 0; i < values.length - 1; i++) {
        tmp.push(indices[i] + t);
        t += indices[i];
    }

    const context = initCanvas();

    for (let i = 0; i < 5; i++) {
        let angle = tmp[i] + indices[i];
        console.log(tmp[i] + " : " + angle);
        let wedge = {
            cx: 200, cy: 200,
            radius: 150,
            startAngle: gradToRad(tmp[i]),
            endAngle: gradToRad(angle)
        };
        drawWedge(wedge, colors[i],'gray',5, context);
    }
});