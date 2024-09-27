window.onload = function()
{
    
    var ctx;
    var delay = 50;
    var blocksize = 30;
    var canvasHeight = 600;
    var canvasWidth = 900;
    var Snake;
    var Pomme;
    var BlockWidth = canvasWidth / blocksize;
    var BlockHeight = canvasHeight / blocksize;
    var score = 0;
    
    

    init();
   

    function init()
    {
        var canvas = document.createElement('canvas');
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        canvas.style.border = "2px solid";
        canvas.style.display ="block";
        canvas.style.margin = "50 px auto";
        canvas.style.backgroundColor = "grey";
        document.body.appendChild(canvas);
        ctx = canvas.getContext('2d');
        Snake = new serpent([[6,4],[5,4],[4,4]],"right");
        Pomme = new apple([10,10]);
        refreshCanvas();
        
    }
    function refreshCanvas()
    {
        Snake.advance();
        if (Snake.CheckCollision())
        {
            GameOver();
        }
        else 
        {
            
            if (Snake.isAppleEaten(Pomme))
            {
                Snake.ateApple = true;
                score += 1;
                do
                {
                Pomme.NewPos();
                }
                while (Pomme.isOnSnake(Snake));

            }
            ctx.clearRect(0,0,canvasWidth,canvasHeight);
            Snake.draw();
            Pomme.draw();
            drawScore();
            timeout = setTimeout(refreshCanvas,delay);
        }
        
    }   
    
    function drawScore ()
    {
        var scoreChar = score.toString();
        ctx.save();
        ctx.font = "bold 50px sans-serif";
        ctx.fillText("Score : "+ scoreChar,0, canvasHeight - 5)
        ctx.restore(); 
    }
    function restart()
    {
        score = 0;
        Snake = new serpent([[6,4],[5,4],[4,4]],"right");
        Pomme = new apple([10,10]);
        clearTimeout(timeout);
        refreshCanvas();
    }

    function GameOver()
    {
        ctx.save();
        ctx.fillStyle = "white";
        ctx.fillStyle
        ctx.border ="5px solid black";
        ctx.fillStyle.backgroundColor = "white";
        ctx.fillRect(canvasWidth/2 - 10, canvasHeight/2 - 10,250,180);
        ctx.fillText("Game Over, t'es TROP nul hahahahaha", 5, 15);
        ctx.fillText("Vas-y appuie sur Espace pour réessayer le NULLOS");
        ctx.restore();

    }
    function drawBlock(ctx,position)
    {
        var x = position[0] * blocksize;
        var y = position[1] * blocksize;
        ctx.fillRect(x,y,blocksize,blocksize);
    }

     
    function serpent (body,direction)
    {
        this.body = body;
        this.direction = direction;
        this.ateApple = false;
        this.draw = function()
        {
            ctx.save();
            ctx.fillStyle = "#ff0000";
            for(var i = 0; i < this.body.length; i++)
            {
                drawBlock(ctx, this.body[i]);
            }
            ctx.restore();
            

        }
        this.advance = function()
        {
            
                var avance = this.body[0].slice();

                switch(this.direction)
                {
                    case "right" : 
                        avance[0] += 1;
                        break;
                    case "up" :
                        avance[1] -= 1;
                        break;
                    case "down" :
                        avance[1] += 1;
                        break;
                    case "left" :
                        avance[0] -= 1;
                        break;
                    default :
                        throw("Invalid Direction");
                }
                this.body.unshift(avance);
                if (!this.ateApple)
                {
                    this.body.pop();
                }
                else
                {
                    this.ateApple = false;
                }
        }         
        
    

        this.setDirection = function(newDirection)
        {
            var allowed;
            switch(this.direction)
            {
                case "left" :
                case "right" :
                    allowed = ["up","down"]
                    break;
                
                case "up" :
                case "down" :
                    allowed = ["right","left"]
                    break;
            }
           if(allowed.indexOf(newDirection) > -1)
           {
            this.direction = newDirection;
           } 
        }
        
        this.CheckCollision = function ()
        {
            var WallCollision = false;
            var SnakeCollision = false;
            var head = this.body[0];
            var rest = this.body.slice(1);
            var xHead = head[0];
            var yHead = head[1];
            var xMin = 0;
            var yMin = 0;
            var xMax = BlockWidth - 1;
            var yMax = BlockHeight - 1;
            var CollisionMurX = xHead < xMin || xHead > xMax;
            var CollisionMurY = yHead < yMin || yHead > yMax;

            for (var i = 0;i < rest.length; i++)
            {
                if (xHead == rest[i][0] && yHead == rest[i][1])
                {
                    SnakeCollision = true;
                }
            }
            if (CollisionMurX == true || CollisionMurY == true)
            {
                WallCollision = true;
            }

            return SnakeCollision || WallCollision;

        }

        this.isAppleEaten = function (appletoEat)
        {
            var head = this.body[0];
            if (head[0] == appletoEat.position[0] && head[1] == appletoEat.position[1])
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    
    function apple (position)
    {
        this.position = position;
        this.draw = function ()
        {
            ctx.save();
            ctx.fillStyle = "#33cc33"
            ctx.beginPath();
            var radius = blocksize / 2;
            var x = this.position[0]*blocksize + radius;
            var y = this.position[1]*blocksize + radius;
            ctx.arc(x,y,radius,0,Math.PI*2,true);
            ctx.fill();
            ctx.restore();
        }

        this.NewPos = function ()
        {
            
            
                var newX = Math.round(Math.random() * (BlockWidth -1)) ;
                var newY = Math.round(Math.random() * (BlockHeight -1));
                this.position = [newX,newY];
            
        }

        this.isOnSnake = function (Snakecheck)
        {
            var isOnSnake = false;
            for (var i = 0; i < Snakecheck.body.length; i++)
            {
                if (this.position[0] == Snakecheck.body[i][0] && this.position[1] == Snakecheck.body[i][1])
                {
                    isOnSnake = true;
                }
            }
            return isOnSnake;
        }
    }

    document.onkeydown = function handleKeyDown(e)
    {
        var key = e.code;
        var newDirection;
        switch(key)
        {
            case "ArrowLeft" :
                newDirection = "left";
                break;
            case "ArrowUp" : 
                newDirection = "up";
                break;
            case "ArrowRight" : 
                newDirection = "right";
                break;
            case "ArrowDown" : 
                newDirection = "down";
                break; 
            case "Space" :
                restart();
            default :
                return;    
        }
        Snake.setDirection(newDirection);
    }   
}