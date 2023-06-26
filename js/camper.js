addEventListener('DOMContentLoaded',async(e)=>{
    let conexion = await fetch("http://localhost/ApolT01-003/DB-CONECTION-CAMPUS/uploads/city");
    let data = await conexion.json();
    console.log(data);

});