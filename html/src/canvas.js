
// var ctx = myCanvas.getContext("2d");

function drawLine(ctx, startX, startY, endX, endY, color) {
  ctx.save();
  ctx.strokeStyle = color;
  ctx.beginPath();
  ctx.moveTo(startX, startY);
  ctx.lineTo(endX, endY);
  ctx.stroke();
  ctx.restore();
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle, color) {
  ctx.save();
  ctx.strokeStyle = color;
  ctx.beginPath();
  ctx.arc(centerX, centerY, radius, startAngle, endAngle);
  ctx.stroke();
  ctx.restore();
}

function drawPieSlice(
  ctx,
  centerX,
  centerY,
  radius,
  startAngle,
  endAngle,
  fillColor,
  strokeColor
) {
  ctx.save();
  ctx.fillStyle = fillColor;
  ctx.strokeStyle = strokeColor;
  ctx.beginPath();
  ctx.moveTo(centerX, centerY);
  ctx.arc(centerX, centerY, radius, startAngle, endAngle);
  ctx.closePath();
  ctx.fill();
  ctx.stroke();
  ctx.restore();
}

class PieChart {
 
    constructor(options) {
      this.options = options;
      this.canvas = options.canvas;
      this.ctx = this.canvas.getContext("2d");
      
      this.colors = options.colors;
      // this.titleOptions = options.titleOptions;
      this.totalValue = [...Object.values(this.options.data)].reduce((a, b) => a + b, 0);
      this.radius = Math.min(this.canvas.width / 2, this.canvas.height / 2) - options.padding;
    }
  
    drawSlices() {
      var colorIndex = 0;
      var startAngle = -Math.PI / 2;
  
      for (var categ in this.options.data) {
        var val = this.options.data[categ];
        var sliceAngle = (2 * Math.PI * val) / this.totalValue;
  
        drawPieSlice(
          this.ctx,
          this.canvas.width / 2,
          this.canvas.height / 2,
          this.radius,
          startAngle,
          startAngle + sliceAngle,
          this.colors[colorIndex % this.colors.length]
        );
  
        startAngle += sliceAngle;
        colorIndex++;
      }
  
      if (this.options.doughnutHoleSize) {
        drawPieSlice(
          this.ctx,
          this.canvas.width / 2,
          this.canvas.height / 2,
          this.options.doughnutHoleSize * this.radius,
          0,
          2 * Math.PI,
          this.options.doughnutHoleColor,
          this.options.doughnutHoleColor
        );
  
        drawArc(
          this.ctx,
          this.canvas.width / 2,
          this.canvas.height / 2,
          this.options.doughnutHoleSize * this.radius,
          0,
          2 * Math.PI,
          "#000"
        );
      }
    }
  
    // drawLabels() {
    //   var colorIndex = 0;
    //   var startAngle = -Math.PI / 2;
    //   for (var categ in this.options.data) {
    //     var val = this.options.data[categ];
    //     var sliceAngle = (2 * Math.PI * val) / this.totalValue;
    //     var labelX =
    //       this.canvas.width / 2 +
    //       (this.radius / 2) * Math.cos(startAngle + sliceAngle / 2);
    //     var labelY =
    //       this.canvas.height / 2 +
    //       (this.radius / 2) * Math.sin(startAngle + sliceAngle / 2);
  
    //     if (this.options.doughnutHoleSize) {
    //       var offset = (this.radius * this.options.doughnutHoleSize) / 2;
    //       labelX =
    //         this.canvas.width / 2 +
    //         (offset + this.radius / 2) * Math.cos(startAngle + sliceAngle / 2);
    //       labelY =
    //         this.canvas.height / 2 +
    //         (offset + this.radius / 2) * Math.sin(startAngle + sliceAngle / 2);
    //     }
  
    //     var labelText = Math.round((100 * val) / this.totalValue);
    //     this.ctx.fillStyle = "black";
    //     this.ctx.font = "32px Khand";
    //     this.ctx.fillText(labelText + "%", labelX, labelY);
    //     startAngle += sliceAngle;
    //   }
    // }
  
    // drawTitle() {
    //   this.ctx.save();
  
    //   this.ctx.textBaseline = "bottom";
    //   this.ctx.textAlign = this.titleOptions.align;
    //   this.ctx.fillStyle = this.titleOptions.fill;
    //   this.ctx.font = `${this.titleOptions.font.weight} ${this.titleOptions.font.size} ${this.titleOptions.font.family}`;
  
    //   let xPos = this.canvas.width / 2;
  
    //   if (this.titleOptions.align == "left") {
    //     xPos = 10;
    //   }
    //   if (this.titleOptions.align == "right") {
    //     xPos = this.canvas.width - 10;
    //   }
  
    //   this.ctx.fillText(this.options.seriesName, xPos, this.canvas.height);
  
    //   this.ctx.restore();
    // }
  
    // drawLegend() {
    //   let pIndex = 0;
    //   let legend = document.querySelector("div[for='myCanvas']");
    //   let ul = document.createElement("ul");
    //   legend.append(ul);
  
    //   for (let ctg of Object.keys(this.options.data)) {
    //     let li = document.createElement("li");
    //     li.style.listStyle = "none";
    //     li.style.borderLeft =
    //       "20px solid " + this.colors[pIndex % this.colors.length];
    //     li.style.padding = "5px";
    //     li.textContent = ctg;
    //     ul.append(li);
    //     pIndex++;
    //   }
    // }
  
    draw() {
      this.drawSlices();
      // this.drawLabels();
      // this.drawTitle();
      // this.drawLegend();
    }
  }

  
  class LineChart{
    // user defined properties
    constructor(con) {
    this.canvas = document.getElementById(con.canvasId);
    this.minX = con.minX;
    this.minY = con.minY;
    this.maxX = con.maxX;
    this.maxY = con.maxY;
    this.unitsPerTickX = con.unitsPerTickX;
    this.unitsPerTickY = con.unitsPerTickY;
   
    // constants
    this.padding = 10;
    this.tickSize = 10;
    this.axisColor = "black";
    this.pointRadius = 5;
    this.font = "12pt Calibri";

    this.fontHeight = 12;

    // relationships
    this.context = this.canvas.getContext("2d");
    this.rangeX = this.maxX - this.minY;
    this.rangeY = this.maxY - this.minY;
    this.numXTicks = Math.round(this.rangeX / this.unitsPerTickX);
    this.numYTicks = Math.round(this.rangeY / this.unitsPerTickY);
    this.x = this.getLongestValueWidth() + this.padding * 2;
    this.y = this.padding * 2;
    this.width = this.canvas.width - this.x - this.padding * 2;
    this.height = this.canvas.height - this.y - this.padding - this.fontHeight;
    this.scaleX = this.width / this.rangeX;
    this.scaleY = this.height / this.rangeY;
   
    // draw x y axis and tick marks
    this.drawXAxis();
    this.drawYAxis();
} 
}

LineChart.prototype.getLongestValueWidth = function () {
    this.context.font = this.font;
    var longestValueWidth = 0;
    for (var n = 0; n <= this.numYTicks; n++) {
        var value = this.maxY - (n * this.unitsPerTickY);
        longestValueWidth = Math.max(longestValueWidth, this.context.measureText(value).width);
    }
    return longestValueWidth;
};

LineChart.prototype.drawXAxis = function () {
    var context = this.context;
    context.save();
    context.beginPath();
    context.moveTo(this.x, this.y + this.height);
    context.lineTo(this.x + this.width, this.y + this.height);
    context.strokeStyle = this.axisColor;
    context.lineWidth = 2;
    context.stroke();

    // draw tick marks
    for (var n = 0; n < this.numXTicks; n++) {
        context.beginPath();
        context.moveTo((n + 1) * this.width / this.numXTicks + this.x, this.y + this.height);
        context.lineTo((n + 1) * this.width / this.numXTicks + this.x, this.y + this.height - this.tickSize);
        context.stroke();
    }

    // draw labels
    context.font = this.font;
    context.fillStyle = "black";
    context.textAlign = "center";
    context.textBaseline = "middle";

    for (var n = 0; n < this.numXTicks; n++) {
        var label = Math.round((n + 1) * this.maxX / this.numXTicks);
        context.save();
        context.translate((n + 1) * this.width / this.numXTicks + this.x, this.y + this.height + this.padding);
        // context.fillText(label, 0, 0);
        context.restore();
    }
    context.restore();
};

LineChart.prototype.drawYAxis = function () {
    var context = this.context;
    context.save();
    context.save();
    context.beginPath();
    context.moveTo(this.x, this.y);
    context.lineTo(this.x, this.y + this.height);
    context.strokeStyle = this.axisColor;
    context.lineWidth = 2;
    context.stroke();
    context.restore();

    // draw tick marks
    for (var n = 0; n < this.numYTicks; n++) {
        context.beginPath();
        context.moveTo(this.x, n * this.height / this.numYTicks + this.y);
        context.lineTo(this.x + this.tickSize, n * this.height / this.numYTicks + this.y);
        context.stroke();
    }

    // draw values
    context.font = this.font;
    context.fillStyle = "black";
    context.textAlign = "right";
    context.textBaseline = "middle";

    for (var n = 0; n < this.numYTicks; n++) {
        var value = Math.round(this.maxY - n * this.maxY / this.numYTicks);
        context.save();
        context.translate(this.x - this.padding, n * this.height / this.numYTicks + this.y);
        context.fillText(value, 0, 0);
        context.restore();
    }
    context.restore();
};

LineChart.prototype.drawLine = function (data, color, width) {
    var context = this.context;
    context.save();
    this.transformContext();
    context.lineWidth = width;
    context.strokeStyle = color;
    context.fillStyle = color;
    context.beginPath();
    context.moveTo(data[0].x * this.scaleX, data[0].y * this.scaleY);

    for (var n = 0; n < data.length; n++) {
        var point = data[n];

        // draw segment
        context.lineTo(point.x * this.scaleX, point.y * this.scaleY);
        context.stroke();
        context.closePath();
        context.beginPath();
        context.arc(point.x * this.scaleX, point.y * this.scaleY, this.pointRadius, 0, 2 * Math.PI, false);
        context.fill();
        context.closePath();

        // position for next segment
        context.beginPath();
        context.moveTo(point.x * this.scaleX, point.y * this.scaleY);
    }
    context.restore();
};

LineChart.prototype.transformContext = function () {
    var context = this.context;

    // move context to center of canvas
    this.context.translate(this.x, this.y + this.height);

    // invert the y scale so that that increments
    // as you move upwards
    context.scale(1, -1);
};



