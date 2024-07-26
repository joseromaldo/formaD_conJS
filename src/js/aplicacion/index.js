const btnGuardar = document.getElementById('btnGuardar');
const btnModificar = document.getElementById('btnModificar');
const btnBuscar = document.getElementById('btnBuscar');
const btnCancelar = document.getElementById('btnCancelar');
const btnLimpiar = document.getElementById('btnLimpiar');
const tablaApps = document.getElementById('tablaApps');
const formulario = document.getElementById('formulario');

btnModificar.parentElement.style.display = 'none';
btnCancelar.parentElement.style.display = 'none';

const getApps = async (alerta ='si') => {
    const nombre = formulario.apl_nombre.value.trim();
   
  
    const url = `/formaD_conJS/controllers/aplicacion/index.php?apl_nombre=${nombre}`;
  
    const config = {
        method: 'GET'
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaApps.tBodies[0].innerHTML = '';
        const fragment = document.createDocumentFragment();
        let contador = 1;

        if (respuesta.status === 200) {
            if(alerta =='si'){
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Apps encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();

            }

            if (data.length > 0) {
                data.forEach(app => {
                    const tr = document.createElement('tr');
                    const celda1 = document.createElement('td');
                    const celda2 = document.createElement('td');
                    const celda3 = document.createElement('td');
                    const celda4 = document.createElement('td');
                    const buttonModificar = document.createElement('button');
                    const buttonEliminar = document.createElement('button');

                    celda1.innerText = contador;
                    celda2.innerText = app.APL_NOMBRE;

                    buttonModificar.textContent = 'Modificar';
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100');
                    buttonModificar.addEventListener('click', () => llenarDatos(app));

                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminar(app.APL_ID));

                    celda3.appendChild(buttonModificar);
                    celda4.appendChild(buttonEliminar);

                    tr.appendChild(celda1);
                    tr.appendChild(celda2);
                    tr.appendChild(celda3);
                    tr.appendChild(celda4);
                    fragment.appendChild(tr);

                    contador++;
                });
            } else {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.innerText = 'No hay apps disponibles';
                td.colSpan = 4 ;

                tr.appendChild(td);
                fragment.appendChild(tr);
            }
        } else {
            console.log('Error al cargar apps');
        }

        tablaApps.tBodies[0].appendChild(fragment);
    } catch (error) {
        console.log(error);
    }
};



const guardarApp = async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;

    const url = '/formaD_conJS/controllers/aplicacion/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 1);
    formData.delete('apl_id');

    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();

            formulario.reset();
            getApps(alerta ='no');
        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al guardar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
    btnGuardar.disabled = false;
};

const llenarDatos = (app) => {
    formulario.apl_nombre.value = app.APL_NOMBRE;
    formulario.apl_id.value = app.APL_ID;

    btnLimpiar.parentElement.style.display = 'none';
    btnBuscar.parentElement.style.display = 'none';
    btnCancelar.parentElement.style.display = '';
    btnGuardar.parentElement.style.display = 'none';
    btnModificar.parentElement.style.display = '';
};

const modificar = async (e) => {
    e.preventDefault();
    btnModificar.disabled = true;

    const url = '/formaD_conJS/controllers/aplicacion/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);

    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();

            formulario.reset();
            getApps(alerta ='no');
            btnBuscar.parentElement.style.display = '';
            btnCancelar.parentElement.style.display = 'none';
            btnGuardar.parentElement.style.display = '';
            btnModificar.parentElement.style.display = 'none';
        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al modificar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
    btnModificar.disabled = false;
};

const cancelar = (e) => {
    e.preventDefault();

    formulario.reset();

    btnLimpiar.parentElement.style.display = '';
    btnBuscar.parentElement.style.display = '';
    btnCancelar.parentElement.style.display = 'none';
    btnGuardar.parentElement.style.display = '';
    btnModificar.parentElement.style.display = 'none';

    Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        icon: "info",
        title: 'Modificación cancelada',
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    }).fire();
};

const eliminar = async (appId) => {
    const url = '/formaD_conJS/controllers/aplicacion/index.php';
    const formData = new FormData();
    formData.append('apl_id', appId);
    formData.append('tipo', 3);

    const config = {
        method: 'POST',
        body: formData
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();

            getApps(alerta ='no');
        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al eliminar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
};

const limpiarFormulario = () => {
    formulario.reset();
};

getApps();
btnGuardar.addEventListener('click', guardarApp);
btnModificar.addEventListener('click', modificar);
btnCancelar.addEventListener('click', cancelar);
btnBuscar.addEventListener('click', getApps);
btnLimpiar.addEventListener('click', limpiarFormulario);
