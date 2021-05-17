const articles = document.getElementById('Membre');

if (Membre) {
    Membre.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger glyphicon glyphicon-trash') {
            if (confirm('vous voules supprimer??')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/membre/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}