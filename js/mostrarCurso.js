var usuario;
function verificar() {
    usuario = new Usuario();
    var correo = document.getElementById('correo').value;
    usuario.verificarDatos( correo );
}
