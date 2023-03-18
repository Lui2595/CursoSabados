export default function formulario(props, updateFormulario){
    return (
        <>
       <div className="mb-3">
         <label for="" className="form-label">Nombre</label>
         <input type="text" name="nombre" id="" value={props.nombre} className="form-control" placeholder="" aria-describedby="helpId" onChange={updateFormulario}/>
       </div>
       <div className="mb-3">
         <label for="" className="form-label">Apellido</label>
         <input type="text" name="apellido" id="" value={props.apellido} className="form-control" placeholder="" aria-describedby="helpId" onChange={updateFormulario}/>
       </div>
       <div className="mb-3">
         <label for="" className="form-label">NSS</label>
         <input type="text" name="nss" id="" value={props.nss} className="form-control" placeholder="" aria-describedby="helpId" onChange={updateFormulario}/>
       </div>
       <div className="mb-3">
         <label for="" className="form-label">Fecha de Ingreso</label>
         <input type="date" name="fecha_ingreso" id="" value={props.fecha_ingreso} className="form-control" placeholder="" aria-describedby="helpId" onChange={updateFormulario}/>
       </div>
       <div className="mb-3">
            <label for="" className="form-label">Status</label>
            <select className="form-select form-select-lg" name="status" id="" value={props.status} onChange={updateFormulario}>
                <option selected>Select one</option>
                <option value="1">Activo</option>
                <option value="2">Vacaciones</option>
                <option value="3">Suspendido</option>
                <option value="4">Permiso especial</option>
                <option value="5">Baja</option>
            </select>
         </div>
        </>
    )
}
