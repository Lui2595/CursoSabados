import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Example from '@/Components/ModalBootstrap';import { useState } from 'react';
 "@/Components/ModalBootstrap";
import formulario from '@/Components/AddFormulario';
import axios from 'axios';

export default function Dashboard(props) {
    const [empleados, setEmpleados] = useState(props.empleados);
    const [updating, setUpdate] = useState(false);
    const [mostrarModal, setShow] = useState(false);
    const [tituloModal, setTitulo] = useState("Añadir Empleado");
    const initialState={
        id:"",
        nombre:"",
        apellido:"",
        nss:"",
        fecha_ingreso:"",
        status:""
    }
    const [fomularioState, setForm] = useState(initialState);

    const editarEmpleado = (id)=>{
        setForm(empleados[id])
        setTitulo("Actualizar Empleado")
        setShow(true)
        setUpdate(true);
    }
    const filas = empleados.map((e,i)=>{
        let columns=Object.keys(e).map((e1)=>{
            if(e1=="status"){
                let status;
                if(e[e1]==1) status="Activo"
                else if(e[e1]==2) status="Vacaciones"
                else if(e[e1]==3) status="Suspendido"
                else if(e[e1]==4) status="Permiso Especial"
                else if(e[e1]==5) status="Baja"
                return (<td key={e.id+"."+e1}>{status}</td>)
            }
            return (<td key={e.id+"."+e1}>{e[e1]}</td>);
        })
        columns.push((<td key={e.id+".edit"}> <button className='btn btn-primary' onClick={() => {editarEmpleado(i)}}>Editar</button> </td>))
        return (<tr key={e.id}>{columns}</tr>);
    })
    const openModal= ()=>setShow(true);
    const closeModal = ()=> setShow(false);
    const guardarEmpleado=()=>{
        if (updating){
            axios.put("",fomularioState).then((e)=>{
                let data=e.data.data;
                let newState= empleados.map((e1)=>{
                    if (e1.id==data.id){
                        return data;
                    }
                })
                setEmpleados(newState)
                setForm(initialState);
                setShow(false)
                setUpdate(false);
                return;
            }).catch((e)=>{
                console.log(e);
            })
        }
        axios.post("",fomularioState).then((e)=>{
            setEmpleados(oldArray => [...oldArray,e.data.data] )
            setForm(initialState);
            setShow(false)
        }).catch((e)=>{
            console.log(e);
        })
    }
    const cancelarModal=()=>{
        setForm(initialState);
        setShow(false)
    }
    const buttonsModal =  (
        <>
        <button className='btn btn-danger' onClick={cancelarModal}>Cancelar</button>
        <button className='btn btn-primary' onClick={guardarEmpleado}>Guardar</button>
        </>
    );

    const updateFormulario =(event)=>{
        setForm({ ...fomularioState, [event.target.name]: event.target.value })
    }
    const contenidoModal=formulario(fomularioState,updateFormulario)


    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Empleados</h2>}
        >
            <Head title="Dashboard" />
            <Example  modalTitle={tituloModal} modalContent={contenidoModal} modalButtons={buttonsModal} showProp={mostrarModal} hideModal={closeModal}/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div className="p-2 d-flex flex-column">
                            <div className='px-3 d-flex justify-content-between align-items-center'>
                                <h3>Tabla de Empleados</h3>
                                 <button className='btn btn-success' onClick={openModal}> Añadir Empleado</button>
                            </div>
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>IMG</th>
                                    <th>NSS</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {filas}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </AuthenticatedLayout>
    );
}
