const articles = document.getElementById('NP');

if (NP) {
    NP.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger glyphicon glyphicon-trash') {
            if (confirm('vous voules supprimer??')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}