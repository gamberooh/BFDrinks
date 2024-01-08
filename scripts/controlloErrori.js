//Vincolo d'integrità: numero maggiore o uguale a 0
function controllaNumero(){
    let n = document.getElementById('calorie').value;
    
    if(n<0) {
        alert('Devi inserire un numero non inferiore a 0\nPremi reset!');
        throw new Error('Devi inserire un numero non inferiore a 0');
    }else if (n>500) {
        alert('Devi inserire un numero inferiore a 500\nPremi reset!');
        throw new Error('Devi inserire un numero inferiore a 500');
    }else{
        console.log('Numero inserito correttamente');
    }
    
    
}