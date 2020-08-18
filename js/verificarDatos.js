class checkValues{
    contructor(validador){
        this.validador = validador; 
    }
    
    valueCorrecto(){
        return validador.comprobar();
    }
}

class Validador{
    contructor(value){
        this.value = value; 
    }
    comprobar();
}

class isNumber extends Validador { 
    comprobar(){
        return !isNaN(parseFloat(value)) && isFinite(value);
    }
}
class isTelephone  extends Validador {
    comprobar(){
        if( !(/^\d{9}$/.test(value)) ) {
            return false;
        }
        return true;
    }
}
class isDNI  extends Validador {
    comprobar(){
        if( !(/^\d{8}$/.test(value)) ) {
            return false;
        }
        return true;  
    }
}
class isEmail  extends Validador {
    comprobar(){
        if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) ) {
            return false;
          }
        return true;  
    }
}
