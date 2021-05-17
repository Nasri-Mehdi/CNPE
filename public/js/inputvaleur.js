function controle() {
    const datedebut = document.getElementById('dd').value;
    const datefin = document.getElementById('df').value;

    const host = "";

    window.location.replace(`/charts/${datedebut}/${datefin}`);

    //window.location.reload(true);
    //window.location.replace(`localhost:8000/charts/${datedebut}/${datefin}`)
    //window.location.assign("")

}