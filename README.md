# Asistencia

PROGRAMING STYLES

MONOLITHIC

```javascript
function obtenerCursos() {
    var correo = document.getElementById('correo').value;
    var datos = 'correo='+correo;
    $.ajax({
        type: 'POST',
        url: "php/mostrarCursos.php",
        data: datos,
        success: function( response ) {
            if( response == "0") {
                alert("No se encontro persona");
            } else {
                var cursos = JSON.parse( response );
                cargarCursos( cursos );
            }
        }, error: function( response, status, error ) {
            alert("No encontrado");
        }
    });
    return false;
}
```

PRINCIPIOS SOLID

OCP


```javascript
class checkValues{
    contructor(value,tipo){
        this.value = value; 
        this.tipo = tipo;
    }
    
    valueCorrecto(){
        switch (tipo) {
            case  'number':
                T = new isNumber(value);
                return T.comprobar();        
            case  'telephone':
                T = new isTelephone(value);
                return T.comprobar();        
            case 'email': 
                T = new isEmail(value);
                return T.comprobar();        
            case 'DNI':
                T = new isDNI(value);
                return T.comprobar();        
            default:
                return false;
          }
    }
}
```


