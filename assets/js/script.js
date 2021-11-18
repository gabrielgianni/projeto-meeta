function modal(title, message, type) {
    return Swal.fire({
        title: title,
        text: message,
        icon: type,
        confirmButtonText: 'Ok'
    });
}

function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    document.getElementById('birthDT').value = '';
}