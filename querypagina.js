// jQuery para añadir un efecto de zoom cuando pasas el ratón sobre las imágenes
$(document).ready(function() {
    $(".img-thumbnail").hover(
        function() {
            $(this).css("transform", "scale(1.1)"); // Aumenta el tamaño (efecto de zoom)
            $(this).css("transition", "transform 0.3s ease"); // Añade suavidad a la transición
        }, 
        function() {
            $(this).css("transform", "scale(1)"); // Vuelve al tamaño original
        }
    );
});

$(document).ready(function() {
    let currentIndex = null;

    $('.clickable-image').click(function() {
        const index = $(this).data('index');

        if (currentIndex === index) {
            // Si la misma imagen se vuelve a hacer clic, restaurar todo
            $('.text-item').hide();
            $('.text-item').slice(0, 3).show(); // Mostrar todos los textos
            currentIndex = null; // Resetear el índice
        } else {
            // Mostrar solo el texto correspondiente a la imagen clicada
            $('.text-item').hide();
            $('.text-item[data-index="' + index + '"]').show();
            currentIndex = index; // Actualizar el índice actual
        }
    });
});

$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Evita que se recargue la página

        // Validación simple del formulario
        const email = $('#email').val();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar el correo

        if (regex.test(email)) {
            // Si el correo es válido, muestra el mensaje de confirmación
            $('#confirmationMessage').show();
            // Limpiar el formulario
            $(this).trigger('reset');
        } else {
            alert('Por favor, introduce un correo electrónico válido.');
        }
    });
});
