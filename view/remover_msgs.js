function removeMessages() {
    var messages = document.getElementsByClassName('alert');
    if (messages.length > 0) {
        setTimeout(function() {
            for (var i = 0; i < messages.length; i++) {
                messages[i].style.display = 'none';
            }
        }, 5000); // Tempo em milissegundos (5 segundos neste exemplo)
    }
}

// Chama a função para remover as mensagens
removeMessages();
