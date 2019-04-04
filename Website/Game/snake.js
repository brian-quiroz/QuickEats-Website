/*
Thank W3schools provide html's canvas and gaming tuturial
*/
var snake;
/*
	start game
*/

function startGame(){
	//The following jquery statement inserts an input tag with a value of 0.
	//Later we will use this hidden input box to write the user's score (using jQuery) and obtain it in PHP.
	//Got idea for this line from https://stackoverflow.com/questions/1951282/adding-inputs-to-html-form-using-javascript :
	$("#gameForm").append('<input type="hidden" name="score" value="0"/>');

	snake = new Snake("snake","score","speed",25,25); //constructor function
	snake.init();
}
/*
	stop interval timer, then restart time interval
*/
function reset(){
	window.clearInterval(snake.timer);
	snake.init();
}
/*
	constructor: snake
	parameter: ele: Id name of html
						 screele: ID name of score
						 spedele: ID name of speed
						 x: width of canvas
						 y: heigh of canvas
	Each cell of canvas is 20
	draw the snake map and begin snake is moving
*/
function Snake(ele,scoreele,speedele,x,y){

	this.cellWidth = 20;// each cell's size
	this.ele = document.getElementById(ele);
	this.cxt = this.ele.getContext("2d");
	this.x=x;
	this.y=y;
	this.scoreele = document.getElementById(scoreele);
	this.speedele = document.getElementById(speedele);

	//canvas's width and height
	this.ele.width = this.cellWidth * this.x;
	this.ele.height = this.cellWidth * this.y;
	this.changeDiretion();
}

/*
	Propotype of snake:
	init function: draw a snake, point, set timer;
*/
Snake.prototype = {
	init:function(){
		this.direction = 1;//right  2down 3left  4 up
		this.nextDirection = '';
		this.snakeArr = [[0,parseInt(this.y/2)],[1,parseInt(this.y/2)]];
		this.speed = 0;
		this.score = 0;

		this.cxt.fillStyle ='#fff';
		this.cxt.fillRect(0,0,this.cellWidth*this.x,this.cellWidth*this.y);//500 500
		this.scoreele.innerHTML="Score: 0";
		this.speedele.innerHTML="Speed: 1";

		this.createMyScore();
		this.drawCell(this.coolScore,2);
		this.drawSnake();
		this.setTimer();
	},
	/*
		getCellArea:
		para: position is defined as array of [x,y]
		return: top-left position
	*/
	getCellArea:function(pos){
		return [(pos[0]-1)*this.cellWidth+1,(pos[1]-1)*this.cellWidth+1];
	},

	/*
		setTimer function
		speedArr: control speed of snakeArr
		module of time: follow time interval
	*/
	setTimer:function(){
		var speedArr = [460,440,420,400,360,320,240,180,100];
		var speed = this.speed;
		if(speed>8){
			speed = 8;
		}
		//time interval
		(function(theThis){
			var that = theThis;
			that.timer = setTimeout(function() {
				that.moveSnake();
			}, speedArr[speed]);
		})(this);

	},
	/*
		move function: control head of snake
		Check whether users change direction, and then change position of snake
		if snake hit wall of itself, dead
		if snake hit point to change the score and increase the length of snake
	*/
	moveSnake:function(){
		this.direction = this.nextDirection == ''?this.direction:this.nextDirection;
		var direction = this.direction;
		var snakeArr = this.snakeArr;
		var snakeHead = snakeArr[snakeArr.length-1];
		switch(direction){
			case 1 ://right
			snakeHead = [snakeHead[0]+1,snakeHead[1]];
			break;
			case 2 ://down
			snakeHead = [snakeHead[0],snakeHead[1]+1];
			break;
			case 3 ://left
			snakeHead = [snakeHead[0]-1,snakeHead[1]];
			break;
			case 4 ://up
			snakeHead = [snakeHead[0],snakeHead[1]-1];
			break;
		}

		//hit wall or self
		if(in_array(snakeHead,snakeArr) || snakeHead[0]<0 || snakeHead[0]>this.x || snakeHead[1]<0 || snakeHead[1]>this.y){
			window.clearInterval(this.timer);
			alert('Score：'+this.score);
			//this.init();
			return;
		}
		 snakeArr.push(snakeHead);
		 this.drawCell(snakeHead,1);
		if(snakeHead.toString() != this.coolScore.toString()){
			var tail = snakeArr.shift();//remove tail
			this.drawCell(tail,0);
		}else{//hit points
			this.createMyScore();
			this.drawCell(this.coolScore,2);
			if(this.speed<5){
				this.score = this.score + 10;
				this.scoreele.innerHTML="Score: "+this.score;
				//Adding the score to the hidden input box, so that it can be retrieved by the PHP file snakegame-inc.php:
				$("#gameForm input[name='score']").val(this.score);
			}else if(this.speed>=5&&this.speed<7){
				this.score = this.score + 30;
				this.scoreele.innerHTML="Score: "+this.score;
				//Adding the score to the hidden input box, so that it can be retrieved by the PHP file snakegame-inc.php:
				$("#gameForm input[name='score']").val(this.score);
			}else if(this.speed>=7){
				this.score = this.score + 80;
				this.scoreele.innerHTML="Score: "+this.score;
				//Adding the score to the hidden input box, so that it can be retrieved by the PHP file snakegame-inc.php:
				$("#gameForm input[name='score']").val(this.score);
			}
			if(this.speed<5){
				this.speed =  Math.ceil((this.score + 1)/30);
			}else if(this.score>=120 && this.score<300){
				this.speed = 5;
			}else if(this.score >=300 &&this.score<420){
				this.speed = 6;
			}else if(this.score>=420 &&this.score<820){
				this.speed = 7;
			}else{
				this.speed = 8;
			}
			this.speedele.innerHTML="Speed: "+this.speed;
		}

		this.setTimer();
	},
/*
	create Point function:
	create random point in canvas
*/
	createMyScore:function(){//random a point
		do{
			this.coolScore = [getRandom(this.x),getRandom(this.y)];
		}while(in_array(this.coolScore,this.snakeArr));
	},
	/*
		sanke direction:
		detect key down or up to control snake WASD + arrow
	*/
	changeDiretion:function(){
		var that = this;
		document.onkeydown=function(event){
			var e = event || window.event || arguments.callee.caller.arguments[0];
			var direction = that.direction;
			var keyCode = e.keyCode;

			switch(keyCode){
				case 39://right arrow
				case 68://D key
				if(direction!=1 && direction !=3){
					that.nextDirection = 1;
				}
				break;
				case 40://down
				case 83://S
				if(direction!=2 && direction !=4){
					that.nextDirection = 2;
				}
				break;
				case 37://left
				case 65://A
				if(direction!=1 && direction !=3){
					that.nextDirection = 3;
				}
				break;
				case 38://up
				case 87://W
				if(direction!=2 && direction !=4){
					that.nextDirection = 4;
				}
				break;
				default:
					break;
			}
		};
	},
	/*
	 draw snake function:
	 snake is array draw his head and tail
	*/
	drawSnake:function(){
		var snakeArr = this.snakeArr;
		for (var i = 0,sLen=snakeArr.length; i < sLen; i++) {
			this.drawCell(snakeArr[i],1);
		};
	},
	/*
		control colors of snake or porint
	*/
	drawCell:function(pos,chooseColor){ //pos x, and pos y
		var colorArr = ['#fff','rgb(0,150,206)',"red"];
		var cxt = this.cxt;
		var area;
		cxt.fillStyle = colorArr[chooseColor];
		area = this.getCellArea(pos);
		cxt.fillRect(area[0],area[1],this.cellWidth-1,this.cellWidth-1);
	}
}


//random 1~n;
function getRandom(n){
	return Math.floor(Math.random()*n+1)
}

// check snake head whether hits snake tail or not.
function in_array(stringToSearch, arrayToSearch) {
	for (s = 0; s < arrayToSearch.length; s++) {
		thisEntry = arrayToSearch[s].toString();
		if (thisEntry == stringToSearch.toString()) {
			return true;
		}
	}
	return false;
}
