Mi página contiene una barra de navegación con la que podremos dirigirnos a diferentes zonas de la página. 
En "inicio" nos llevará directamente a la página principal, que está mi foto y dice quien soy.
En "mis proyectos" se encuentra la zona dónde he puesto los cursos informáticos que tengo y que estoy aprendiendo, si ponemos encima el cursor veremos que la imagen se amplia y si clickamos en cada una de ellas aparecerá el texto correspondiente al curso realizado. Si volvemos a hacer click, aparecerá de nuevo toda la información junta.
En "mi cv" nos lleva directamente a mi cv.
Y en "Formulario" nos lleva a la página donde podemos introducir unos datos y valida si ha introducido un correo electrónico.
Por último tenemos un footer personalizado que nos redigirá a las distintas redes sociales.

2a Parte de la entrega
## Instrucciones de configuración

1. Clona el repositorio.
2. Crea la base de datos `portfolio` en tu servidor MySQL.
3. Crea la tabla `projects` con la siguiente estructura:
```sql
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    link VARCHAR(255)
);
