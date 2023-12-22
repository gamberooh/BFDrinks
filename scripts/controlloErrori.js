/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

//Vincolo d'integrità: numero maggiore o uguale a 0
function controllaNumero(){
    let n = document.getElementById('calorie').value;
    
    if(n<0) {
        alert('Devi inserire un numero non inferiore a 0');
        throw new Error('Devi inserire un numero non inferiore a 0');
    }else{
        console.log('Numero inserito correttamente');
    }
}