//Vincolo d'integrità: numero maggiore o uguale a 0
function controllaNumero(){
    let n = document.getElementById('qnt').value;
    if(n<0) {
        alert('Devi inserire un numero non inferiore a 0\nPremi reset!');
        document.getElementById('qnt').value = 0;
        throw new Error('Devi inserire un numero non inferiore a 0');
    }else{
        console.log('Numero inserito correttamente');
    }
}