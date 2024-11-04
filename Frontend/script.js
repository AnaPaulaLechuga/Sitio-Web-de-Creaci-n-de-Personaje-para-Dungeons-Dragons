var canvas = document.getElementById('miCanvas');
            var ctx = canvas.getContext('2d');
            var color = "black";
            // Crea una nueva imagen
            var imagen = new Image();

            // Establece la fuente de la imagen
            imagen.src = 'Humano-01';

            // Dibuja la imagen en el canvas cuando se haya cargado
            imagen.onload = function() {
                ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
            }
            ;

            var dibujando = false;
            // Variable para rastrear si el usuario está dibujando

            // Evento que se activa cuando se presiona el botón del mouse
            canvas.addEventListener('mousedown', function(e) {
                dibujando = true;
                ctx.strokeStyle = color;
                ctx.beginPath();
                ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            });

            // Evento que se activa cuando se mueve el mouse
            canvas.addEventListener('mousemove', function(e) {
                if (dibujando) {
                    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
                    ctx.stroke();
                }
            });

            // Evento que se activa cuando se suelta el botón del mouse
            canvas.addEventListener('mouseup', function() {
                dibujando = false;
                ctx.closePath();
            });

            // Evento que se activa cuando se sale del canvas con el botón del mouse presionado
            canvas.addEventListener('mouseout', function() {
                dibujando = false;
                ctx.closePath();
            });

            function cambiarImagen(nuevaImagen) {
                imagen.src = nuevaImagen;
                imagen.onload = function () {
                    ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
                };
            }

            let pg1Btn = document.getElementById("image1");
            let pg2Btn = document.getElementById("image2");
            let pg3Btn = document.getElementById("image3");
            let pg4Btn = document.getElementById("image4");
            let pg5Btn = document.getElementById("image5");

            pg1Btn.onclick = function() {
                cambiarImagen ("Colorear_Mesa de trabajo 1.jpg");
            }

            pg2Btn.onclick = function() {
                cambiarImagen ("Colorear_Mesa de trabajo 1 copia.jpg");
            }

            pg3Btn.onclick = function() {
                cambiarImagen ("Colorear_Mesa de trabajo 1 copia 2.jpg");
            }

            pg4Btn.onclick = function() {
                cambiarImagen ("Colorear_Mesa de trabajo 1 copia 3.jpg");
            }

            pg5Btn.onclick = function() {
                cambiarImagen ("Colorear_Mesa de trabajo 1 copia 4.jpg");
            }