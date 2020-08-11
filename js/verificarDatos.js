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

class isNumber{
    contructor(value){
        this.value = value; 
    }
    comprobar(){
        return !isNaN(parseFloat(value)) && isFinite(value);
    }
}
class isTelephone{
    contructor(value){
        this.value = value; 
    }
    comprobar(){
        if( !(/^\d{9}$/.test(value)) ) {
            return false;
        }
        return true;
    }
}
class isDNI{
    contructor(value){
        this.value = value; 
    }
    comprobar(){
        if( !(/^\d{8}$/.test(value)) ) {
            return false;
        }
        return true;  
    }
}
class isEmail{
    contructor(value){
        this.value = value; 
    }
    comprobar(){
        if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) ) {
            return false;
          }
        return true;  
    }
}